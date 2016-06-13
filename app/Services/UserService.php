<?php

namespace App\Services;

class UserService
{
    public static function sendRegiestEmail($email,$uuid)
    {
        $data = compact("email",'uuid');
        $title = "欢迎选择shareApi,请验证您的邮箱";

        $result = EmailService::sendBladeEmail([$email=>$email],$title,"passport.registerEmail",$data);

        return $result;
    }

}
