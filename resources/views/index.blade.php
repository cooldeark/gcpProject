<!doctype html>
<html>
    <head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"><!--css about font-awesome-->
<link rel="stylesheet" href="css/flexslider.css" type="text/css">
<script src="js/jquery.flexslider.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<title>手錶專賣</title>
    </head>
    <body style="background-color:#4D4D4F;">
        
        <div id=" blog-header headTopContainer" class="container">
            <div class=" py-3 row align-items-center">
                <div class="col-12">
                        <h1 class=" text-center blog-header-logo text-white">Watches</h1>
                </div>
                
            </div>
            <!-- <ul class="nav nav-list"><li class="divider"></li></ul> -->
            
        </div>
        <hr size="10" color="white" style="margin-left:15%;margin-right:15%;"><!--this is line to separate -->
        <div id="mainContainer" class="container"><!--container is 置中-->
            <div class="nav-scroller py-1 mb-2">
                <nav  class="nav justify-content-between">
                    <a class="p-2 text-white"><i class="fa fa-home"></i> 首頁</a>
                    <a class="p-2 text-white"><i class="fa fa-address-card"></i> 關於我們</a>
                    <a class="p-2 text-white"><i class="fa fa-list-alt"></i> 商品資訊</a>
                    <a class="p-2 text-white"><i class="fa fa-child"></i> 聯絡我們</a>
                 
                </nav>
            </div>
        </div>
        <div id="imageContainer" class="container" >
            <div class="flexslider" style="width:100%;height:25%;">
                    <ul class="slides">
                        <li><img src="image/watchs/a4.jpg" alt="" width="800" height="400"></li>
                        <li><img src="image/watchs/a5.jpg" alt="" width="800" height="400"></li>
                        <li><img src="image/watchs/a6.jpg" alt="" width="800" height="400"></li>
                    </ul>
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
   $(function() {
    $(".flexslider").flexslider({
        animation: "slide",
        directionNav: false,//是否顯示左右按鈕
        slideshowSpeed: 3000, //展示时间间隔ms
		animationSpeed: 1000, //滚动时间ms
        touch: true, //是否支持触屏滑动
        animationLoop:true
    });
    });	
  
</script>

    </body>
</html>