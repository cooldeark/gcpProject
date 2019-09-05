<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public $table="users";
    //$fillable 是可以被儲存在DB裡面的資料
    protected $fillable=[
        'name', 'email', 'password','emailConfirm','md5Mail'
    ];
}
