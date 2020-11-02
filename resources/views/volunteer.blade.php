@extends('partial-views.header')
@section('body')
     
        
        <!--================Home Banner Area =================-->
  <style type="text/css">
     .form-field{
        background: url('img/banner/banner.jpg') no-repeat ;
        margin-top: 150px;
       height: 300px;
       width: 100%;
       position: relative;
    }
    .forms{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 14px;
    }
   .btn{
      width: 250px;
      height: 70px;
      border-radius: 15px;
      padding: 20px;
    }
      .btn-money{
      background-color: #B22944;
      border:solid #B22944 1px;
    }
    .btn-money:hover{
      background-color: #FF9999;
      box-shadow: 3px 3px 5px 3px #ccc;
    }
    .btn-equip{
      background-color: #498FDF;
      border:solid #498FDF 1px;

    }
    .btn-equip:hover{
      background-color: #49CADF;
      box-shadow: 3px 3px 5px 3px #ccc;
    }
</style>
<section class="banner_area">
<div class="form-field">
	<div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="transform: translateY(-49.5783px);"></div>
   <div class="container">
        <div class="forms">
                <a class="btn btn-money" href="#sectiondonate" style="color: white;">Volunteer Physically</a>
                <a class="btn btn-equip" href="#sectionequip" style="color: white;">Volunteer via Telemedicine</a>
        </div>
    </div>
</div>
</div>
</section>
        <!--================End Home Banner Area =================-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".btn-money").click(function(){
         $("#sectiondonate").toggle();
        $("#sectionequip").hide();
    });
     $(".btn-equip").click(function(){
         $("#sectiondonate").hide();
        $("#sectionequip").toggle();
    });
});
</script>
        <!--================Denation Area =================-->
        <section class="donation_f_area p_120" id="sectiondonate" style="display: none;">
        	<div class="container">
        		<div class="row donation_f_inner">
        			<div class="col-lg-5">
        				<div class="dn_left_text">
        					<div class="dn_item">
        						<h4>Divided Evenly</h4>
        						<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.</p>
        					</div>
        					<div class="dn_item">
        						<h4>Transperancy All the Way</h4>
        						<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.</p>
        					</div>
        					<div class="dn_item"> 
        						<h4>Trustworthy</h4>
        						<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.</p>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-6 offset-lg-1">
        				<div class="dn_form_area">
        					<form class="donation_form row" action="{{route('volunteer.submit')}}" method="POST" id="contactForm">
                                 {{ csrf_field() }}
                               	<div class="form-group col-lg-12">
									<select class="donate_select" name="field" required>
                                            <option disabled selected>Select Field...</option>
                                     		<option value="doctor">Medical Doctor</option>
                                     		<option value="nurse">Nurse</option>
                                     		<option value="psycologist">Clinical Pyscologist</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" readonly required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" readonly required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="text" class="form-control" id="specialty" name="specialty" placeholder="Specialty" required>
                                </div>
                                 <div class="form-group col-lg-12">
                                    <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Level of qualification" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Current town/city of practise" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" value="submit" class="btn submit_btn form-control">Volunteer</button>
                                </div>
                            </form>
        				</div>
        			</div>
        		</div>
        		
        	</div>
        </section>
        <!--================End Denation Area =================-->

         <!--================Denation Area =================-->
        <section class="donation_f_area p_120" id="sectionequip">
            <div class="container">
                <div class="row donation_f_inner">
                    <div class="col-lg-5">
                        <div class="dn_left_text">
                            <div class="dn_item">
                                <h4>Equip</h4>
                                <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.</p>
                            </div>
                            <div class="dn_item">
                                <h4>Transperancy All the Way</h4>
                                <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.</p>
                            </div>
                            <div class="dn_item"> 
                                <h4>Trustworthy</h4>
                                <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <div class="dn_form_area">
                            @foreach($errors as $error)
                            <li>{{$error}}</li>
                            @endforeach
                            <form class="donation_form row" action="{{route('volunteer.telemedicine.submit')}}" method="post" id="contactForm" enctype="multipart/form-data" >
                                 {{ csrf_field() }}
                               	<div class="form-group col-lg-12">
									<select class="donate_select" name="field" required>
                                            <option disabled selected>Select Field...</option>
                                     		<option value="doctor">Medical Doctor</option>
                                     		<option value="nurse">Nurse</option>
                                     		<option value="psycologist">Clinical Pyscologist</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" readonly required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" readonly required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="text" class="form-control" id="specialty" name="specialty" placeholder="Specialty" required>
                                </div>
                                 <div class="form-group col-lg-12">
                                    <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Level of qualification" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Current town/city of practise" required>
                                </div>
                                  <div class="form-group col-lg-12">
                                  	<label for="hours">Availiable Time</label>
                                    <input type="text" class="form-control" id="desiredtime" name="desiredtime" placeholder="E.g.- 2 hours on Monday ,Wednesday and Friday from 8:00am to 10:00am Two Weeks a Month" required>
                                </div>
                               
                             
                                <div class="form-group col-md-12">
                                    <button type="submit" value="submit" class="btn submit_btn form-control">Volunteer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Denation Area =================-->
        
@endsection