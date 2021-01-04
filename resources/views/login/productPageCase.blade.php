
<!doctype html>
<html>
<head>

@include('layouts.library')
<link rel="stylesheet" href="css/product.css"/>
<link rel="stylesheet" href="css/sideBar.css"/>
<title>James's Product</title>
<style>

/* 這裡是匯入外部字體來使用 */
/* @font-face {
  font-family:cuteText;
  src: url(https://fonts.googleapis.com/earlyaccess/cwtexyen.css );
} */

</style>
<script>
  window.cft=window.cft||function(){(cft.q=cft.q||[]).push([].slice.call(arguments))};
  cft('setSiteId', 'JamesWebSite');
  cft('setEnableCookie');
  cft('setViewPercentage');
  cft('setTPCookie');
  console.log("cookie test");
  cft('send', 'event', {
    action: 'inProductPage',
    category: '',
    label: '',
  });
</script>
</head>
<body>
<div id="forTopBannerContainer" class="site">
<!-- @include('layouts.topBannerForLight') -->
</div>
 
<div id="container" class="">
  <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><b>作品集</b></h3>
            </div>
            
            <ul class="list-unstyled components">
                <!-- <p>作品集列表</p> -->
                <li class="active">
                    <a href="#homeFirst" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">系統介紹</a>
                    <ul class="collapse list-unstyled" id="homeFirst">
                        <li>
                            <a href="{{url('/productDMP')}}" >DMP</a>
                        </li>
                        <li>
                            <a href="{{url('/productSSP')}}" >SSP</a>
                        </li>
                        <li>
                            <a href="{{url('/productDSP')}}" >DSP</a>
                        </li>
                        <li>
                            <a href="{{url('/productEAS')}}" >EAS</a>
                        </li>
                        <li>
                            <a href="{{url('/productCUA')}}" >CUA</a>
                        </li>
                        <!-- <li>
                            <a href="#">尚未想到</a>
                        </li> -->
                    </ul>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">接案列表</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{url('/product')}}" >案件介紹</a>
                        </li>
                        <li>
                            <a href="https://www.yangminglin.ga/" target="_blank">前往-卡洛塔妮</a>
                        </li>
                        <li>
                            <a href="https://www.yangminglin.ml/" target="_blank">前往-快點集團</a>
                        </li>
                        <li>
                            <a href="https://happywrite.yangminglin.ml/" target="_blank">前往-樂寫網</a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#homeSecond" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">小作品集</a>
                    <ul class="collapse list-unstyled" id="homeSecond">
                        <li>
                            <a href="{{url('/testExcel')}}" >Excel Download & Upload</a>
                        </li>
                        <li>
                            <a href="{{url('/downLoadWordFile')}}" >Word Download</a>
                        </li>
                        <li>
                            <a href="{{url('/dataTable')}}" >DataTable</a>
                        </li>
                    </ul>
                </li>


                <!-- <li>
                    <a href="#">About</a>
                </li>


                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#">Portfolio</a>
                </li>


                <li>
                    <a href="#">Contact</a>
                </li> -->


            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="{{url('/')}}" class="article"><i class="fa fa-home"></i> 首頁</a>
                </li>
                <li>
                    <a href="{{url('/aboutMe')}}" class="article"><i class="fa fa-address-card"></i> 關於我</a>
                </li>
                <li>
                    <a href="{{url('/product')}}" class="article"><i class="fa fa-list-alt"></i> 作品資訊</a>
                </li>
                <li>
                    <a href="https://line.me/R/ti/p/83diRrD9ou" target="_blank" class="article"><i class="fa fa-child"></i> 聯絡我</a>
                </li>
                <li>
                    <a href="{{url('/logout')}}" class="article"><i class="fa fa-blind"></i> 登出</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn ">
                        <i class="fa fa-align-left"></i>
                        <span>作品集</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- 如果想要多功能，這裡可以用 -->
                        <!-- <ul style="" class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">DMP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">SSP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">DSP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">EAS</a>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </nav>

             <!--part start-->
            <div class="h-30 w-100 row col-md-12 p-2"  id="HighChartsProduct1">
              <div class="col-md-6">
                <h2><b>卡洛塔妮</b></h2>
                <h5 class="mt-5 ml-5"><b>此網站所套用的框架為Laravel，使用簡介:</b></h5>
                    <p style="color:black;" class="mt-5 ml-5">1.需播放完youtube影片才能點選開始遊戲</p>
                    <p style="color:black;" class="mt-5 ml-5">2.開始遊戲需登入FB，並驗證成功才能玩遊戲</p>
                    <p style="color:black;" class="mt-5 ml-5">3.完成遊戲後，可以分享相關內容</p>
                    <p style="color:black;" class="mt-5 ml-5">4.使用session記憶看過影片，如回到首頁不需重複觀賞影片即可點選遊戲鈕</p>
                    <p style="color:black;" class="mt-5 ml-5">5.填寫資料後，會經由處理後顯示在參加名單頁</p>
                <!-- <button class="btn btn-primary" id="highChartBtn">test</button> -->
              </div>
              <div class="col-md-6">
                <img style="max-width: 600px;max-height: 500px;" src="{{asset('image/karihomeLogo.png')}}"/>
              </div>
            </div>
          <!--part end-->

            <div class="line"></div>

            {{--part start--}}
            <div class="h-30 w-100 row col-md-12 p-2"  id="HighChartsProduct2">
                <div class="col-md-6">
                  <h2><b>快點集團</b></h2>
                  <h5 class="mt-5 ml-5"><b>此網站所套用的框架為Codeigniter，使用簡介:</b></h5>
                      <p style="color:black;" class="mt-5 ml-5">1.畫面 紅點、橘點、藍點 經由點擊可替換不同素材顯示</p>
                      <p style="color:black;" class="mt-5 ml-5">2.切換不同顏色，案例分享的顯現方式皆為不同</p>
                 
                </div>
                <div class="col-md-6">
                  <img style="max-width: 600px;max-height: 500px;" src="{{asset('image/agiLogo.png')}}"/>
                </div>
              </div>
                {{--part end--}}
                
              <div class="line"></div>

              <!--part start-->
            <div class="h-30 w-100 row col-md-12 p-2"  id="HighChartsProduct3">
                <div class="col-md-6">
                  <h2><b>樂寫網</b></h2>
                  <h5 class="mt-5 ml-5"><b>此網站所套用的框架為Laravel，使用簡介:</b></h5>
                      <p style="color:black;" class="mt-5 ml-5">1.需註冊，有分教師與學生身分</p>
                      <p style="color:black;" class="mt-5 ml-5">2.註冊成功後，會發信給帳號負責人做確認，他會經由信件內網址讓使用者帳號通過驗證</p>
                      <p style="color:black;" class="mt-5 ml-5">3.如經由負責人驗證過帳號即可登入，學生能發文，教師能批改文章</p>
                      <p style="color:black;" class="mt-5 ml-5">4.並且有文章內容管理，可以查看現在文章的內容與分數等等</p>
                </div>
                <div class="col-md-6">
                  <img style="max-width: 600px;max-height: 500px;" src="{{asset('image/wordteach.jpg')}}"/>
                </div>
              </div>
            <!--part end-->

        </div>
        
    </div>
 

</div>
        

    
        
       
<script>
  $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
$('#highChartBtn').click(function(){
  window.location.href="{{url('/index')}}";
});

</script>

</body>
</html>