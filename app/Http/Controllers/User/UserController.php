<?php

namespace App\Http\Controllers\User;

use App\User;
use App\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    /**
     * 注册视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register(){
        return view('user/register');
    }

    /**
     * 注册执行
     * @return string
     */
    public function reg_do(){
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        //验证
        $nameInfo = UserModel::where(['user_name'=>$user_name])->first();
        if($nameInfo){
            $response=[
                'errno'=>'2',
                'msg'=>'用户名已存在'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }else{
            $password=password_hash($pwd,PASSWORD_BCRYPT);
            $data = [
              'user_name'=>$user_name,
              'email'=>$email,
              'password'=>$password,
                'add_time'=>time()
            ];
            $res = UserModel::insertGetId($data);
            if($res){
                $response=[
                    'errno'=>'1',
                    'msg'=>'注册成功'
                ];
                return json_encode($response,JSON_UNESCAPED_UNICODE);
            }else{
                $response=[
                    'errno'=>'2',
                    'msg'=>'好像出现了一点小错误呢'
                ];
                return json_encode($response,JSON_UNESCAPED_UNICODE);
            }
        }
    }

    /**
     * 登录的视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(){
        return view('/user/login');
    }

    /**
     * 登录执行
     * @return string
     */
    public function login_do(){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        //验证用户名
        if(empty($user_name)){
            $response=[
                'errno'=>'2',
                'msg'=> '用户名不能为空'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
        //根据用户名查询数据库
        $nameInfo = UserModel::where(['user_name'=>$user_name])->first();
        if($nameInfo){
            if(password_verify($password,$nameInfo->password)){
                $token = $this->getLoginToken($nameInfo->user_id);
                $key = 'login_token:user_id:'.$nameInfo->user_id;
                Redis::set($key,$token);
                Redis::expire($key,3600);
                session(['user'=>['user_name'=>$user_name,'user_id'=>$nameInfo->user_id]]);
                $response=[
                    'errno'=>'1',
                    'msg'=> '登录成功'
                ];
                return json_encode($response,JSON_UNESCAPED_UNICODE);
            }else{
                $response=[
                    'errno'=>'2',
                    'msg'=> '密码错误，请重新输入'
                ];
               die(json_encode($response,JSON_UNESCAPED_UNICODE));
            }
        }else{
            $response=[
                'errno'=>'2',
                'msg'=> '该用户不存在，请先注册'
            ];
            return json_encode($response,JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * 获取登录token
     * @param $user_id
     * @return bool|string
     */
    public function getLoginToken($user_id){
        $token = substr(md5($user_id.time().Str::random(10)),5,15);
        return $token;
    }

    /**
     * 忘记密码视图页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function forget(){
      return view('user/forget');
    }

    /**
     * 执行找回密码
     * @return string
     */
    public function forget_do(){
        $user_name = $_POST;
        if(empty($user_name)){
            $response=[
                'errno'=>'2',
                'msg'=> '用来找回密码的用户信息不能为空'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }else{
            $nameInfo = UserModel::where(['user_name'=>$user_name])->first();
            if($nameInfo){
                $response=[
                    'errno'=>'1',
                    'msg'=>'验证成功'
                ];
                return json_encode($response,JSON_UNESCAPED_UNICODE);
            }
        }
    }

    /**
     * 设置新密码视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new_password(){
        return view('user/new_password');
    }

    /**
     * 设置新密码
     * @return string
     */
    public function set_new_password(){
        $user_name = $_POST['user_name'];
        $set_password = $_POST['password'];
        if(empty($set_password)){
            $response=[
                'errno'=>'2',
                'msg'=> '请填写设置的新密码'
            ];
            die(json_encode($response,JSON_UNESCAPED_UNICODE));
        }
        $nameInfo = UserModel::where(['user_name'=>$user_name])->first();
        if($nameInfo){
            $new_password = password_hash($set_password,PASSWORD_BCRYPT);
            $res = UserModel::where(['user_name'=>$user_name])->update(['password'=>$new_password]);
            if($res){
                $response=[
                    'errno'=>'1',
                    'msg'=>'找回密码成功'
                ];
                return json_encode($response,JSON_UNESCAPED_UNICODE);
            }else{
                $response=[
                    'errno'=>'2',
                    'msg'=> '好像出错了，请重试'
                ];
                die(json_encode($response,JSON_UNESCAPED_UNICODE));
            }

        }
    }
}