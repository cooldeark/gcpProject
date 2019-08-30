<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/index.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"><!--css about font-awesome-->

<title>James's Category</title>
</head>
<body style="">
    <header>
        <div class="content">
            <hgroup>
            <h1>Hi ! I'm James.</h1>
            <i>Know Me More</i>
            </hgroup>
        </div>
        <div class="overlay"></div>
    </header>
    <section class="site">
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
    </section>
        <button id="test">test</button>
        

    
        
    <div id="mainContainer">

    </div>    
<script>
//Based on the Scroller function from @sallar
var $content = $('header .content')
  , $blur    = $('header .overlay')
  , wHeight  = $(window).height();

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
    $blur.css('background-image',$('header:first-of-type').css('background-image'));
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
    
    $content.css({
      'transform'         : 'translateY(' + slowScroll + 'px)',
      '-moz-transform'    : 'translateY(' + slowScroll + 'px)',
      '-webkit-transform' : 'translateY(' + slowScroll + 'px)',
      'opacity' : opaScroll
    });
    
    $blur.css({
      'opacity' : blurScroll / wHeight
    });
  }
};


var scroller = new Scroller();  
scroller.init();
////////////////////////////




</script>

</body>
</html>