@extends('login.productPage')
@section('content')
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
                <h2><b>DSP</b></h2>
                <h4 class="mt-5 ml-5"><b>概念:</b></h4>
                <h6 class="mt-5 ml-5"><b>此系統為提供廣告主投遞廣告，並且能觀看成效如何與消耗的成本，並且知道有多少人或是不重複使用者來觀看廣告，使用框架為Laravel。</b></h6>
                <!-- <button class="btn btn-primary" id="highChartBtn">test</button> -->
              </div>
              
            </div>
          <!--hightChart end-->

            <div class="line"></div>
            
            <h2><b>登入畫面</b></h2>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
            <div class="col-md-6">
                <img style="max-width: 600px;max-height: 500px;" src="{{asset('image/dsp01.png')}}"/>
              </div>




            <div class="line"></div>

            <h2><b>管理廣告訂單</b></h2>
            <div class="col-md-6">
                <img style="max-width:1280px;" src="{{asset('image/dsp02.png')}}"/>
              </div>

            <div class="line"></div>

            <h2><b>訂單報表內容</b></h2>
            <div class="col-md-6">
                <img style="max-width: 1280px;" src="{{asset('image/dsp03.png')}}"/>
              </div>

              
            
        </div>
        @endsection('content')