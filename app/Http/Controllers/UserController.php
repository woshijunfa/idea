<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Input;
use Auth;
use Session;
use Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function regiestPost()
    {
        $email = Input::get("email");
        if (empty($email)) return $this->json(1,[],"邮箱不能为空");
        if (!gIsEmail($email)) return $this->json(1,[],"邮箱格式不正确");

        //用户信息，是否已经注册
        $userInfo = User::where("email",$email)->first();
        $uuid = '';
        if (empty($userInfo)) 
        {   
            //进行注册
            $uuid = User::initEmail($email);
            if (empty($uuid)) return $this->json(3,[],"注册失败，请稍后再试");
        }
        else
        {
            if ($userInfo->status == -1) $uuid = $userInfo->email_key;
            else return $this->json(2,[],"已经注册，请直接登录");
        }

        //发送激活邮件
        UserService::sendRegiestEmail($email,$uuid);

        return $this->json(0,[],"");
    }

    //发送激活邮件
    public function activeEmail()
    {
        $uuid = Input::get("uuid");
        if (empty($uuid)) return $this->errorPage("发生错误，请重新发送邮件进行激活认证！");

        //验证有效邮箱
        $userInfo = User::where("email_key",$uuid)->first();
        if (empty($userInfo)) return $this->errorPage("发生错误，请重新发送邮件进行激活认证！");

        Session::set("reg_userid",$userInfo->id);

        //成功，返回首页
        return View("passport.setPass");
    }

    //设置密码
    public function setLoginPass()
    {
        $password = Input::get("password");
        if (empty($password)) return $this->json(1,[],"密码不能为空");

        $userId = Session::get("reg_userid");
        if(empty($userId)) return $this->json(1,[],"异常错误，请刷新重试");

        //设置登录密码
        User::setLoginPassword($userId,$password);

        //进行登录
        Auth::loginUsingId($userId);

        //返回成功，进入首页
        return $this->json(0,[],"");
    }


}
