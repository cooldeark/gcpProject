<?php

namespace App\Http\Controllers;
use DB;//need import this to use DB::
use Illuminate\Http\Request;
use App\UserModel;//你要使用的model
use Redirect;//要用Redirect back 要import這個
class IndexLoginController extends Controller
{
    public function loginPage(){
        return view('login.loginPage');
    }

    public function checkAuth(Request $requests){//form input need $request to catched
        $userEmail=$requests->userName;
        $userPwd=$requests->userPwd;
        // $myAllUser=new UserModel();
        // print_r($myAllUser);exit;
        $userData = DB::table('users')->get();//get all data
        $userNameCheck=DB::table('users')->where('email',$userEmail)->first();
        $userPwdCheck=DB::table('users')->where('password',$userPwd)->first();
        if(isset($userNameCheck)&&!empty($userNameCheck)&&isset($userPwdCheck)&&!empty($userPwdCheck)){
            if($userNameCheck->password==$userPwdCheck->password &&$userNameCheck->email==$userPwdCheck->email){
                return redirect()->action('indexLoginController@loginSuccess');
            }else{
                $msg="false";
                // return redirect('/login');//如果用redirect，後面不能帶參數
                return Redirect::back()->withErrors(['PwdError'=>"PwdError", 'Shit'=>"fuck"]);//如果要帶值回頁面提醒，這方式還是最快
            }
        }else{
            $msg="false5566";
            // return redirect('/');
            return Redirect::back()->withErrors(['PwdError'=>"PwdError!!", 'Shit'=>"fuck"]);//如果要帶值回頁面提醒，這方式還是最快，這裡的Redirect是檔案，看清楚後面有接兩個分號所以是檔案，呼叫底下的back funciton
            // return redirect()->route('MyLoginPage', [$msg]);//使用此方式route要有給予name，然後你帶的參數會放在網址上
        }
        // print_r($userNameCheck);exit;
        
    }

    public function loginSuccess(){
        return view('login.indexPage');
    }
}
