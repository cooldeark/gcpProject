<!DOCTYPE html>
<html>
<head>
@include('layouts.library')
<link type="text/css" rel="stylesheet" href="{{ asset('css/login.css') }}" >
<title>WelComeToMyWorld</title>
<!--ClickForce trace code-->
<!-- <script async src='https://cdn.doublemax.net/dmp/cft/tracker.js'></script> -->

  <!--ClickForce trace code-->
</head>
<body style="background-color:#4D4D4F;"><!--back groundcolor-->
 
<div  class="container">
    <div class="wrapper fadeInDown mx-auto" >
        <div  class="section" style="margin-top:20%;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-center" style="background-color:#4D4D4F;">
                        <div class="">
                            <div class="fadeInDown  p-4"><!--p-3是bootstrap padding -->
                                <img src="{{asset('image/005.jpg')}}" alt="loginIco" />
                            </div>
                        <div class="card-block">
                            <form name="loginInput" action="/checkAuth" method="POST" aria-required=""><!--action 指定你的route-->
                                {{csrf_field()}}<!--if u post , must have this-->
                            <div class="form-group">
                                <input type="text" id="loginAccount" class=" form-control fadeInDown" name="userName" placeholder="UserEmail"/>
                                <input autocomplete="off" type="text" style="-webkit-text-security: disc;" id="password" class="form-control fadeInDown"  name="userPwd" placeholder="UserPassword"/><!--style is gonna make input like password,autocomplete="off"可以讓輸入框不紀錄輸入過的值-->
                                <input type="submit" class="fadeInDown" id="submitBtn" value="登入" onclick="return false"/>
                                <a id="registerBtn" class="fadeInDown" href="{{url('/register')}}" style="cursor:auto;">註冊</a>
                                <div id="emailError" style="display:none;color:red;"><b>信箱格式錯誤!</b></div>
                                <div id="PwdError" style="display:none;color:red;"><b>密碼不能為空!</b></div>
                                <div id="emailPwdError" style="display:none;color:red;"><b>信箱 或 密碼 不正確!</b></div>
                                <?php if($errors->any()):?>
                                <div id="backReturnBack" style="color:red;"><b>{{$errors->first("PwdError")}}</b></div><!--這裡是跟Redirect function做呼應-->
                                <?php endif ?>
                                <?php if(isset($check)):?>
                                <div style="color:red;">驗證成功</div>
                                <?php endif?>
                            </div>
                            
                            </form>
                                
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
$('#submitBtn').click(function(){
    cft('send', 'event', {//自己分析自己ㄎㄎ
    action: 'clickLoginBtn',
    category: '',
    label: '',
  });
    var myInputMail=$("input[name='userName']").val();
    var myInputPwd=$("input[name='userPwd']").val();
    var checkValid= new RegExp(".*\\@\\w{0,10}\\.\\w{0,10}\\.\\w{0,6}");//這裡有重點，在javascript裡面，原本正規表達式長這樣 .*\@\w{0,10}\.\w{0,10}\.\w{0,6}  ，因為javascript\要多加一條，所以都加上多一條就沒事惹
    var checkValid2= new RegExp(".*\\@\\w{0,10}\\.\\w{0,10}");
    var checkEmail=false;
    var checkPwd=false;
    var checkBackFail=false;
    var backReturnBack=$('#backReturnBack').text();
    if(backReturnBack!="" || backReturnBack!=undefined || backReturnBack!=null){
        checkBackFail=true;
    }
    
    if(!(checkValid.test(myInputMail)) || !(checkValid2.test(myInputMail)) && myInputPwd==""|| myInputPwd==undefined || myInputPwd==null){
        
        checkEmail=false;
        checkPwd=false;
    }
    if( checkValid.test(myInputMail) || checkValid2.test(myInputMail)){
        checkEmail=true;
    }
    if(myInputPwd==""|| myInputPwd==undefined || myInputPwd==null){
        checkPwd=false;
    }else{
        checkPwd=true;
    }

    if(checkPwd==false&&checkEmail==false){
        $('#backReturnBack').hide();
        $('#emailPwdError').show();
        $('#PwdError').hide();
        $('#emailError').hide();
    }else if(checkPwd==false){
        $('#emailPwdError').hide();
        $('#PwdError').show();
        $('#emailError').hide();
        $('#backReturnBack').hide();
    }else if(checkEmail==false){
        $('#emailPwdError').hide();
        $('#PwdError').hide();
        $('#emailError').show();
        $('#backReturnBack').hide();
    }else{
        document.loginInput.submit();
    }

    
});

$('#registerBtn').click(function(){
//   cft('send', 'event', {
//     action: 'JamesTestInHome',    // 事件動作
//     category: 'youHappy',    // 事件類別
//     label: 'HappyTag',    // 事件標籤
//   });
  cft('send', 'event', {//自己分析自己ㄎㄎ
    action: 'clickRegisterBtn',
    category: '',
    label: '',
  });
});


</script>
</html>
<!--laravel php call method-->
<!-- @php
                {{echo "fucksdfasdf";}}
                @endphp -->
                <!-- <?php echo 'test';?> -->
