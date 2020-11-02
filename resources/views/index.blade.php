@extends('partial-views.header')
@section('body')
    
<style type="text/css">


  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
      background:linear-gradient(to bottom, rgba(0,0,0,50) 20%, rgba(0,0,0,50));
     background-image:  linear-gradient(
      rgba(0, 0, 0, 0.5),
      rgba(0, 0, 0, 0.5)
    ),
   
  }
  .carousel {
margin-top: 150px;
  }

h1{
    font-size: 30px;
    color: #fff;
}
h1:hover{
    color: #ccc;
}
.carousel-caption{
    background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,2) 70%); 
}
.pacru{
    background-color: 
     font-size: 30px;
     font-weight: 400;
    color: #fff;
}
@media only screen 
and (min-width : 320px) 
and (max-width : 850px) {
    .pacru{
        display: none;
    }
    .carousel-caption{
        margin-top: 200px;
    }
    .carousel-caption h1{
        font-size: 16px;
        font-weight: 600;
    }
    .carousel-caption p{font-size: 12px;}
}
.btn{
    line-height: 28px;
  border: 1px solid #eeeeee;
  display: inline-block;
  background: #f9f9ff;
  padding: 0px 19px;
  font-size: 12px;
  font-family: "Poppins", sans-serif;
  font-weight: 500;
  color: #777777;
  -webkit-transition: all 300ms linear 0s;
  -o-transition: all 300ms linear 0s;
  transition: all 300ms linear 0s;
  margin-right: 1px;
  margin-top: 8px;
    } 
    .btn:hover{
         background: #ea2c58;
  color: #fff;
  border-color: #ea2c58;
    }
    .btn-inverse{
 background: #ea2c58;
  color: #fff;
  border-color: #ea2c58;
    }
        .btn-inverse:hover{
 background: #f9f9ff;
  color: #777777;
    }

</style>
        <!--================Home Banner Area =================-->


<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
    <li data-target="#demo" data-slide-to="4"></li>
  </ul>
  <div class="carousel-inner">
<?php
$i = 0;
foreach ($blogs as $blog)
 {
    if ($i == 0) {
       echo '<div class="carousel-item active">
      <img src="img/banner/004.jpg" alt="First slide" >
       <div class="carousel-caption">
        <a href="/blog/'.$blog->id.'"><h1>'.ucfirst($blog->postHead).' </h1></a>
        <a href="/blog/'.$blog->id.'" style="color: #fff;">Published '.$blog->created_at->diffForHumans().'</a>
        <p class="pacru" style="font-size: 14px;">'.str_limit(ucfirst($blog->post), 250).'</p><p class="pacru"><a href="/blog/'.$blog->id.'"><br><button class="btn">Read more</button></a> </p>
        </div>
    </div>';
    } 
    else if ($i == 1){
       echo '<div class="carousel-item ">
      <img src="img/banner/005.jpg" alt="First slide" >
       <div class="carousel-caption">
        <a href="/blog/'.$blog->id.'"><h1>'.ucfirst($blog->postHead).' </h1></a>
        <a href="/blog/'.$blog->id.'" style="color: #fff;">Published '.$blog->created_at->diffForHumans().'</a>
        <p class="pacru">'.str_limit(ucfirst($blog->post), 250).'</p><p class="pacru"><a href="/blog/'.$blog->id.'"><br><button class="btn">Read more</button></a> </p>
        </div>
    </div>';
}
    else if ($i == 2){
         echo '<div class="carousel-item">
      <img src="img/banner/003.jpg" alt="First slide" >
       <div class="carousel-caption">
        <a href="/blog/'.$blog->id.'"><h1>'.ucfirst($blog->postHead).' </h1></a>
        <a href="/blog/'.$blog->id.'" style="color: #fff;">Published '.$blog->created_at->diffForHumans().'</a>
        <p class="pacru">'.str_limit(ucfirst($blog->post), 250).'</p><p class="pacru"><a href="/blog/'.$blog->id.'"><br><button class="btn">Read more</button></a> </p>
        </div>
    </div>';
}
    else {
         echo '<div class="carousel-item">
      <img src="img/banner/004.jpg" alt="First slide" >
       <div class="carousel-caption">
        <a href="/blog/'.$blog->id.'"><h1>'.ucfirst($blog->postHead).' </h1></a>
        <a href="/blog/'.$blog->id.'" style="color: #fff;">Published '.$blog->created_at->diffForHumans().'</a>
        <p class="pacru">'.str_limit(ucfirst($blog->post), 250).'</p><p class="pacru"><a href="/blog/'.$blog->id.'"><br><button class="btn">Read more</button></a> </p>
        </div>
    </div>';
}

    $i++;
}

?>
    
</div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

        <!--================End Home Banner Area =================-->
        
        <!--================Welcome Area =================-->
        
        <section class="welcome_area p_120">
        	<div class="container">
        		<div class="row welcome_inner">
        			<div class="col-lg-6">
        				<div class="welcome_text">
        					<h4>Welcome to Doctors Charity</h4>
        					<p>Doctors Charity is a not for profit organization which helps doctors, and indeed all other healthcare workers contribute their skills and resources to better the lives of people who have poor access to healthcare. It further provides a means whereby Africans in the diaspora, and all people of African Descent who live in more developed countries can directly impact the lives of Africans at home, thereby midwifing a renaissance period that will usher a rebirth of the Continent.
                        <a class="btn btn-inverse" href="{{ url('donate') }}">Donate Now</a>
                        <a class="btn " href="{{ url('volunteer') }}">Volunteer</a>

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
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Welcome Area ====-->
          <!--================Welcome Area =================-->
        <section class="welcome_area p_120" style="background-color: #e5e5e5;">
            <div class="container">
                <div class="row welcome_inner">
                    <div class="col-lg-6">
                        <div class="welcome_text">
                             <h4>Africa the Beautiful </h4>
