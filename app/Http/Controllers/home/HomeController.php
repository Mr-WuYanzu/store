<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Goods;
class HomeController extends Controller
{
    //
    public function index(){
        $goods_new_info=Goods::where(['goods_new'=>1,'goods_show'=>1])->get()->toArray();
        $goods_best_info=Goods::where(['goods_best'=>1,'goods_show'=>1])->get()->toArray();
        $data=[
            'goods_new_info'=>$goods_new_info,
            'goods_best_info'=>$goods_best_info
        ];
        return view('home.index',$data);
    }
}
