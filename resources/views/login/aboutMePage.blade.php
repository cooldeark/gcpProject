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
          <p class="skw-page__description">&nbsp;&nbsp;在2017年進入南山境界專案，當時擔任BPM(Business Progress Management) Team的工程師，在team裡面support frontend & backend的Defect都是我處理的範圍，
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
          <p class="skw-page__description">&nbsp;&nbsp;在南山裡面學習到如何跟不同的Team co-work，能清楚的理解對方的需求與清晰表達自身的想法，並學習到開發後的驗證流程，如何嚴謹的測試是否有與其他function 有 dependency，在這裡我覺得最有成就的是能維護公司使用量最大的保單簽核系統並站在user角度上去優化UI，讓user使用起來更friendly。</p>
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
          <p class="skw-page__description">&nbsp;&nbsp;在這裡我學習的真的非常多，也大大充實了我對於cloud端的運用，也有許許多多的成就喜悅，其中印象最深刻的是，將公司的cloud機器從GCP搬移到AWS，雖然聽起來只是從一個平台搬移到另一個平台，但是其中的scope真的很龐大，你必須很謹慎的將各個系統所對應到的細節: domain、database、project version...等，都要去驗證，環境的重新建設，理解原生機器的架設方式，是否有安排daily schedule job執行，這件事情主管託付給我去執行，並給予一周去research如何達到，並在一個月內搬遷完畢，想到經過幾天的熬夜，真正go life的時候還是十分的開心!! 其他像是使用雲端資料，使用PHP處理資料速度不夠快，survey後採用python去呼叫datastore執行，或是使用google的虛擬環境經由PHP與python的結合跑出報表，都是非常有成就感的經歷。</p>
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
          <h2 class="skw-page__heading">個人特質</h2>
          <p class="skw-page__description">
          &nbsp;&nbsp;最後說說我自己，我覺得自己滿外向的，在公司裡面我是大家的開心果，上面交代的事情會經由評估後與相關人員討論可行性，並且給予man-day，如是一個team的分量，會經由我分發給予不同team member去處理，並提供協助，最後在公司的活動裡面，被頒發最幽默的獎項，很謝謝公司的大家投票選我。
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