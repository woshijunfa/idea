<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Input;

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
        $userInfo = User::where(["email"=>$email])->first();
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



}
