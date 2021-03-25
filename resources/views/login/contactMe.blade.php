<!DOCTYPE html>
<html>
    <head>
        @include('layouts.library')
        <link rel="stylesheet" href="css/contactMe.css"/>
    </head>
    <body class="" style='background-image:url("{{asset('image/contactMeBack03.jpg')}}");background-repeat: no-repeat;background-size: cover;'>
        <header>
            <div class="background" id="headerContainer">
                @include('layouts.topBanner')
            </div>
        </header>
        <div  class="container " id="mainContainer"><!--container is 置中-->
            

            <div class="vertical-align" id="contactContainer">
                    <div class="card m-4" style="width:1000px;height:800px;background-color:#dfe4e8;border-radius: 2%;" id="inputInformation">
                        <form class="m-5" method="POST" action="/leaveMessage" id="userPostLeaveMessage" name="userPostLeaveMessage">
                            {{csrf_field()}}
                            <div class="form-group" style="">
                                <label class="inputLabel"><b>信箱</b></label>
                                    <input autocomplete="off" type="email" class="form-control" id="userEmail" name="userEmail" aria-describedby="emailHelp" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label class="inputLabel"><b>稱謂</b></label>
                                    <input autocomplete="off" type="text" class="form-control"  id="userName" name="userName" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label class="inputLabel"><b>內容</b></label>
                                    <textarea class="form-control" id="userComment" name="userComment" rows="17"></textarea>
                                </div>
                                <div class="">
                                    <button id="formInformationBtn" type="submit" class="btn btn-primary" onclick="return false;">送出</button>
                                    <div id="showMessage" style="display:none;color:red;text-align:center;"><b></b></div>
                                    @if($errors->any())
                                    <div style="color:blue;text-align:center;"><b>{{$errors->first('sendSuccess')}}</b></div>
                                    @endif
                                </div>
                               
                        </form>
                    </div>

                    <div style="" id="thePhoto">
                        <img style="max-width:1000px;max-height:800px;border-radius: 2%;" src="{{asset('image/contactMe03.jpg')}}" />
                    </div>
            </div>
        </div>
        
    <script>
        
        $('#formInformationBtn').click(function(){
            var userMail=$('#userEmail').val(),userName=$('#userName').val(),userComment=$('#userComment').val(),message='';
            var formData=$('#userPostLeaveMessage').serializeArray();   
            if(userMail=="" || userMail==null){
                message+='信箱尚未輸入! ';
            }
            if(userName=="" || userName==null){
                message+='稱謂尚未輸入! ';
            }
            if(userComment=="" || userComment==null){
                message+='內容尚未輸入!';
            }

            if(message!=''){
                $('#showMessage').text(message);
                $('#showMessage').css('display','block');
            }else{
                document.userPostLeaveMessage.submit();
            }
            
        });
        
    </script>
    </body>
</html>