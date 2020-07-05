
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
                    <a href="#homeFirst" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">維護系統</a>
                    <ul class="collapse list-unstyled" id="homeFirst">
                        <li>
                            <a href="https://www.yangminglin.ga/" target="_blank">DMP</a>
                        </li>
                        <li>
                            <a href="https://www.yangminglin.ml/" target="_blank">SSP</a>
                        </li>
                        <li>
                            <a href="https://www.yangminglin.ml/" target="_blank">DSP</a>
                        </li>
                        <li>
                            <a href="https://www.yangminglin.ml/" target="_blank">EAS</a>
                        </li>
                        <!-- <li>
                            <a href="#">尚未想到</a>
                        </li> -->
                    </ul>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">網站列表</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="https://www.yangminglin.ga/" target="_blank">卡洛塔妮</a>
                        </li>
                        <li>
                            <a href="https://www.yangminglin.ml/" target="_blank">快點集團</a>
                        </li>
                        <!-- <li>
                            <a href="#">尚未想到</a>
                        </li> -->
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

             <!--hightChart start-->
            <div class="h-30 w-100 row col-md-12 p-2"  id="HighChartsProduct">
              <div class="col-md-6">
                <h2><b>卡洛塔妮</b></h2>
                <h6 class="mt-5 ml-5"><b>此頁面為分析到站人的作品，此會包括分析不重複人數，事件分析，並且轉換率等等。</b></h6>
                <!-- <button class="btn btn-primary" id="highChartBtn">test</button> -->
              </div>
              <div class="col-md-6">
                <img style="max-width: 600px;max-height: 500px;" src="{{asset('image/karihomeLogo.png')}}"/>
              </div>
            </div>
          <!--hightChart end-->

            <div class="line"></div>

            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <div class="line"></div>

            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <div class="line"></div>

            <h3>Lorem Ipsum Dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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