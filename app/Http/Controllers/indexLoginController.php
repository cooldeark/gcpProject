<?php

namespace App\Http\Controllers;

// use Request;//這個跟下面Request::get('userPwd')是一套的
use Auth;//如果要使用驗證要有這個
use DB;//need import this to use DB::
use Illuminate\Http\Request;//這個是用在Request $requests
use App\UserModel;//你要使用的model
use Redirect;//要用Redirect back 要import這個


class IndexLoginController extends Controller
{
    public function loginPage(){
        if(Auth::check()){//判斷你是否有登入，如果有登入是回不到登入頁面的
            // print_r("true");exit;
            return redirect()->action('indexLoginController@loginSuccess');
        }else{
            // print_r("false");exit;
            return view('login.loginPage');
        }
        
    }

    public function checkAuth(Request $requests){//form input need $request to catched
        if(Auth::check()){
            return redirect()->action('indexLoginController@loginSuccess');
        }else{
        $userEmail=$requests->userName;
        $userPwd=$requests->userPwd;

        // $hashUserPwd=bcrypt($requests->userPwd);//這個是讓密碼加密
        // print_r($hashUserPwd);exit;
        // $userPwd=$requests->userPwd;
        // print_r($userPwd);exit;
        // $test = bcrypt(Request::get('userPwd'));//這個是可以直接取得輸入的值
        $userNameCheck=DB::table('users')->where('email',$userEmail)->first();
        $userPwdCheck=DB::table('users')->where('password',$userPwd)->first();
        if(Auth::attempt(['email' => $userEmail, 'password' => $userPwd])){//檢查的時候，密碼自動會幫你hash不用自己來
            return redirect()->action('indexLoginController@loginSuccess');
        }else if($userNameCheck){
            return Redirect::back()->withErrors(['PwdError'=>"密碼錯誤", 'Shit'=>"fuck"]);//如果要帶值回頁面提醒，這方式還是最快
        }else if($userPwdCheck){
            return Redirect::back()->withErrors(['PwdError'=>"此信箱不存在", 'Shit'=>"fuck"]);//如果要帶值回頁面提醒，這方式還是最快
        }else{
            return Redirect::back()->withErrors(['PwdError'=>"無此使用者", 'Shit'=>"fuck"]);
        }
        // $myAllUser=new UserModel();
        // print_r($myAllUser);exit;
        /*
        //以下是使用DB直接去確認的方式
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
        */
        // print_r($userNameCheck);exit;
        }
        
        
    }

    public function loginSuccess(){
        if(Auth::check()){  
            return view('login.index');
        }else{
            // return redirect()->action('indexLoginController@loginPage');
            return view('login.loginPage');
        }
        
    }

    public function logOut(){
        Auth::logout();
        return redirect()->action('indexLoginController@loginPage');
    }

    public function register(){
        if(Auth::check()){
            return redirect()->action('indexLoginController@loginSuccess');
        }else{
            return view('login.registerPage');
        }
        
    }

    public function createUser(Request $request){
        $userName=$request->userName;
        $userMail=$request->userMail;
        $userVerify=md5($userMail);
        $userPwd=bcrypt($request->userPwd);
        $checkUserExist=DB::table('users')->where('name',$userName)->first();
        $checkMailExist=DB::table('users')->where('email',$userMail)->first();
        // $userCheckPwd=$request->userCheckPwd;
        if($checkUserExist&&$checkMailExist){
            return Redirect::back()->withErrors(['alreadyExist'=>'使用者與信箱皆已註冊過，請更換']);//如果要帶值回頁面提醒，這方式還是最快
        }else if($checkUserExist){
            return Redirect::back()->withErrors(['alreadyExist'=>'使用者已註冊過，請更換']);
        }else if($checkMailExist){
            return Redirect::back()->withErrors(['alreadyExist'=>'信箱已註冊過，請更換']);
        }else{
            //建立使用者
            $createUser=UserModel::create([
                'name'=>$userName,
                'email'=>$userMail,
                'password'=>$userPwd,
                'md5Mail'=>$userVerify
            ]);

            //send mail to verify userMail    
            
            $to      = $userMail;
            $subject = 'YangMingLinWebConfirm';
            $message = 'Hi , please click link under below:<br> https://www.yangminglin.tk/confirmEmail?userMail='.$userVerify;
            $headers = 'From: cooldeark@gmail.com' . "\r\n" .
                'Reply-To: cooldeark@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);

        }
        
        
        return redirect()->action('indexLoginController@loginPage');
/*
        $test=new \stdClass();//新版要這樣宣告object
        $test->name=$userName;
        $test->mail=$userMail;
        $test->pwd=$userPwd;
        $test->dbpwd=$userCheckPwd;
        print_r($test);exit;
*/
    }

    public function aboutMe(){
        if(Auth::check()){
            return view('login.aboutMePage');
        }else{
            return redirect()->action('indexLoginController@loginPage');
        }
        
    }
    public function product(){
        return view('login.productPage');
    }

    
}
