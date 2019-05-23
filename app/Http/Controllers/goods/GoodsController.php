<?php

namespace App\Http\Controllers\goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Goods;
use App\Brand;
class GoodsController extends Controller
{
    //
    public function detail($goods_id){
        $goods_info=Goods::where(['goods_id'=>$goods_id])->first()->toArray();
        return view('goods.goodsdetail',['goods_info'=>$goods_info]);
    }
    public function brand($brand_id="a"){
        $brandInfo=Brand::where(['brand_show'=>1])->get()->toArray();
        if($brand_id=="a"){
            $goods_info=Goods::where(['goods_show'=>1])->get()->toArray();
        }else{
            $goods_info=Goods::where(['brand_id'=>$brand_id])->get()->toArray();
        }
        $data=[
            'brandInfo'=>$brandInfo,
            'goods_info'=>$goods_info,
        ];
        return view('goods.brand',$data);
    }

}
