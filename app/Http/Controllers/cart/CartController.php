<?php

namespace App\Http\Controllers\cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //加入购物车
    public function cart_add($goods_id=0){
        $goods_id=intval($goods_id);
        if(empty($goods_id)){
            $response=[
                'msg'=>'请选择要加入购物车的商品'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
        $res=
    }
}
