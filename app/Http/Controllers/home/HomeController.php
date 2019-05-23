<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Goods;
class HomeController extends Controller
{
    //
    public function index(){
        $goods_info=Goods::get()->toArray();
        return view('home.index',['data'=>$goods_info]);
    }
}
