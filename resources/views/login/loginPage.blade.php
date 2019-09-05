<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link type="text/css" rel="stylesheet" href="{{ asset('css/login.css') }}" >
<title>WelComeToMyWorld</title>
</head>
<body style="background-color:#4D4D4F;"><!--back groundcolor-->
<div  class="container">
    <div class="wrapper fadeInDown mx-auto" >
        <div  class="section" style="margin-top:25%;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-center" style="background-color:#4D4D4F;">
                        <div class="">
                            <div class="fadeInDown">
                                <img src="{{asset('image/logo.png')}}" alt="loginIco" />
                            </div>
                        <div class="card-block">
                            <form name="loginInput" action="/checkAuth" method="POST" aria-required=""><!--action 指定你的route-->
                                {{csrf_field()}}<!--if u post , must have this-->
                            <div class="form-group">
                                <input type="text" id="loginAccount" class=" form-control fadeInDown" name="userName" placeholder="UserEmail"/>
                                <input type="text" style="-webkit-text-security: disc;" id="password" class="  form-control fadeInDown"  name="userPwd" placeholder="UserPassword"/><!--style is gonna make input like password-->
                                <input type="submit" class="fadeInDown" id="submitBtn" value="登入" onclick="return false"/>
                                <a id="registerBtn" class="fadeInDown" href="{{url('/register')}}" style="cursor:auto;">註冊</a>
                                <div id="emailError" style="display:none;color:red;"><b>Email format not correct!</b></div>
                                <div id="PwdError" style="display:none;color:red;"><b>Pwd can't be empty!</b></div>
                                <div id="emailPwdError" style="display:none;color:red;"><b>Email & Pwd Not Correct!</b></div>
                                <?php if($errors->any()):?>
                                <div id="backReturnBack" style="color:red;"><b>{{$errors->first("PwdError")}}</b></div><!--這裡是跟Redirect function做呼應-->
                                <?php endif ?>
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
</script>
</html>
<!--laravel php call method-->
<!-- @php
                {{echo "fucksdfasdf";}}
                @endphp -->
                <!-- <?php echo 'test';?> -->
