
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
                        
                    </ul>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">網站列表</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="{{url('/product')}}" >網站介紹</a>
                        </li>
                        <li>
                            <a href="http://www.yangminglin.ga/" target="_blank">前往-卡洛塔妮</a>
                        </li>
                        <li>
                            <a href="http://www.yangminglin.cf/" target="_blank">前往-快點集團</a>
                        </li>
                        <li>
                            <a href="http://www.yangminglin.ml/" target="_blank">前往-樂寫網</a>
                        </li>
                        <!-- <li>
                            <a href="#">尚未想到</a>
                        </li> -->
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
                {{-- <li>
                    <a href="https://line.me/R/ti/p/83diRrD9ou" target="_blank" class="article"><i class="fa fa-child"></i> 聯絡我</a>
                </li> --}}
                <li>
                    <a href="{{url('contactMe')}}" class="article"><i class="fa fa-child"></i> 聯絡我</a>
                </li>
                <li>
                    <a href="{{url('/logout')}}" class="article"><i class="fa fa-blind"></i> 登出</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        @yield('content')
        
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