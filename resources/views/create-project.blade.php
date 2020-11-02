@extends('partial-views.header')
@section('body')
<style type="text/css">
     .form-field{
        background: url('img/banner/banner.jpg') no-repeat ;
        margin-top: 150px;
       height: 320px;
       width: 100%;
       position: relative;
}
    .requirement{
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.9);
        border-radius: 5px;
        color: #fff;
        position: absolute;
        
    }
    .btn{
      width: 150px;
      height: 40px;
      border-radius: 5px;
      padding: 10px;
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
    .btn-volun{
      background-color: #328922;
      border:solid #328922 1px;
    }
    .btn-volun:hover{
      background-color: #A4DF49;
      box-shadow: 3px 3px 5px 3px #ccc;
    }
    .register-form{
      margin-top: 50px;
    }
    .hide{
      display: none;
      margin-top: 10px;
    }

</style>
<section class="banner_area">
<div class="form-field">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="transform: translateY(-49.5783px);"></div>
       <div class="container">
          <div class="banner_content text-center">
            <h2>Start Project</h2>
            <div class="page_link">
              <a href="{{url('/')}}">Home</a>
              <a href="#">Create Project</a>
            </div>
          </div>
        </div>
    </div>
</div>
</section>


        <section class="register-form"  id="Money">
          <div class="container">
            <div class="row donation_f_inner">

              <div class="col-lg-5">
                <div class="dn_left_text">
                  <div class="dn_item">
                    <h4>Participate in the Vision-Projects</h4>
                    <p>You can participate by helping to fund our numerous projects in Nigeria. We are accountable and transparent. And you get to see how your funds are being put to use.</p>
                  </div>
                 
                </div>
              </div>
              <div class="col-lg-6 offset-lg-1">
                <div class="dn_form_area">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
  	       	   	<h1 >Create New Project</h1><hr style="margin-bottom: 50px;">
                     
                            <form class="donation_form row" action="{{ route('create.project.submit') }}" method="post" id="contactForm" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <div class="form-group col-lg-12">
                                     <input type="text" class="form-control" name="projectHead" placeholder="Project Title" required>
                                </div>
                                <div class="form-group col-lg-12">
                                     <input type="text" class="form-control" name="projectDesc" placeholder="Project Description" required>
                                </div>
                                 <div class="form-group col-lg-12">
                                     <input type="text" class="form-control" name="address" placeholder="Address" required>
                                </div>
                                <input type="hidden" name="organization" value="{{Auth::user()->organization}}">
                                <div class="form-group col-lg-6">
                                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name }}" readonly  required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control"  name="email" value="{{Auth::user()->email }}" readonly required>
                                </div>

                                <div class="col-lg-12">
                                  <label>What do you need?</label><br> 
                                  <a class="btn btn-money" style="color:white; ">Money</a>
                                  <a class="btn btn-equip" style="color:white; ">Equipment</a>
                                  <a class="btn btn-volun" style="color:white;">Volunteers</a>
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="number" class="form-control hide"  name="amount" id="amount" placeholder="Amount (USD) Needed">
                                    <input type="text" class="form-control hide"  name="equipment" id="equipment" placeholder="Name of equipment(s)"> 
                                    <input type="text" class="form-control hide"  name="volunteer" id="volunteer" placeholder="Type of Volunteer(s) need">              
                                </div>
                                <div class="form-group col-lg-12">
                                    <textarea class="form-control" name="story"  rows="1" placeholder="Brief explanation of community and medical cases"></textarea>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="file"> Attach Image(s) <small> (optional*)</small></label>
                                    <input type="file" class="form-control" id="file" name="image[]" accept="image/*" multiple>
                                </div>
                                 <div class="form-group col-lg-6">
                                    <label for="file"> Attach neccesary file(s) <small> (optional*)</small></label>
                                    <input type="file" class="form-control" id="file" name="file[]" multiple accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" value="submit" class="submit_btn form-control">Create Project</button>
                                </div>
                            </form>
                          </div>
                        </div>
          </div>
      </div>
  </section>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".btn-money").click(function(){
         $("#amount").toggle();
        $("#equipment").hide();
        $("#volunteer").hide();
    });
     $(".btn-equip").click(function(){
         $("#equipment").toggle();
        $("#amount").hide();
        $("#volunteer").hide();
    });
          $(".btn-volun").click(function(){
        $("#volunteer").toggle();
        $("#amount").hide();
        $("#equipment").hide();
    });
});
</script>
@endsection