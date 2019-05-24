<?php

namespace App\Http\Controllers\collect;

use App\Model\Collect;
use App\Model\Goods;
use App\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectController extends Controller
{
    //加入收藏夹
    public function add($goods_id)
    {
        //获取用户id
        $user_id=session('user.user_id')??'';
        if($user_id==''){
            $response=[
                'errno'=>50006,
                'msg'=>'请登录'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
//        验证此用户是否存在
        $user_info=UserModel::where('user_id',$user_id)->first();
        if(!$user_info){
            $response=[
                'errno'=>'50006',
                'msg'=>'没有此用户'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
        $collectInfo=[
            'goods_id'=>$goods_id,
            'user_id'=>$user_id,
        ];
        //根据用户id 商品ID查询是否已收藏
        $is_collect=Collect::where($collectInfo)->first();
//        dd($is_collect);
        if ($is_collect){
            Collect::where(['goods_id'=>$goods_id,'user_id'=>$user_id])->update(['is_del'=>2]);
            $arr=[
                'errno'=>2,
            ];
            return $arr;
        }
        $goodsInfo=Goods::where(['goods_id'=>$goods_id])->first();
        $info=[
            'user_id'=>$user_id,
            'goods_id'=>$goods_id,
            'goods_name'=>$goodsInfo['goods_name'],
            'goods_price'=>$goodsInfo['goods_price'],
            'goods_num'=>$goodsInfo['goods_num'],
            'goods_img'=>$goodsInfo['goods_img']
        ];
        $res=Collect::insert($info);
        if ($res){
            $arr=[
                'errno'=>0,
            ];
            return $arr;
        }else{
            $arr=[
                'errno'=>1,
            ];
            return $arr;
        }
    }

    //判断是否收藏
    public function iscollect()
    {

    }

    //心愿列表
    public function wishlist()
    {
        //获取用户id
        $user_id=session('user.user_id')??'';
        if($user_id==''){
            $response=[
                'errno'=>50006,
                'msg'=>'请登录'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
//        验证此用户是否存在
        $user_info=UserModel::where('user_id',$user_id)->first();
        if(!$user_info){
            $response=[
                'errno'=>'50006',
                'msg'=>'没有此用户'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
        $collectInfo=Collect::where(['user_id'=>$user_id,'is_del'=>1])->get();
//        dd($collectInfo);
        return view('collect.wishlist',compact('collectInfo'));
    }
    
    //删除
    public function del(Request $request)
    {
        //获取用户id
        $user_id=session('user.user_id')??'';
        if($user_id==''){
            $response=[
                'errno'=>50006,
                'msg'=>'请登录'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
//        验证此用户是否存在
        $user_info=UserModel::where('user_id',$user_id)->first();
        if(!$user_info){
            $response=[
                'errno'=>'50006',
                'msg'=>'没有此用户'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
        $c_id=$request->input('c_id');
        $res=Collect::where(['c_id'=>$c_id,'user_id'=>$user_id])->update(['is_del'=>2]);
        if ($res){
            $arr=[
                'errno'=>0,
                'msg'=>'删除成功'
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                'errno'=>50020,
                'msg'=>'删除失败'
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }
}
