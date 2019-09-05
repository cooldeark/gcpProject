<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"><!--css about font-awesome-->
<link rel="stylesheet" href="css/aboutMe.css">    
</head>
<body style="overflow:hidden;"><!--治標不治本的方式，讓scrollbar消失，所以就會固定上面bar條了-->

<div class="nav-scroller py-1 mb-2">
                <nav  class="nav justify-content-between">
                    <a class="p-2 text-white" href="{{url('/index')}}"><i class="fa fa-home"></i> 首頁</a>
                    <a href="{{url('/aboutMe')}}" id="aboutMe" class="p-2 text-white"><i class="fa fa-address-card"></i> 關於我</a>
                    <a href="{{url('/index')}}" class="p-2 text-white"><i class="fa fa-list-alt"></i> 作品資訊</a>
                    <a href="{{url('/index')}}" class="p-2 text-white"><i class="fa fa-child"></i> 聯絡我</a>
                    <a href="{{url('/logout')}}" class="p-2 text-white"><i class="fa fa-blind"></i> 登出</a>
                </nav>
</div>
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
          <p class="skw-page__description">&nbsp;&nbsp;在2017年進入南山境界專案，當時擔任BPM(Business Progress Management) Team裡的前端工程師，在team裡面關於前端的Defect都由我處理，
              主要是使用SAPUI5在做開發與維護系統，並且當時有接觸到一些後端的處理，並參加境界專案開發的Meeting，與國外顧問討論問題與開發方面的優化。</p>
        </div>
      </div>
    </div>
  </div>
  <div class="skw-page skw-page-2">
    <div class="skw-page__half skw-page__half--left">
      <div class="skw-page__skewed">
        <div class="skw-page__content">
          <h2 class="skw-page__heading">南山IT部門經歷</h2>
          <p class="skw-page__description">&nbsp;&nbsp;在2017年進入南山境界專案，當時擔任BPM(Business Progress Management) Team裡的前端工程師，在team裡面關於前端的Defect都由我處理，
              主要是使用SAPUI5在做開發與維護系統，並且當時有接觸到一些後端的處理，並參加境界專案開發的Meeting，與國外顧問討論問題與開發方面的優化。</p>
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
              在這裡有許多面向與南山不同，在域動須具備更多的技能，不只前端的使用，PHP，MYSQL，BigQuery，YII，Laravel，GCP，Git，VM，
              都是需要學習與上手的必備技能，在域動的一年裡面，這些技能都已熟悉，在每個月一次的月會上，上台與大家分享我們技術方面的更新與理解，
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
              在這裡有許多面向與南山不同，在域動須具備更多的技能，不只前端的使用，PHP，MYSQL，BigQuery，YII，Laravel，GCP，Git，VM，
              都是需要學習與上手的必備技能，在域動的一年裡面，這些技能都已熟悉，在每個月一次的月會上，上台與大家分享我們技術方面的更新與理解，
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
          <h2 class="skw-page__heading">不知道要放啥我在想想ㄏㄏ</h2>
          <p class="skw-page__description">
            :DDDDDDDDDDDDDDDDDDD 偶好帥
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
      
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
</script>
</body>
</html>