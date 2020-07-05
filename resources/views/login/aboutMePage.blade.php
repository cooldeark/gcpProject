<!DOCTYPE html>
<html>
<head>
@include('layouts.library')
<link rel="stylesheet" href="css/aboutMe.css">    
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<body style="overflow:hidden;"><!--治標不治本的方式，讓scrollbar消失，所以就會固定上面bar條了-->
<section class="site" style="height:100%;overflow:auto;" id="MyMainContainer">
  @include('layouts.topBanner')
<div class="skw-pages">
  <div class="skw-page skw-page-1 active">
    <div class="skw-page__half skw-page__half--left">
      <div class="skw-page__skewed">
        <div class="skw-page__content"></div>
      </div>
    </div>
    <div class="skw-page__half skw-page__half--right">
      <div class="skw-page__skewed">
        <div class="skw-page__content">
          <h2 class="skw-page__heading">南山IT部門經歷</h2>
          <p class="skw-page__description">&nbsp;&nbsp;在2017年進入南山境界專案，當時擔任BPM(Business Progress Management) Team的工程師，在team裡面support frontend & backend的Defect都由我處理，
              使用javascript & html在做開發與維護系統，並使用php處理後端，並參加境界專案開發的Meeting，與國外顧問討論問題與開發方面的優化。</p>
        </div>
      </div>
    </div>
  </div>
  <div class="skw-page skw-page-2">
    <div class="skw-page__half skw-page__half--left">
      <div class="skw-page__skewed">
        <div class="skw-page__content">
          <h2 class="skw-page__heading">南山IT部門經歷</h2>
          <p class="skw-page__description">&nbsp;&nbsp;在2017年進入南山境界專案，當時擔任BPM(Business Progress Management) Team的工程師，在team裡面support frontend & backend的Defect都由我處理，
              使用javascript & html在做開發與維護系統，並使用php處理後端，並參加境界專案開發的Meeting，與國外顧問討論問題與開發方面的優化。</p>
        </div>
      </div>
    </div>
    <div class="skw-page__half skw-page__half--right">
      <div class="skw-page__skewed">
        <div class="skw-page__content"></div>
      </div>
    </div>
  </div>
  <div class="skw-page skw-page-3">
    <div class="skw-page__half skw-page__half--left">
      <div class="skw-page__skewed">
        <div class="skw-page__content"></div>
      </div>
    </div>
    <div class="skw-page__half skw-page__half--right">
      <div class="skw-page__skewed">
        <div class="skw-page__content">
          <h2 class="skw-page__heading">域動RD部門經歷</h2>
          <p class="skw-page__description">&nbsp;&nbsp;在2019年，因想學習更全面的技術，毅然決然地到域動任職，在域動接任了DMP(Data Management Platform)的開發與維護，
              在這裡有許多面向與南山不同，在域動須具備更多的技能，不只是一般full-stack的技能，CI，GCP，BigQuery，AWS，YII，Laravel，Git，VM，
              都是需要學習與上手的必備技能，在域動的一年裡面，這些技能都已熟悉，並且在公司維護與承接越來越多系統，EAS，SSP，DSP，CUA....，在每個月一次的月會上，上台與大家分享我們技術方面的更新與理解，
              讓大家知道我們技術人員主要在maintain什麼事情，對於公司有什麼樣的幫助，很謝謝域動提供的機會讓我成長。</p>
        </div>
      </div>
    </div>
  </div>
  <div class="skw-page skw-page-4">
    <div class="skw-page__half skw-page__half--left">
      <div class="skw-page__skewed">
        <div class="skw-page__content">
          <h2 class="skw-page__heading">域動RD部門經歷</h2>
          <p class="skw-page__description">&nbsp;&nbsp;在2019年，因想學習更全面的技術，毅然決然地到域動任職，在域動接任了DMP(Data Management Platform)的開發與維護，
              在這裡有許多面向與南山不同，在域動須具備更多的技能，不只是一般full-stack的技能，CI，GCP，BigQuery，AWS，YII，Laravel，Git，VM，
              都是需要學習與上手的必備技能，在域動的一年裡面，這些技能都已熟悉，並且在公司維護與承接越來越多系統，EAS，SSP，DSP，CUA....，在每個月一次的月會上，上台與大家分享我們技術方面的更新與理解，
              讓大家知道我們技術人員主要在maintain什麼事情，對於公司有什麼樣的幫助，很謝謝域動提供的機會讓我成長。</p>
        </div>
      </div>
    </div>
    <div class="skw-page__half skw-page__half--right">
      <div class="skw-page__skewed">
        <div class="skw-page__content"></div>
      </div>
    </div>
  </div>
  <div class="skw-page skw-page-5">
    <div class="skw-page__half skw-page__half--left">
      <div class="skw-page__skewed">
        <div class="skw-page__content"></div>
      </div>
    </div>
    <div class="skw-page__half skw-page__half--right">
      <div class="skw-page__skewed">
        <div class="skw-page__content">
          <h2 class="skw-page__heading">域動活動</h2>
          <p class="skw-page__description">
          &nbsp;&nbsp;在公司裡面我是大家的開心果，被頒發最幽默的獎項，很謝謝大家投票選我。
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<script>
$(document).ready(function() {

var curPage = 1;
var numOfPages = $(".skw-page").length;
var animTime = 1000;
var scrolling = false;
var pgPrefix = ".skw-page-";

function pagination() {
  scrolling = true;

  $(pgPrefix + curPage).removeClass("inactive").addClass("active");
  $(pgPrefix + (curPage - 1)).addClass("inactive");
  $(pgPrefix + (curPage + 1)).removeClass("active");

  setTimeout(function() {
    scrolling = false;
  }, animTime);
};

function navigateUp() {
  if (curPage === 1) return;
  curPage--;
  pagination();
};

function navigateDown() {
  if (curPage === numOfPages) return;
  curPage++;
  pagination();
};

$(document).on("mousewheel DOMMouseScroll", function(e) {
  if (scrolling) return;
  if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) {
    navigateUp();
  } else { 
    navigateDown();
  }
});

$(document).on("keydown", function(e) {
  if (scrolling) return;
  if (e.which === 38) {
    navigateUp();
  } else if (e.which === 40) {
    navigateDown();
  }
});

});

$(".skw-pages").hover(function(){
  
  $('.skw-page__content').attr('title', 'Scroll mouse wheel to see more~');
  $('.skw-page__skewed').attr('title', 'Scroll mouse wheel to see more~');
});

$(".skw-page__content").hover(function(){
  
  $('.skw-page__content').attr('title', 'Scroll mouse wheel to see more~');
  $('.skw-page__skewed').attr('title', 'Scroll mouse wheel to see more~');
});

$(".skw-page__skewed").hover(function(){
  
  $('.skw-page__content').attr('title', 'Scroll mouse wheel to see more~');
  $('.skw-page__skewed').attr('title', 'Scroll mouse wheel to see more~');
});

</script>
</body>
</html>