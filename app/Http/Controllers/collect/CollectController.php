<?php

namespace App\Http\Controllers\collect;

use App\Model\Collect;
use App\Model\Goods;
use DemeterChain\C;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CollectController extends Controller
{
    //加入收藏夹
    public function add($goods_id)
    {
        $user_id=1;
        $collectInfo=[
            'goods_id'=>$goods_id,
            'user_id'=>$user_id,
        ];
        //根据用户id 商品ID查询是否已收藏
        $is_collect=Collect::where($collectInfo)->count();
//        dd($is_collect);
        if ($is_collect==0){
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
                    'msg'=>'收藏成功'
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }else{
                $arr=[
                    'errno'=>50030,
                    'msg'=>'收藏失败'
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }
        }else{
            $arr=[
                'errno'=>50033,
                'msg'=>'已经在收藏夹里了'
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }

    //心愿列表
    public function wishlist()
    {
        $user_id=1;
        $collectInfo=Collect::where(['user_id'=>$user_id,'is_del'=>1])->get();
//        dd($collectInfo);
        return view('collect.wishlist',compact('collectInfo'));
    }
    
    //删除
    public function del(Request $request)
    {
        $c_id=$request->input('c_id');
        $res=Collect::where(['c_id'=>$c_id])->update(['is_del'=>2]);
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
