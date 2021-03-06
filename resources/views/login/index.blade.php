
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/index.css"/>
@include('layouts.library')
<title>James's Category</title>
<style>
.font{
  font-family:Tahoma;
}
#arrowPng{

  cursor: pointer;
  position: relative;

/*這裡的animation-name會綁定到@keyframes那邊的名稱*/
  animation-name: arrowPngAnimation;
  opacity: 0.7;
  animation-duration: 1.5s;

  /*指定動畫進行方向，預設是normal是順時針*/
  animation-direction: reverse;

  /*動畫要做幾次，如果是infinte就是一直做不停*/  
  animation-iteration-count: infinite;
}

@keyframes arrowPngAnimation {
  /* 使用百分比的意思是在你所設定秒數的裡面去做變化，在四秒的0%的時候的意思 */
  0%   { left:0px; top:0px;}
  25%  { left:0px; top:0px;}
  50%  {left:0px; top:15px;}
  75%  { left:0px; top:0px;}
  100% {  top:0px;}
}


</style>
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
              <img src="{{asset('image/arrow2.png')}}" id="arrowPng" style="color:white;"></img>
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
            Under below ,these program language were all I'm good at to used .<br><br>
            <b  style="font-size: 50px;"> I'm good at  </b> <br><br>
            <b>Framework : </b>
            Yii , Laravel , CI<br><br>
            <b>Frontend : </b>
            Javascript、Html、 Jquery 、CSS、Angular、React<br><br>
            <b>Backend : </b>
            PHP<br><br>
            <b>Database : </b>
            SQL 、 Redis 、BigQuery 、Athena<br><br>
            <b>Cloud : </b>
            GCP、 AWS<br><br>
            <b>Other : </b>
            Docker、Git<br><br>
          </h3>
        </div> 
    </section>
        

    
        
       
<script>
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

$('#arrowPng').click(function(e){
  window.scrollBy({
    top:wHeight,
    left:0,
    behavior:'smooth'
  });
  
});
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