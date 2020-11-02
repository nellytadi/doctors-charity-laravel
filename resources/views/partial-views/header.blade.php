<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Doctors Charity is a not for profit organization which helps doctors, and indeed all other healthcare workers contribute their skills and resources to better the lives of people who have poor access to healthcare.">
	 <meta name="keywords" content="Doctors Charity, Doctors Charity official website, Doctorscharity.org, Doctors, Charity, Medical NGO, nonprofit organization">
	 <meta name="author" content="Core Rand">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/png">

        <title>Doctors Charity</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css')}}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{ asset('vendors/lightbox/simpleLightbox.css')}}">
        <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{ asset('vendors/animate-css/animate.css')}}">
        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
           	<div class="top_menu row m0">
           		<div class="container">
					<div class="float-left">
						<ul class="list header_social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google"></i></a></li>
						</ul>
					</div>
					<div class="float-right">
                        <a class="dn_btn" href="{{ url('donate') }}">Donate Now</a>
                        <a class="dn_btn" href="{{ url('volunteer') }}">Volunteer</a>
                        <a class="ac_btn" href="{{ route('create.project') }}">Create Project</a>
                        @if (Auth::guest())
						<a  class="ac_btn" href="{{ route('login') }}">Login</a>
                        <a class="dn_btn" href="{{ route('register') }}">Register</a>
                      @endif
					
					</div>
           		</div>	
           	</div>	
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="{{url('/')}}"><img src="{{asset('img/doc_c.png')}}" alt="" height="100"></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Home</a></li> 
								
								<li class="nav-item"><a class="nav-link" href="{{url ('/about')}}">About</a></li> 

								<!-- <li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="event.html">Event</a></li>
										<li class="nav-item"><a class="nav-link" href="event-details.html">Event Details</a></li>
									</ul>
								</li> -->
								<li class="nav-item"><a class="nav-link" href="{{url('/blog')}}">Blog</a></li>
                                
								<li class="nav-item"><a class="nav-link" href="{{url('/gallery')}}">Gallery</a></li>
								<li class="nav-item"><a class="nav-link" href="{{url('/contact')}}">Contact</a></li>
								<!--<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
										<li class="nav-item"><a class="nav-link" href="donation.html">Donation</a></li>
									</ul>
								</li>
                            <li class="nav-item"><a class="nav-link" href="{{url('/projects')}}">Projects</a></li>-->
								 
								<!--<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
										<li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
									</ul>
								</li> -->
								<li class="nav-item"><a class="nav-link" href="#">Medical Professionals</a></li>
                                @if(Auth::user())
								<li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="#">Profile</a></li>
                                        <li class="nav-item"><a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </ul>
                                </li>
                                @endif
							</ul>
						<!--	<ul class="nav navbar-nav navbar-right">
								<li class="nav-item"><a href="#" class="search"><i class="lnr lnr-magnifier"></i></a></li>
							</ul>-->
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->


@yield('body')


        <!--================ start footer Area  =================-->	
        <footer class="footer-area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">About Agency</h6>
                            <p style="color:#ccc;">DOCTORS CHARITY Established in 2008 by a team of visionary doctors, Doctors Charity is a multi-service non-profit based in New York helping people worldwide. Currently we operate in the U.S. and Africa to deliver medical care and equipment, health and education, microfinance, and investment in agriculture in communities that need it the most. We have six major projects reaching hundreds of people in need.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6 class="footer_title">Navigation Links</h6>
                            <div class="row">
                                <div class="col-4">
                                    <ul class="list">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/about">About</a></li>
                                        <li><a href="/blog">Blog</a></li>
                                        <li><a href="/gallery">Gallery</a></li>
                                        
                                    </ul>
                                </div>
                                <div class="col-4">
                                    <ul class="list">
                                        
                                        <li><a href="/contact">Contact</a></li>
                                        <li><a href="/volunteer">Volunteer</a></li>
                                        <li><a href="/donate">Donate</a></li>
                                        
                                    </ul>
                                </div>										
                            </div>							
                        </div>
                    </div>							
                  
                   
                <div class="border_line"></div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                   
                    <div class="col-lg-6 col-md-6 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                     <div class="col-lg-6 col-md-6" style="color:#CCD1D1;">
                 Copyright © <?php echo date("Y"); ?> Doctors Charity

                    </div>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/stellar.js') }}"></script>
        <script src="{{ asset('vendors/lightbox/simpleLightbox.min.js') }}"></script>
        <script src="{{ asset('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('vendors/isotope/isotope-min.js') }}"></script>
        <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('js/theme.js') }}"></script>
    </body>
</html>