<?php

namespace App\Http\Controllers;

// use Request;//這個跟下面Request::get('userPwd')是一套的
use Auth;//如果要使用驗證要有這個
use DB;//need import this to use DB::
use Illuminate\Http\Request;//這個是用在Request $requests
use App\UserModel;//你要使用的model
use Redirect;//要用Redirect back 要import這個
// use Mail;//要寄信要記得，有下面那個Facades\mail就不用這個

//下面兩行是laravel寄信的咚咚
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;//是寄信的檔案自己建立的


class IndexLoginController extends Controller
{
    public function loginPage(Request $request){
        // dd($request->check);
        if(isset($request->check)){
            return view('login.loginPage',['check'=>'true']);
        }else{
            if(Auth::check()){//判斷你是否有登入，如果有登入是回不到登入頁面的
                // print_r("true");exit;
                return redirect()->action('indexLoginController@loginSuccess');
            }else{
                // print_r("false");exit;
                return view('login.loginPage');
            }
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
        // $userPwdCheck=DB::table('users')->where('password',$userPwd)->first();//因密碼hash過，這樣判斷不出來
        if(isset($userNameCheck->emailConfirm)&&!empty($userNameCheck->emailConfirm)){
            $checkConfirmEmail=$userNameCheck->emailConfirm;
        }else{
            $checkConfirmEmail='false';
        }
        // $checkConfirmEmail=$userNameCheck->emailConfirm;

            /* //這裡會不能用是因為每次hash的密碼都不一樣
        if(isset($userNameCheck)&&!empty($userNameCheck)&&isset($userPwdCheck)&&!empty($userPwdCheck)){
            if($userNameCheck->password==$userPwdCheck->password &&$userNameCheck->email==$userPwdCheck->email){
                if($checkConfirmEmail){
                    if(Auth::attempt(['email' => $userEmail, 'password' => $userPwd])){//檢查的時候，密碼自動會幫你hash不用自己來
                        return redirect()->action('indexLoginController@loginSuccess');
                    }
                }else{
                    return Redirect::back()->withErrors(['PwdError'=>"信箱尚未驗證"]);
                }
            }else if($userNameCheck){
                return Redirect::back()->withErrors(['PwdError'=>"密碼錯誤"]);//如果要帶值回頁面提醒，這方式還是最快
            }else if($userPwdCheck){
                return Redirect::back()->withErrors(['PwdError'=>"此信箱不存在"]);//如果要帶值回頁面提醒，這方式還是最快
            }
        }else{
            return Redirect::back()->withErrors(['PwdError'=>"信箱或是密碼錯誤"]);
        }
        */
        
        if(Auth::attempt(['email' => $userEmail, 'password' => $userPwd ,'emailConfirm'=>$checkConfirmEmail])){//檢查的時候，密碼自動會幫你hash不用自己來
            return redirect()->action('indexLoginController@loginSuccess');
        }else if(!isset($userNameCheck)&&empty($userNameCheck)){
            return Redirect::back()->withErrors(['PwdError'=>"此信箱不存在", 'Shit'=>"fuck"]);//如果要帶值回頁面提醒，這方式還是最快
        }else if($checkConfirmEmail=='false'){
            return Redirect::back()->withErrors(['PwdError'=>"信箱尚未驗證", 'Shit'=>"fuck"]);//如果要帶值回頁面提醒，這方式還是最快
        }else{
            return Redirect::back()->withErrors(['PwdError'=>"密碼或信箱錯誤", 'Shit'=>"fuck"]);
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
            // dd(auth()->user()->id);//get login user id
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
        //test sendemail
        /*
        $to = collect([
            ['name' => $userName, 'email' => $userMail]
        ]);
        $sendMailParams=array();
            $emailVerify="https://www.yangminglin.tk/confirmEmail?userMail=".$userVerify;
            $sendMailParams=['userVerify'=>$emailVerify];
            //下方是可以塞給我們sendMail這個class的value
            Mail::to($to)->send(new sendMail($sendMailParams));
            return view('login.loginPage');
            */
        //test sendEmail
        $userPwd=bcrypt($request->userPwd);//加密
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
            //新版寄信，經由laravel start

            // 收件者務必使用 collect 指定二維陣列，每個項目務必包含 "name", "email"
            $to = collect([
                ['name' => $userName, 'email' => $userMail]
            ]);
    
            // 提供給模板的參數，現在這裡的$params是不會有作用的
            /*
            $params = [
                'fuck' => '您好，這是一段測試訊息的內容'
            ];
            */
            // 若要直接檢視模板
            // echo (new Warning($data))->render();die;
            
            //整理我們要給予sendMail 的 value
            $sendMailParams=array();
            $emailVerify="https://www.yangminglin.tk/confirmEmail?userMail=".$userVerify;
            $sendMailParams=['userVerify'=>$emailVerify];
            //下方是可以塞給我們sendMail這個class的value，$sendMailParams會是sendMail.php__construct的帶入參數
            Mail::to($to)->send(new sendMail($sendMailParams));
            // return view('login.loginPage');
            return Redirect::back()->withErrors(['alreadyExist'=>'驗證信在3~5分鐘內會發送至您註冊信箱']);
            //新版寄信，經由laravel end
            

            //此為原生PHP寄信，但是會遇到不安全警告
            //send mail to verify userMail    
            //PHP_EOL是換行
            /*
            $to      = $userMail;
            $subject = 'YangMingLinWebConfirm';
            $message = "Hi , please click link to verify your Account :".PHP_EOL." https://www.yangminglin.tk/confirmEmail?userMail=".$userVerify.PHP_EOL.PHP_EOL."Best Regards".PHP_EOL."JamesLin";
            // $headers = "MIME-Version: 1.0" . "\r\n";
            // $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
            $headers='From: cooldeark@gmail.com' . "\r\n" .    
                'Reply-To: cooldeark@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);
            */

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
        
        if(Auth::check()){
            return view('login.productPageCase');
            // return view('productBlade.dmp');
        }else{
            return redirect()->action('indexLoginController@loginPage');
        }
        
    }

    public function productDMP(){
        
        if(Auth::check()){
            return view('productBlade.dmp');
        }else{
            return redirect()->action('indexLoginController@loginPage');
        }
        
    }

    public function productDSP(){
        
        if(Auth::check()){
            return view('productBlade.dsp');
        }else{
            return redirect()->action('indexLoginController@loginPage');
        }
        
    }

    public function productSSP(){
        
        if(Auth::check()){
            return view('productBlade.ssp');
        }else{
            return redirect()->action('indexLoginController@loginPage');
        }
        
    }


    public function productEAS(){
        
        if(Auth::check()){
            return view('productBlade.eas');
        }else{
            return redirect()->action('indexLoginController@loginPage');
        }
        
    }

    public function productCUA(){
        
        if(Auth::check()){
            return view('productBlade.cua');
        }else{
            return redirect()->action('indexLoginController@loginPage');
        }
        
    }



    public function testEmail(){
        $message = "Hi , please click link to verify your Account :".PHP_EOL." https://www.yangminglin.tk/confirmEmail?userMail=".PHP_EOL.PHP_EOL."Best Regards".PHP_EOL."JamesLin";
        $data=['tel'=>'12345678'];
        Mail::send('login.post',$data, function($message)
        {
            $message->to('cooldeark@gmail.com', 'fuck')->subject('Welcome!');
        });
    }


    public function wordCloud(){
        return view('wordCloud');
    }

    
}
