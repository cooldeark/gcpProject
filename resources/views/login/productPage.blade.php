
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
@include('layouts.topBannerForLight')
</div>
 
<div id="container" class="">
  <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><b>作品集</b></h3>
            </div>

            <ul class="list-unstyled components">
                <p>作品集列表</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">HighCharts</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">分析到站人行為</a>
                        </li>
                        <li>
                            <a href="#">尚未想到</a>
                        </li>
                        <li>
                            <a href="#">尚未想到</a>
                        </li>
                    </ul>
                </li>
                <li>
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
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                </li>
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa fa-align-left"></i>
                        <span>作品集</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

             <!--hightChart start-->
            <div class="h-30 w-100 row col-md-12 p-2"  id="HighChartsProduct">
              <div class="col-md-6">
                <h2>HighCharts</h2>
                <h6 class="mt-5 ml-5"><b>此頁面為分析到站人的作品，此會包括分析不重複人數，事件分析，並且轉換率等等。</b></h6>
                <button class="btn btn-primary" id="highChartBtn">test</button>
              </div>
              <div class="col-md-6">
                <img src="{{asset('image/hightChart1.jpg')}}"/>
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