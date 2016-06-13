<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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

        return $this->json(0,[],"");
    }

}
