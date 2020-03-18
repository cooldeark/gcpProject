<!doctype html>
<html>
<head>
  <script src="{{asset('js/james-tracker-compile.js')}}"></script>
<link rel="stylesheet" href="css/index.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"><!--css about font-awesome-->

<title>James's Category</title>
<style>
.font{
  font-family:Tahoma;
}
</style>
<script>
  window.cft=window.cft||function(){(cft.q=cft.q||[]).push([].slice.call(arguments))};
  cft('setSiteId', 'JamesWebSite');
  cft('setEnableCookie');
  cft('setViewPercentage');
  cft('setTPCookie');
  console.log("cookie test");
  cft('send', 'event', {//自己分析自己ㄎㄎ
    action: 'loginSuccess',
    category: '',
    label: '',
  });
</script>
</head>
<body style="">
    <a id="directmainContainer" href="#mainContainer" style="display:none;">mainContainer</a>
    <a id="directheaderContainer" href="#headerContainer" style="display:none;">headerContainer</a>
    <header id="headerContainer">
        <div class="content" id="myhead">
            <hgroup>
            <h1>Hi ! I'm James.</h1>
            <i>Scroll Down To Know Me More</i>
            </hgroup>
        </div>
        <div class="overlay"></div>
    </header>
    <section class="site" style="height:100%;overflow:auto;" id="MyMainContainer">
        <div id="headerContainer" class="container"><!--container is 置中-->
            <div class="nav-scroller py-1 mb-2">
                <nav  class="nav justify-content-between">
                    <a class="p-2 text-white" href="{{url('/index')}}"><i class="fa fa-home"></i> 首頁</a>
                    <a href="{{url('/aboutMe')}}" id="aboutMe" class="p-2 text-white"><i class="fa fa-address-card"></i> 關於我</a>
                    <a href="{{url('/index')}}" class="p-2 text-white"><i class="fa fa-list-alt"></i> 作品資訊</a>
                    <a href="{{url('/index')}}" class="p-2 text-white"><i class="fa fa-child"></i> 聯絡我</a>
                    <a href="{{url('/logout')}}" class="p-2 text-white"><i class="fa fa-blind"></i> 登出</a>
                </nav>
            </div>
        </div>
        <div id="mainContainer" class="">
          <h1 style="font-size: 70px;" class="col-md-12">I love Programing</h1>
          <h3  class="col-md-12 mt-md-4"><!--m is margin t is top -->
            When I'm coding , that's make me enjoy all the time,<br>
            In program language which is good at to used were under below.<br><br>
            <b  style="font-size: 50px;"> I'm good at  </b> <br><br>
            <b>Framework : </b>
            Yii , Laravel , NWDS<br><br>
            <b>Language : </b>
            Sapui5 , Javascript , Jquey , Html , Css , PHP , SQL , RegExp<br>
            
          </h3>
        </div> 
    </section>
        

    
        
       
<script>
  $('.fa-home').click(function(){
    cft('send', 'event', {//自己分析自己ㄎㄎ
    action: 'returnMainPage',
    category: '',
    label: '',
  });
  });

  $('.fa-address-card').click(function(){
    cft('send', 'event', {//自己分析自己ㄎㄎ
    action: 'clickAboutMe',
    category: '',
    label: '',
  });
  });
$('.fa-list-alt').click(function(){
    cft('send', 'event', {//自己分析自己ㄎㄎ
    action: 'clickProduct',
    category: '',
    label: '',
  });
  });

  $('.fa-child').click(function(){
    cft('send', 'event', {//自己分析自己ㄎㄎ
    action: 'clickContactMe',
    category: '',
    label: '',
  });
  });
  $('.fa-blind').click(function(){
    cft('send', 'event', {//自己分析自己ㄎㄎ
    action: 'clickLogOut',
    category: '',
    label: '',
  });
  });
$(function(){
  $(window).scroll(function(){
    //這裡想要做滾動優化，可是還在看要怎做
    // console.log($("#directmainContainer").attr('href'));
  
  var s = $(window).scrollTop(),
      d = $(document).height(),
      c = $(window).height();

  var scrollPercent = Math.floor((s / (d - c)) * 100);
    // if(scrollPercent>=90){
    //   $('#directmainContainer')[0].click();//這裡一定要加上[0]不然抓不到
    // }
    // else if(scrollPercent<=10){
    //   $('#directheaderContainer')[0].click();//這裡一定要加上[0]不然抓不到
    // }

  // console.clear();
  // console.log(scrollPercent);
});
});

//Based on the Scroller function from @sallar =>https://codepen.io/nodws/pen/ugFcC
var myContent=$('header .content')
var myBlur=$('header .overlay')
var wHeight=$(window).height();

$(window).on('resize', function(){
  wHeight = $(window).height();
});

window.requestAnimFrame = (function()
{
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          function( callback ){
            window.setTimeout(callback, 1000 / 60);
          };
})();

function Scroller()
{
  this.latestKnownScrollY = 0;
  this.ticking            = false;
}

Scroller.prototype = {
 
  init: function() {
    window.addEventListener('scroll', this.onScroll.bind(this), false);
    myBlur.css('background-image',$('header:first-of-type').css('background-image'));
  },


  onScroll: function() {
    this.latestKnownScrollY = window.scrollY;
    this.requestTick();
  },

  
  requestTick: function() {
    if( !this.ticking ) {
      window.requestAnimFrame(this.update.bind(this));
    }
    this.ticking = true;
  },

  update: function() {
    var currentScrollY = this.latestKnownScrollY;
    this.ticking       = false;
    
    
    var slowScroll = currentScrollY / 2
      , blurScroll = currentScrollY * 2
      , opaScroll = 1.4 - currentScrollY / 400;
   if(currentScrollY > wHeight)
     $('nav').css('position','fixed');
   else
     $('nav').css('position','absolute');
    
    myContent.css({
      'transform'         : 'translateY(' + slowScroll + 'px)',
      '-moz-transform'    : 'translateY(' + slowScroll + 'px)',
      '-webkit-transform' : 'translateY(' + slowScroll + 'px)',
      'opacity' : opaScroll
    });
    
    myBlur.css({
      'opacity' : blurScroll / wHeight
    });
  }
};
var scroller = new Scroller();  
scroller.init();
//end scroller




</script>

</body>
</html>