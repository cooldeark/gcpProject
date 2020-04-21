
<!doctype html>
<html>
<head>
@include('layouts.library')
<title>James's Category</title>
<style>
.font{
  font-family:Tahoma;
}
#testme{

  
  position: relative;

/*這裡的animation-name會綁定到@keyframes那邊的名稱*/
  animation-name: fuck;

  animation-duration: 1s;

  /*指定動畫進行方向，預設是normal是順時針*/
  animation-direction: reverse;

  /*動畫要做幾次，如果是infinte就是一直做不停*/  
  animation-iteration-count: infinite;
}

@keyframes fuck {
  /* 使用百分比的意思是在你所設定秒數的裡面去做變化，在四秒的0%的時候的意思 */
  0%   { left:0px; top:0px;}
  25%  { left:0px; top:0px;}
  50%  {left:0px; top:15px;}
  75%  { left:0px; top:0px;}
  100% {  top:0px;}
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
            <div id="setCenterDiv" class="d-flex justify-content-center align-items-center h-100 row mt-5 pt-5"><!--position:fixed;top:55%;left:50%;-->
              <img src="{{asset('image/arrow2.png')}}" id="testme" style="color:white;"></img>
            </div>
            
        </div>
        
        <div class="overlay"></div>
    </header>
    <section class="site" style="height:100%;overflow:auto;" id="MyMainContainer">
    <div id="headerContainer" class="container"><!--container is 置中-->
      @include('layouts.topBanner')
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
            Sapui5 , Javascript , Jquery , Html , Css , PHP , SQL , RegExp<br>
            
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