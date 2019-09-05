<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//need import this to use DB::
use App\UserModel;//你要使用的model

class emailController extends Controller
{
    public function confirmEmail(Request $request){
        $checkUserMD5Mail=$request->userMail;
        $checkMD5MailExist=DB::table('users')->where('md5Mail',$checkUserMD5Mail)->first();
        if($checkMD5MailExist){
            DB::table('users')->where('md5Mail',$checkUserMD5Mail)->update(array(//update sql table column values
                'emailConfirm'=>'true'
            ));
        }
        return redirect()->action('indexLoginController@loginPage');
    }
}
