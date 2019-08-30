<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"><!--css about font-awesome-->
<link rel="stylesheet" href="css/product.css">    
</head>
<body>
    <header>
        <div class="content">
          <hgroup>
            <h1>LOGO</h1>
            <i>slogan</i>
          </hgroup>
        </div>
        <div class="overlay"></div>
      </header>
      <section class="site">
        <nav>
          <a href="">Page</a>
          <a href="">Page</a>
          <a href="">Page</a>
          <a href="">Page</a>
          <a href="">Page</a>
        </nav>
        <blockquote>
       <img src="http://d.gr-assets.com/authors/1397426898p5/203714.jpg" align="left" >
       “I invented nothing new. I simply assembled the discoveries of other men behind whom were centuries of work. 
       Had I worked fifty or ten or even five years before, I would have failed. So it is with every new thing. Progress 
       happens when all the factors that make for it are ready, and then it is inevitable. To teach that a comparatively few men 
       are responsible for the greatest forward steps of mankind is the worst sort of nonsense.”
      ― Henry Ford
        </blockquote>
        
      </section>
      <blockquote>
        <img src="http://d.gr-assets.com/authors/1397426898p5/203714.jpg" align="left" >
        “I invented nothing new. I simply assembled the discoveries of other men behind whom were centuries of work. 
        Had I worked fifty or ten or even five years before, I would have failed. So it is with every new thing. Progress 
        happens when all the factors that make for it are ready, and then it is inevitable. To teach that a comparatively few men 
        are responsible for the greatest forward steps of mankind is the worst sort of nonsense.”
       ― Henry Ford
         </blockquote>
<script>
//Based on the Scroller function from @sallar
var showContent = $('header .content')
  , showBlur    = $('header .overlay')
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
    showBlur.css('background-image',$('header:first-of-type').css('background-image'));
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
    
    showContent.css({
      'transform'         : 'translateY(' + slowScroll + 'px)',
      '-moz-transform'    : 'translateY(' + slowScroll + 'px)',
      '-webkit-transform' : 'translateY(' + slowScroll + 'px)',
      'opacity' : opaScroll
    });
    
    showBlur.css({
      'opacity' : blurScroll / wHeight
    });
  }
};


var scroller = new Scroller();  
scroller.init();
</script>
</body>
</html>