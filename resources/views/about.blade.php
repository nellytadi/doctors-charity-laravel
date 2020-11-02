@extends('partial-views.header')
@section('body')
    
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>About Us</h2>
						<div class="page_link">
							<a href="{{url('/')}}">Home</a>
							<a href="#">About Us</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Welcome Area =================-->
        <section class="welcome_area p_120">
        	<div class="container">
        		<div class="row welcome_inner">
        			<div class="col-lg-6">
        				<div class="welcome_text">
        					<h4>Welcome to<span style="color: #4D98FF;"> Doctors Charity</span></h4>
                            <p><i><b>DOCTORS CHARITY</b></i> established in 2008 by a team of visionary doctors, Doctors Charity is a multi-service non-profit based in New York helping people worldwide. Currently we operate in the U.S. and Africa to deliver medical care and equipment, health and education, microfinance, and investment in agriculture in communities that need it the most. We have six major projects reaching hundreds of people in need.</p>
                            <p>

The ultimate aim of <i><b>DOCTORS CHARITY</b></i> is to build a legacy of service. We envision a day when medical professionals the world over will set a day aside out of their busy schedule every month to volunteer their times to providing free and qualitative healthcare in poor communities.</p>
        					<!--<div class="row">
                                <div class="col-sm-4">
                                    <div class="wel_item">
                                        <i class="lnr lnr-users"></i>
                                        <h4>0</h4>
                                        <p>Total Volunteers</p>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="wel_item">
                                        <i class="lnr lnr-database"></i>
                                        
                                        <h4>$0.0M</h4>
                                        <p>Total Donation</p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="wel_item">
                                        <i class="lnr lnr-book"></i>
                                        <h4>0</h4>
                                        <p>Total Projects</p>
                                    </div>
                                </div>
                            </div>-->
        				</div>
        			</div>
        			<div class="col-lg-6">
        				<div class="welcome_img">
        					<img class="img-fluid" src="img/child.jpg" alt="">
        				</div>
                        <p style="margin-top: 40px;">We want to be about service—service to the people and service to the community. We desire a world in which medical professionals and other healthcare providers would make service to their people, their communities and neighboring communities an integral part of their monthly schedule. We believe that by coming together, we can build for the world a big global community of medical care where we are all responsible to the wellbeing and care of each other and a world where no one goes bankrupt as a result of falling ill or dies from lack of care due to poverty</p>
        			</div>
        		</div>
        	</div>
    
            <div class="container" style="margin-top: 40px;">
                <div class="row welcome_inner">
                    <div class="col-lg-6">
                        <div class="welcome_text">
                            <h4>Our Mission</h4>
                            <p>Every person deserves access to life improving and lifesaving information, medical care, and economic opportunities to support their families. We are dedicated to providing medical care and resources to the economically disadvantaged. Our mission is to deploy effective and coordinated efforts to ensure people gain access to qualitative medical care, and economic resources.</p>
                        
                        </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="welcome_text">
                            <h4>Our Legacy</h4>
                            <p> We aim to increase a legacy of giving and service among doctors and our global community at large. We envision a day when everyday professionals feel compelled to volunteer and give regularly to medical missions. access to qualitative medical care, and economic resources.</p>
                        
                        </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="welcome_text">
                            <h4>Who we work with</h4>
                            <p><i><b>DOCTORS CHARITY</b></i> develops key projects to assist medical professionals to deliver medical care, equipment, supplies and medical training in the U.S. and the developing world. We invite doctors and other professionals interested in helping needy communities to volunteer on any number of our projects, and/or donate funds to assist in the deployment of these key projects. There are so many ways to give back. We have focused on three core areas:
                            <ul>
                                <li>Service: delivering pro bono medical services via home visits and medical missions abroad</li>
                                <li> Resource distribution: providing medical equipment to communities that need it</li>
                                <li> Financing: rallying funds to support microfinancing and farming initiatives</li>
                            </ul>            
                        </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="welcome_img">
                            <img class="img-fluid" src="img/gallery/gallery-911.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Welcome Area =================-->
         <!--================Feature Area =================-->
        <section class="feature_area p_120">
        	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        	<div class="container">
        		<div class="white_title">
        			<h2>Our Key Features</h2>
        			
        		</div>
        		<div class="row feature_inner">
        			
        			<div class="col-lg-3">
        				<div class="feature_item">
        					<i class="lnr lnr-coffee-cup"></i>
        					<h4><a href="{{route('donate')}}">Donate</a> </h4>
        					<p>Pick from our projects to help fund. Every dollar counts. You can also donate medical equipment targeted at poorly-served communities in West Africa and participate in our annual charity ball.</p>
        				</div>
        			</div>
        			<div class="col-lg-3">
        				<div class="feature_item">
        					<i class="lnr lnr-wheelchair"></i>
        					<h4><a href="{{route('volunteer')}}">Become a Volunteer</a></h4>
        					<p>Volunteer and be a part of an organization boldly increasing access to healthcare and economic resources in vulnerable communities. Your help is needed to deliver care, education, and training in the U.S. and Africa.</p>
        				</div>
        			</div>
        			<div class="col-lg-3">
        				<div class="feature_item">
        					<i class="lnr lnr-wheelchair"></i>
        					<h4><a href="{{route('volunteer')}}">Participate via Telemedicine</a></h4>
        					<p> For volunteers who are unable to leave their jobs to travel for an on-site medical intervention, Telemedicine offers the right avenue. Working with your free time and schedule, we can fix consultation appointments with you and your patients in Africa, thereby efficiently meeting the same goals.</p>
        				</div>
        			</div>
                    <div class="col-lg-3">
                        <div class="feature_item">
                            <i class="lnr lnr-diamond"></i>
                            <h4><a href="{{route('create.project')}}">Create Projects</a></h4>
                            <p>Doctors Charity is working on a list of amazing projects started by Doctors just like you. You can easily become part of this amazing process by registering with us.</p>
                        </div>
                    </div>
        		</div>
        	</div>
        </section>
        <!--================End Feature Area =================-->
        
        <!--================Testimonials Area =================-->
       <!-- <section class="testimonials_area p_120">
        	<div class="container">
        		<div class="row testimonials_inner">
        			<div class="col-lg-4">
        				<div class="testi_left_text">
        					<h4>Testimonial from our Donors</h4>
        					<p>Las Vegas has more than 100,000 hotel rooms to choose from. There is something for every budget, and enough.</p>
        				</div>
        			</div>
        			<div class="col-lg-8">
        				<div class="testi_slider owl-carousel">
							<div class="item">
								<div class="testi_item">
									<img src="img/testimonials/testi-1.png" alt="">
									<p>It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights so far as its</p>
									<h4>Cordelia Barton</h4>
									<h6>CEO at Google</h6>
								</div>
							</div>
							<div class="item">
								<div class="testi_item">
									<img src="img/testimonials/testi-2.png" alt="">
									<p>It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights so far as its</p>
									<h4>Cordelia Barton</h4>
									<h6>CEO at Google</h6>
								</div>
							</div>
							<div class="item">
								<div class="testi_item">
									<img src="img/testimonials/testi-1.png" alt="">
									<p>It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights so far as its</p>
									<h4>Cordelia Barton</h4>
									<h6>CEO at Google</h6>
								</div>
							</div>
							<div class="item">
								<div class="testi_item">
									<img src="img/testimonials/testi-2.png" alt="">
									<p>It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights so far as its</p>
									<h4>Cordelia Barton</h4>
									<h6>CEO at Google</h6>
								</div>
							</div>
							<div class="item">
								<div class="testi_item">
									<img src="img/testimonials/testi-1.png" alt="">
									<p>It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights so far as its</p>
									<h4>Cordelia Barton</h4>
									<h6>CEO at Google</h6>
								</div>
							</div>
							<div class="item">
								<div class="testi_item">
									<img src="img/testimonials/testi-2.png" alt="">
									<p>It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights so far as its</p>
									<h4>Cordelia Barton</h4>
									<h6>CEO at Google</h6>
								</div>
							</div>
						</div>
        			</div>
        		</div>
        	</div>
        </section>-->
        <!--================End Testimonials Area =================-->
        
        <!--================Clients Logo Area =================-->
          <section class="clients_logo_area">
            <div class="container">
            <h1 style="text-align:center;">Our Partners</h1><hr>
                <div class="row col-lg-12">
                    <div class="col-lg-6">
                    <a href="https://www.ihotuclinic.com">
                        <img src="img/clients-logo/ihotulogo.png" class="img-fluid" alt="">
                    </a>
                    </div>
                    <div class="col-lg-6">
                    <br>
                        <p>Ihotu Telemedicine Clinic is a newly established private healthcare facility in Abuja, Nigeria. The hospital seeks to provide affordable healthcare across board without compromising on the high standards of the medical care that we offer.  <a href="https://www.ihotuclinic.com">Click here </a> for more information</p>
                    </div>
                    </div>
                <!--<div class="clients_slider owl-carousel">
                    
                    <div class="item">
                        <img src="img/clients-logo/c-logo-2.png" alt="">
                    </div>
                    <div class="item">
                        <img src="img/clients-logo/c-logo-3.png" alt="">
                    </div>
                    <div class="item">
                        <img src="img/clients-logo/c-logo-4.png" alt="">
                    </div>
                    <div class="item">
                        <img src="img/clients-logo/c-logo-5.png" alt="">
                    </div>-->
                </div>
            </div>
        </section>
        <!--================End Clients Logo Area =================-->
@endsection