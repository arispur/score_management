@extends('backend.layouts.app')

@section('content')

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="frontend.index" class="site_title"><i class="fa fa-book"></i> <span>Score Management</span></a>
            </div>

            <div class="clearfix"></div>

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
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student <small>input student SMKN 2 Bandung</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    {!! Form::open(['url' => 'multimedia', 'id' =>'demo-form2', 'class' => 'form-horizontal form-label-left', 'role' => 'form']) !!}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nis">NIS <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nis" id="nis" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_name">Full Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="student_name" id="student_name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="female"> Female
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="class" class="control-label col-md-3 col-sm-3 col-xs-12">Class <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="class" class="form-control" required="required">
                            <option value="Multimedia">Multimedia</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="input-group date">
                              <input type="date" class="form-control" name="date_birth" required="required">
                              <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-th"></span>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="address" id="address" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a class="btn btn-primary" href="/computerEngineering">Cancel</a>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
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