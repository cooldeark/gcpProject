<!DOCTYPE html>
<html>
<head>
@include('layouts.library')
<style type="text/css"> 
    .formInput {
  width: 100%;
  display: block;
  border: none;
  border-bottom: 1px solid #999;
  padding: 6px 30px;
  font-family: Poppins;
  box-sizing: border-box; 
  border-radius: 0;
} 
.formInput::-webkit-input-placeholder {
color: #999; }
.formInput::-moz-placeholder {
color: #999; }
.formInput:-ms-input-placeholder {
color: #999; }
.formInput:-moz-placeholder {
color: #999; }
.formInput:focus {
border-bottom: 1px solid #222; }
.formInput:focus::-webkit-input-placeholder {
color: #222; }
.formInput:focus::-moz-placeholder {
color: #222; }
.formInput:focus:-ms-input-placeholder {
color: #222; }
.formInput:focus:-moz-placeholder {
color: #222; }
</style> 

</head>
<body style="background-color:#4D4D4F;">
    <div id="mainContainer" class="container">
        <div class="signup-form" style="background-color:white;border-radius:10px;padding:2%;margin-top:15%;box-shadow:3px 3px 5px 6px #424248;">
            <h2 class="form-title" style="margin-left:14%;"><b>註冊</b></h2>
            @if($errors->any())
            <div class="text-center" style="color:red;">{{$errors->first("alreadyExist")}}</div>
            @endif
        <form style="margin-left:20%;" class="register-form" method="POST" action="/userRegist" id="registerForm" name="registerFormData">
            {{csrf_field()}}
            <div style="margin-top:2%;margin-right:2%;">
            <div class="form-group row">
                <label class=" col-sm-2 col-form-label"><i class="fa fa-user"></i> 使用者名稱 : </label><!--col-form-label 是讓字串跟input一樣置中-->
                <input autocomplete="off" class="form-control col-sm-6  formInput" type="text" name="userName" id="userInputName" placeholder="your name" style="" required/>
                <label class="col-form-label" style="display:none;color:red;margin-left:5%;" id="userNameCheck"></label>
            </div>
            <div class="form-group row">
                <label class=" col-sm-2 col-form-label"><i class="fa fa-envelope"></i> 信箱 : </label>
                <input autocomplete="off" class="form-control col-sm-6  formInput" type="text" name="userMail" id="userInputMail" placeholder="mail address" style="" required/>
                <label class="col-form-label" style="display:none;color:red;margin-left:5%;" id="userMailCheck"></label>
            </div>
            <div class="form-group row">
                <label class=" col-sm-2 col-form-label"><i class="fa fa-key"></i> 密碼 : </label>
                <input autocomplete="off" class="form-control col-sm-6  formInput" type="password" name="userPwd" id="userInputPwd" placeholder="password" style="" required/>
                <label class="col-form-label" style="display:none;color:red;margin-left:5%;" id="userPwdCheck"></label>
            </div>
            <div class="form-group row">
                <label class=" col-sm-2 col-form-label"><i class="fa fa-key"></i> 確認密碼 : </label>
                <input autocomplete="off" class="form-control col-sm-6  formInput" type="password" name="userCheckPwd" id="userInputCheckPwd" placeholder="password" style="" required/>
                <label class="col-form-label" style="display:none;color:red;margin-left:5%;" id="userPwdDBCheck"></label>
            </div>
            </div>
            <div class="row">
                <button  class="btn btn-primary   mx-md-5 col-md-2" id="submitBtn" type="submit" onclick="return false">送出</button>
                <button  class="btn btn-primary   mx-md-5 col-md-2" id="cancelBtn" type="button"  onclick="return false">取消</button><!--這裡記得，如果你沒有給button type 你按下enter他會直接觸發取消按鈕-->
            </div>
        </form>
        </div>
    </div>
<script>
    var checkName=false,checkMail=false,checkPwd=false,checkDBPwd=false,checkPwdSame=false;
    var enterCode;
    //原生javascript 監聽用，監聽有分 document or window，這裡我們document就好
    document.addEventListener("keydown",function(event){
        // console.log(event.code);
        // if(event.code=='Enter'){
        //     alert('fuck');
        // }
    });





$('#submitBtn').click(function(){
    
    // var userNameInput=$("input[name='userName']").val();//use name to get value
    var userNameInput=$('#userInputName').val();
    var userMailInput=$('#userInputMail').val();
    var userPwdInput=$('#userInputPwd').val();
    var userPwdCheckInput=$('#userInputCheckPwd').val();

    if(userNameInput=="" || userNameInput==null||userNameInput==undefined){
        $('#userNameCheck').show();
        $('#userNameCheck').text('請輸入使用者名稱');
        checkName=false;
    }else{
        // var checkChinese=new RegExp("[^\\u4e00-\\u9fa5]");//判斷中文
        var checkChinese=new RegExp("^[a-zA-Z0-9]+$");
        // console.log(userNameInput);

        if(checkChinese.test(userNameInput)){
            $('#userNameCheck').hide();
            checkName=true;
        }else{
            $('#userNameCheck').show();
            $('#userNameCheck').text('請輸入英文名稱');
            checkName=false;
        }
    }

    if(userMailInput=="" || userMailInput==null||userMailInput==undefined){
        $('#userMailCheck').show();
        $('#userMailCheck').text('請輸入信箱');
        checkMail=false;
    }else{
        var checkChinese=new RegExp(".*@.*\\..*");

        if(checkChinese.test(userMailInput)){
            $('#userMailCheck').hide();
            checkMail=true;
        }else{
            $('#userMailCheck').show();
            $('#userMailCheck').text('請輸入正確格式');
            checkMail=false;
            
        }
    }

    if(userPwdInput=="" || userPwdInput==null||userPwdInput==undefined){
        $('#userPwdCheck').show();
        $('#userPwdCheck').text('請輸入密碼');
        checkPwd=false;
    }else{
        // var checkChinese=new RegExp("^[a-zA-Z0-9]+$");//只能輸入英數字，這裡有差異一個加號
        var checkChinese=new RegExp("^[a-zA-Z0-9]{6,12}$");
        if(checkChinese.test(userPwdInput)){
            $('#userPwdCheck').hide();
            checkPwd=true;
        }else{
            $('#userPwdCheck').show();
            $('#userPwdCheck').text('請輸入正確格式，長度需6~12位元');
            checkPwd=false;
        }
    }


    if(userPwdCheckInput=="" || userPwdCheckInput==null||userPwdCheckInput==undefined){
        $('#userPwdDBCheck').show();
        $('#userPwdDBCheck').text('請輸入密碼');
        checkDBPwd=false;
    }else{
        var checkChinese=new RegExp("^[a-zA-Z0-9]{6,12}$");
        if(checkChinese.test(userPwdCheckInput)){
            $('#userPwdDBCheck').hide();
            checkDBPwd=true;
        if(userPwdCheckInput==userPwdInput){
            $('#userPwdDBCheck').hide();
            checkPwdSame=true;
        }else{
            $('#userPwdDBCheck').show();
            $('#userPwdDBCheck').text('密碼不相同');
            checkPwdSame=false;
    }
        }else{
            $('#userPwdDBCheck').show();
            $('#userPwdDBCheck').text('請輸入正確格式');
            checkDBPwd=false;
        }
    }
    if(checkName&&checkMail&&checkPwd&&checkDBPwd&&checkPwdSame==true){
        document.registerFormData.submit();//submit 在63行有指定router位置
    }
    });

    $('#cancelBtn').click(function(){
        //此為ajax，是從後端拿值，好像不太能導頁
        // $.ajax({
        //     url:"/register",
        //     data:{fuck:'123'},
        //     type:'GET',
        //     dataType:'json',
        //     success:function(){
        //         console.log('test');
        //     }
        // }).fail(function(){

        // });
        window.location.href="{{url('/')}}";//這就是導頁了
    });
        
    
</script>
</body>
</html>