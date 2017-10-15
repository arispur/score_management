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
                        <h2>Student <small>student software engineering of SMKN 2 Bandung</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <a class="btn btn-success btn-round btn-xm" type="button" href="{{ url('softwareEngineering/create') }}">Add Student</a>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>NIS</th>
                              <th>Name</th>
                              <th>Gender</th>
                              <th>Class</th>
                              <th>Date Birth</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($student as $data)
                              <tr>
                                  <td>{{ $data->nis }}</td>
                                  <td>{{ $data->student_name }}</td>
                                  <td>{{ $data->gender }}</td>
                                  <td>{{ $data->class }}</td>
                                  <td>{{ $data->date_birth }}</td>
                                  <td>
                                      <a class="btn btn-s btn-default" href="{{ URL('softwareEngineering/' . $data->nis) }}">Read</a>
                                      <a class="btn btn-s btn-primary" href="{{ URL('softwareEngineering/' . $data->nis . '/edit') }}">Update</a>
                                      <button type="button" class="btn btn-s btn-danger" data-toggle="modal" data-target="#confirm-delete">Delete</button>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        <!-- /page content -->
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete student</h4>
              </div>
              <div class="modal-body">
                <p>are you sure delete ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::open(['url' => 'softwareEngineering/' . $data->nis, 'class' => 'pull-right']) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-s btn-danger']) !!}
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
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















            