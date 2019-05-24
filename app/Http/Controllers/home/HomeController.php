<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index(){
        $res=json_decode($this->cart_little(),true);
        return view('home.index',['res'=>$res]);
    }
}
