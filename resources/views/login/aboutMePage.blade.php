<!doctype html>
<html>
    <head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"><!--css about font-awesome-->
<link rel="stylesheet" href="css/flexslider.css" type="text/css">
<script src="js/jquery.flexslider.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<title>About James</title>
    </head>
    <body style="background-color:#4D4D4F;overflow-x: hidden;">
        <div id="logOutButton" style="margin-top:1%;margin-right:1%;cursor:pointer;" class="text-right" ><a class="text-white " href="{{ url('/logout') }}"><b>登出</b></a></div>
        <div id=" blog-header headTopContainer" class="container">
            <div class=" py-3 row align-items-center">
                <div class="col-12">
                        <h1 class=" text-center blog-header-logo text-white">AboutMe</h1>
                        
                </div>
                
            </div>
            <!-- <ul class="nav nav-list"><li class="divider"></li></ul> -->
            
        </div>
        <hr size="10" color="white" style="margin-left:15%;margin-right:15%;"><!--this is line to separate -->
        <div id="headerContainer" class="container"><!--container is 置中-->
            <div class="nav-scroller py-1 mb-2">
                <nav  class="nav justify-content-between">
                    <a class="p-2 text-white" href="{{url('/index')}}"><i class="fa fa-home"></i> 首頁</a>
                    <a href="{{url('/aboutMe')}}" id="aboutMe" class="p-2 text-white"><i class="fa fa-address-card"></i> 關於我</a>
                    <a href="{{url('/index')}}" class="p-2 text-white"><i class="fa fa-list-alt"></i> 作品資訊</a>
                    <a href="{{url('/index')}}" class="p-2 text-white"><i class="fa fa-child"></i> 聯絡我</a>
                 
                </nav>
            </div>
        </div>
        <div style="" id="mainContainer">
            <div class="row" style="margin-left:13%;">
                <div class="text-center" style="margin-top:10px;">
                <img class="" style="border-radius:15px;" src="image/companyImg/nanshan.PNG" alt="" width="" height="">
                </div>
                <div class="text-justify container" style="margin-top:6px;height:200px;width:600px;background-color:white;border-radius: 15px;margin-left:2%;">
                    <div style="margin-top:4%;">
                        <h2><b>南山IT部門經歷</b></h2>
                    <b>&nbsp;&nbsp;在2017年進入南山境界專案，當時擔任BPM(Business Progress Management) Team裡的前端工程師，在team裡面關於前端的Defect都由我處理，
                        主要是使用SAPUI5在做開發與維護系統，並且當時有接觸到一些後端的處理，並參加境界專案開發的Meeting，與國外顧問討論問題與開發方面的優化。</b>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-left:13%;margin-top:3%;">
                <div class="text-justify container" style="margin-top:25px;height:330px;width:800px;background-color:white;border-radius: 15px;margin-left:0%;">
                        <div style="margin-top:6%;">
                        <h2><b>域動RD部門經歷</b></h2>
                        <b>&nbsp;&nbsp;在2019年，因想學習更全面的技術，毅然決然地到域動任職，在域動接任了DMP(Data Management Platform)的開發與維護，
                            在這裡有許多面向與南山不同，在域動須具備更多的技能，不只前端的使用，PHP，MYSQL，BigQuery，YII，Laravel，GCP，Git，VM，
                            都是需要學習與上手的必備技能，在域動的一年裡面，這些技能都已熟悉，在每個月一次的月會上，上台與大家分享我們技術方面的更新與理解，
                            讓大家知道我們技術人員主要在maintain什麼事情，對於公司有什麼樣的幫助，很謝謝域動提供的機會讓我成長。
                        </b>
                        </div>
                </div>
                <div class="flexslider " style="width:500px;height:365px;border-radius:15px;margin-right:18%;">
                            
                        <ul class="slides" style="border-radius: 15px;">
                            <li><img style="border-radius:15px;" src="image/companyImg/clickforce01.jpg" alt="" width="300" height="150"></li>
                            <!-- <li><img src="image/companyImg/clickForce02_opt.jpg" alt="" width="400" height="300"></li> -->
                            <li><img style="border-radius:15px;" src="image/companyImg/clickForce03.jpg" alt="" width="300" height="150"></li>
                        </ul>
                </div>
            </div>
        </div>
        <!--以下是list的畫面，應該放在商品資訊那頁-->
        <!-- <div id="categoryAndImage" class="container " >
            <div id="watchsCategory" class="col-3" style="margin-left:-12%;">
                <ul class="list-group" style="">
                        <li class="list-group-item list-group-item-dark ">Cras justo odio</li>
                        <li class="list-group-item list-group-item-dark">Dapibus ac facilisis in</li>
                        <li class="list-group-item list-group-item-dark">Morbi leo risus</li>
                        <li class="list-group-item list-group-item-dark">Porta ac consectetur ac</li>
                        <li class="list-group-item list-group-item-dark">Vestibulum at eros</li>
                </ul>
            </div>
        </div> -->

<script>
    // window.addEventListener("popstate", function(){
    //     alert("test");
    // }, false)
    
   $(function() {
    $(".flexslider").flexslider({
        animation: "slide",
        directionNav: false,//是否顯示左右按鈕
        slideshowSpeed: 3000, //展示时间间隔ms
		animationSpeed: 1000, //滚动时间ms
        touch: true, //是否支持触屏滑动
        animationLoop:true
    });

    
    

    /*拿資料為主
    $('#logOutButton').click(function(){
        $.ajax({
            method:'GET',
            url:'logout',
            data:{},
            success: function( response ){
                // window.location.href = "http://127.0.0.1:8000/";
            },
            error: function( e ) {
                console.log(e);
            }
        });
    });
    */
    
    
    });	

</script>

    </body>
</html>