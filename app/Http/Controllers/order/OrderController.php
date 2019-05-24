<?php

namespace App\Http\Controllers\order;

use App\model\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\User;

class OrderController extends Controller
{
//    生成订单页面
    public function order_view(Request $request){
        //获取用户id
        $user_id=session('user.user_id')??'';
        if($user_id==''){
            $response=[
                'errno'=>1,
                'msg'=>'请登录'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
//        验证此用户是否存在
        $user_info=User::where('user_id',$user_id)->first();
        if(!$user_info){
            $response=[
                'errno'=>'1',
                'msg'=>'没有此用户'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
        $c_id=$request->input('c_id');
        if(!$c_id){
            $response=[
                'errno'=>'1',
                'msg'=>'请选择购物车订单进行结算'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
        $c_id=explode(',',$c_id);
//        dd($c_id);
//        echo $c_id[1];die;
        for($i=0;$i<count($c_id);$i++){
            $cart_info=Cart::where(['user_id'=>$user_id,'id'=>$c_id[$i]])->get();
            if(!$cart_info){
                $response=[
                    'errno'=>'1',
                    'msg'=>'请选择正确的购物车订单'
                ];
                die(json_encode($response,JSON_UNESCAPED_UNICODE));
            }
        }
        $cart_info=Cart::join('shop_goods','shop_goods.goods_id','=','shop_cart.goods_id')
            ->where('user_id',$user_id)
            ->whereIn('id',$c_id)->get();
        return view('order.order_list',['cart_info'=>$cart_info]);
    }
   //生成订单
    public function order(Request $request){
        //获取用户id
        $user_id=session('user.user_id')??'';
        if($user_id==''){
            $response=[
                'errno'=>1,
                'msg'=>'请登录'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
//        验证此用户是否存在
        $user_info=User::where('user_id',$user_id)->first();
        if(!$user_info){
            $response=[
                'errno'=>'1',
                'msg'=>'没有此用户'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
        $c_id=$request->input('c_id');
        if(!$c_id){
            $response=[
                'errno'=>'1',
                'msg'=>'请选择购物车订单进行结算'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
        $c_id=explode(',',$c_id);
//        dd($c_id);
//        echo $c_id[1];die;
        for($i=0;$i<count($c_id);$i++){
            $cart_info=Cart::where(['user_id'=>$user_id,'id'=>$c_id[$i]])->get();
            if(!$cart_info){
                $response=[
                    'errno'=>'1',
                    'msg'=>'请选择正确的购物车订单'
                ];
                die(json_encode($response,JSON_UNESCAPED_UNICODE));
            }
        }
        //生成订单号
        $order_no='jd'.substr(md5($user_id),0,13).time();
        //求出总金额
        $count_price=0;
        $cart_info=Cart::join('shop_goods','shop_goods.goods_id','=','shop_cart.goods_id')
                    ->where('user_id',$user_id)
                    ->whereIn('id',$c_id)->get()->toArray();
        foreach($cart_info as $k=>$v){
            $count_price+=$v['buy_num']*$v['goods_price'];
        }

//        加入订单表
        $data=[
            'order_no'=>$order_no,
            'user_id'=>$user_id,
            'order_amout'=>$count_price,
            'created_at'=>time()
        ];

    }
}
