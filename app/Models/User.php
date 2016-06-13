<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Redis;
use Auth;
use Session;
use Config;
use Hash;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $primaryKey = 'id';

    protected $fillable = [
                            'id',
                            'email',
                            'password',
                            'email_key',
                            'status',
                            'created_at',
                            'updated_at'
                            ];


    public static function initEmail($email)
    {
        if (empty($email)) return false;
        $uuid = gGuid();
        $result = self::insert(['email_key'=>$uuid,'status'=>-1,'email'=>$email]);

        


        return $result ? $uuid : false;
    }

}
