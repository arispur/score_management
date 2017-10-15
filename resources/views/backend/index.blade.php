@extends('backend.layouts.app')

@section('content')

    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="frontend.index" class="site_title"><i class="fa fa-book"></i> <span>Score Management</span></a>
            </div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="assets/img/Logo-SMK-Negeri-2-Bandung.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-right"></span></a>
                    <ul class="nav child_menu">
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Student <span class="fa fa-chevron-right"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('computerEngineering') }}">Computer Engineering</a></li>
                      <li><a href="{{ url('softwareEngineering') }}">Software Engineering</a></li>
                      <li><a href="{{ url('multimedia') }}">Multimedia</a></li>
                      <li><a href="{{ url('animation') }}">Animation</a></li>
                    </ul>
                  </li>
                  <li><a href="{{ url('teacher') }}"><i class="fa fa-desktop"></i> Teacher <span class="fa fa-chevron-right"></span></a>
                    <ul class="nav child_menu">
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables Score <span class="fa fa-chevron-right"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ url('mathematic') }}">Mathematics</a></li>
                      <li><a href="{{ url('physics') }}">Physics</a></li>
                      <li><a href="{{ url('civicEducation') }}">Civic Education</a></li>
                      <li><a href="{{ url('biology') }}">Biology</a></li>
                      <li><a href="{{ url('english') }}">English</a></li>
                    </ul>
                  </li>
                  <li><a href="{{ url('reportScore') }}"><i class="fa fa-bar-chart-o"></i> Report Score <span class="fa fa-chevron-right"></span></a>
                    <ul class="nav child_menu">
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Curriculum</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ url('subject') }}"><i class="fa fa-sitemap"></i> Subject <span class="fa fa-chevron-right"></span></a>
                    <ul class="nav child_menu">
                    </ul>
                  </li>
                  <li><a href="{{ url('user') }}"><i class="fa fa-laptop"></i> User <span class="fa fa-chevron-right"></span></a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="assets/img/Logo-SMK-Negeri-2-Bandung.png" alt="">{{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>              
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <h2>Welcome To Management Score {{ Auth::user()->name }}</h2>

          <p class="text-faded">Pengolahan nilai yang cepat dan efisien adalah salah satu keinginan kami, untuk itu kami membuat aplikasi <b>management score</b> untuk membantu guru dan sekolah agar lebih cepat dalam hal pengelolahan selurah nilai murid murid disekolah ini</p>
           
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Admin Score Management by <a href="#">Aris Purnomo</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>