<p>Although Africa is faced with numerous challenges, which manifest in various ways as hunger, tribal wars, poverty, poor infrastructure and basic amenities. The aforesaid, together with the dearth of skilled health workers (which is being worsened by brain drain) are responsible for poor health indices manifesting as preventable deaths and disabilities all over the continent. Despite all this, our view of Africa remains unchanged. It is that of a continent that is blessed by nature, with fair climate, and beautiful sceneries. Most importantly, Africa is blessed with brilliant, and  talented people (many of whom over the centuries, have naturalized to other continents) and are doing well all over the world. One of the major drivers of Doctors Charity is to bring together Africa's rich human resources, both home and abroad to unite in developing our motherland.</p>
 <a class="btn btn-inverse" href="{{ url('donate') }}">Donate Now</a>
                        <a class="btn " href="{{ url('volunteer') }}">Volunteer</a>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="welcome_img">
                            <img class="img-fluid" src="img/africaa.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
              <section class="welcome_area p_120">
            <div class="container">
                <div class="row welcome_inner">
                 
                    <div class="col-lg-6">
                          <div class="welcome_text">
                       <h4>Participate via Telemedicine</h4>
<p>Doctors charity uses information technology to bridge the gap between qualifified healthworkers who wish to volunteer part of their time and skills to assist in alleviating the health disparities that plague the continent of africa. For such volunteers who are unable to leave their jobs to travel for an on-site medical intervention, Telemedicine offers the right avenue. Working with your free time and schedule, we can fix consultation appointments with you and your patients in Africa, thereby efficiently meeting the same goals.<a href="https://www.ihotuclinic.com"> Ihotu Telemedicine Clinic </a> in Nigeria is a major partner in this regard.</p>
</div>
                    </div>
                    <div class="col-lg-6">
                        <div class="welcome_img">
                            <img class="img-fluid" src="img/telemedicine.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!--================Causes Area =================-->
        <section class="causes_area p_120" style="background-color: #e5e5e5;">
        	<div class="container">
        		<div class="main_title">
        			<h2>Participate in the Vision-Projects</h2>
        			<p style="font-size: 14px; font-weight: 400;">You can participate by helping to fund our numerous projects in Nigeria. We are accountable and transparent. And you get to see how your funds are being put to use.</p>
        		</div>
                 @if (session('volunteerstatus'))
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <div class="alert alert-success">
                            {{ session('volunteerstatus') }}
                        </div>
                    @endif
        		<div class="causes_slider owl-carousel">
                    @foreach($projects as $project)
        			<div class="item">
        				<div class="causes_item">
        					
        					<div class="causes_text">
        						<h4>{{$project->projectHead}}</h4>
        						<p>{{str_limit($project->projectDesc,120)}}</p><br>
                                 @if($project->need == 'Money')
                                <p style="color: red;font-weight: 600;">Need: $ {{$project->needDetail}}</p><br>
                                @else
                                <p style="color: red;font-weight: 600;">Need: {{$project->needDetail}}</p><br>
                                @endif
                                <p><i class="fa fa fa-hourglass-3"></i> {{$project->created_at->diffForHumans()}}</p>
                                <p><i class="fa fa-home"></i> {{$project->address}}</p>
        					</div>
        					<div class="causes_bottom">
								
                                @if($project->need == 'Money')
                                <a href="/donate/money/{{$project->id}}">Donate</a>
                                <a href="/donate/money/{{$project->id}}">{{$project->need}}</a>

                                @elseif($project->need == 'Equipment')
                                <a href="/donate/equipment/{{$project->id}}">Donate</a>
                                <a href="/donate/equipment/{{$project->id}}">{{$project->need}}</a>
                                @elseif($project->need== 'Volunteer')
                                <a onclick="if(!confirm('Are you sure you want to Volunteer?')) return false;" href="/volunteer/{{$project->id}}/submit">Volunteer</a>
                                <a href="/volunteer/{{$project->id}}/submit">{{$project->need}}</a>
                                @else
                                <a href="/donate">Donate</a>
                                <a href="/donate">{{$project->need}}</a>
                                @endif
                                
							</div>
        				</div>
        			</div>
                    @endforeach
        			
        		</div>
        	</div>
        </section>
    
        <!--================End Causes Area =================-->
        
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
        
       
        <!--================Clients Logo Area =================-->
        <section class="clients_logo_area">
        	<div class="container">
        	<h1 style="text-align:center;color:black;">Our Partners</h1><hr>
        		<div class="row col-lg-12">
        			<div class="col-lg-6">
        			<a href="https://www.ihotuclinic.com">
        				<img class="img-fluid" src="img/clients-logo/ihotulogo.png" alt="Ihotu Clinic">
        			</a>
        			</div>
        			<div class="col-lg-6">
        			<br>
        				<p>Ihotu Telemedicine Clinic is a newly established private healthcare facility in Abuja, Nigeria. The hospital seeks to provide affordable healthcare across board without compromising on the high standards of the medical care that we offer.  <a href="https://www.ihotuclinic.com">Click here </a> for more information</p>
        			</div>
        			</div>
        		
        		</div>
        	</div>
        </section>
        <!--================End Clients Logo Area =================-->
 @endsection       
 