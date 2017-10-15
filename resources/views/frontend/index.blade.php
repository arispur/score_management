@extends('frontend.layouts.app')

@section('content')

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Score Management</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#login">Login</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Portofolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">Welcome To Score Management</h1>
                <hr>
                <h4>"Seek knowledge from the cradle Of Up To grave". (Al Hadits)</h4>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                <h2 class="section-heading">Login To Your Score Management</h2>
                    <hr class="light">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Login</h3>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form method="POST" action="/auth/login" class="login-form">
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label class="sr-only" for="form-email">Email</label>
                                        <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="email" value="">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password">
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-primary btn-xl page-scroll">Sign in!</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">
                <div class="col-lg-4 col-sm-6">
                    <a href="assets/img/portfolio/fullsize/11.jpg" class="portfolio-box">
                        <img src="assets/img/portfolio/thumbnails/11.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    School
                                </div>
                                <div class="project-name">
                                    SMK Negeri 2 kota bandung
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="assets/img/portfolio/fullsize/12.jpg" class="portfolio-box">
                        <img src="assets/img/portfolio/thumbnails/12.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    School
                                </div>
                                <div class="project-name">
                                    SMK Negeri 2 kota bandung
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="assets/img/portfolio/fullsize/13.jpg" class="portfolio-box">
                        <img src="assets/img/portfolio/thumbnails/13.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    School
                                </div>
                                <div class="project-name">
                                    SMK Negeri 2 kota bandung
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="assets/img/portfolio/fullsize/14.jpg" class="portfolio-box">
                        <img src="assets/img/portfolio/thumbnails/14.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    School
                                </div>
                                <div class="project-name">
                                    SMK Negeri 2 kota bandung
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="assets/img/portfolio/fullsize/15.jpg" class="portfolio-box">
                        <img src="assets/img/portfolio/thumbnails/15.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    School
                                </div>
                                <div class="project-name">
                                    SMK Negeri 2 kota bandung
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="assets/img/portfolio/fullsize/16.jpg" class="portfolio-box">
                        <img src="assets/img/portfolio/fullsize/16.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    School
                                </div>
                                <div class="project-name">
                                    SMK Negeri 2 kota bandung
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Score Management</h2>
                    <hr class="light">
                    <p class="text-faded">Pengolahan nilai yang cepat dan efisien adalah salah satu keinginan kami, untuk itu kami membuat aplikasi <b>management score</b> untuk membantu guru dan sekolah agar lebih cepat dalam hal pengelolahan selurah nilai murid murid disekolah ini</p>
                    <a href="#login" class="page-scroll btn btn-default btn-xl sr-button">Get Started!</a>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Contac Me</h2>
                    <hr class="primary">
                    <p>More information about <b>Score Management</b> contac me phone number and email</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>087-825-906-300</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="">aris.purnomo07@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>