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
        
    }

    .btn{
        line-height: 28px;
      border: 1px solid #eeeeee;
      display: inline-block;
      color: #fff;
      padding: 10px 30px;
      font-size: 14px;
      font-family: "Poppins", sans-serif;
      font-weight: 500;
     
      -webkit-transition: all 300ms linear 0s;
      -o-transition: all 300ms linear 0s;
      transition: all 300ms linear 0s;
      margin-right: 1px;
      margin-top: 8px;
    } 

    .btn-money{
      background: #8c2c42;
      border:solid #8c2c42 1px;
    }
    .btn-money:hover{
      background-color: #FFF;
      color: #8c2c42;
      box-shadow: 2px 2px 3px 2px  #8c2c42;
    }
    .btn-equip{
      background-color: #498FDF;
      border:solid #498FDF 1px;

    }
    .btn-equip:hover{
      background-color: #fff;
      color: #498FDF;
      box-shadow: 2px 2px 3px 2px  #49CADF;
    }

</style>
<section class="banner_area">
<div class="form-field">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="transform: translateY(-49.5783px);"></div>
        <div class="forms">
             <h2 style="color: white;"> Make Donation </h2>
                <a class="btn btn-money" href="#sectiondonate"><i class="fa fa-money"> </i> Donate Money </a><span style="font-size: 14px;font-weight: 600px; color: white; padding: 10px;">OR</span>
                <a class="btn btn-equip" href="#sectionequip" ><i class="fa fa-medkit"></i> Donate Equipment</a>
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
        <section class="donation_f_area p_120" id="sectiondonate">
        	<div class="container">
        		<div class="row donation_f_inner">
        			<div class="col-lg-5">
        				<div class="dn_left_text">
        					<div class="dn_item">
        						<h4><i>“ No one is useless in this world who lightens the burdens of another “</i></h4>
        						<p> - Charles Dickens</p>
        					</div>
        					<div class="dn_item">
        						<h4>“ You have not lived today until you have done something for someone who can never repay you “ </h4>
        						<p> - John Bunyan</p>
        					</div>
                  
        				</div>
        			</div>
        			<div class="col-lg-6 offset-lg-1">
                     @if ($message = Session::get('error'))
                        <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ $message }} <a href="/">return to homepage </a>
                        </div>
                    @endif
                    {!! Session::forget('error') !!}
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ $message }} <a href="/"> return to homepage </a>
                        </div>
                    @endif
                    {!! Session::forget('success') !!}
        				<div class="dn_form_area">
                            <h1>Make Donation <i class="fa fa-money"></i></h1><hr>
        					<form class="donation_form row" action="{{route('donate.submit')}}" method="POST" id="contactForm">
                                 {{ csrf_field() }}
                               
                                  @if(Auth::user())
                                <div class="form-group col-lg-6">
                                    <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" readonly required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" readonly required>
                                </div>
                                @else
                                <div class="form-group col-lg-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name"  required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"  required>
                                </div>
                                @endif
                                <div class="form-group col-lg-12">
                                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Donation amount(USD)" required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" value="submit" class=" submit_btn form-control">Donate Now</button>
                                </div>
                           
                            <div class="master_card">
                                <span>We Accept:</span>
                                <img src="{{asset('img/master-card.png')}}" alt="">
                            </div>
                             </form>

                         <hr>
                        <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>-->

                        <a class="btn btn-equip" href="#sectionequip" style=" float: right;"><i class="fa fa-medkit"></i> Donate equipment instead</a>
                          
        				</div>
        			</div>
        		</div>
        		
        	</div>
        </section>
        <!--================End Denation Area =================-->

         <!--================Denation Area =================-->
        <section class="donation_f_area p_120" style="display: none;" id="sectionequip">
            <div class="container">
                 @if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="row donation_f_inner">
                    <div class="col-lg-5">
                        <div class="dn_left_text">
                           
                            <div class="dn_item">
                                <h4>“ The proper aim of giving is to put the recipients in a state where they no longer need our gifts “ </h4>
                                <p> - C.S. Lewis</p>
                            </div>
                            <div class="dn_item">
                                <h4>“It is more difficult to give money away intelligently than to earn it in the first place“</h4>
                                <p> - Andrew Carnegie</p>
                            </div>
                         
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <div class="dn_form_area">
                         <h1>Donate Equipment <i class="fa fa-medkit"></i></h1><hr>
                            <form class="donation_form row" action="{{route('donate.equipment.submit')}}" method="post" id="contactForm" enctype="multipart/form-data" >
                                 {{ csrf_field() }}
                                
                                     <div class="form-group col-lg-12">
                                    <input type="text" name="equipmentname" class="form-control" id="equipmentname" placeholder="Name of equipment">
                                </div>
                               @if(Auth::user())
                                <div class="form-group col-lg-6">
                                    <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" readonly required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" readonly required>
                                </div>
                                @else
                                <div class="form-group col-lg-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                </div>
                                @endif
                                <div class="form-group col-lg-12">
                                        <select class="donate_select" name="state" required>
                                            <option disabled selected>Select state of equipment</option>
                                       
                                            <option value="excellent">Excellent</option>
                                            <option value="fair"> Fairly used</option>
                                            <option value="poor"> Poor condition</option>
                                            <option value="bad">Bad (needs repair)</option>
                                       
                                    </select>
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="text" name="ownership" class="form-control" id="ownership" placeholder="Who owns the equipment">
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="text" name="location" class="form-control" id="location" placeholder="Location of equipment">
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="text" name="expecteduse" class="form-control" id="expecteduse" placeholder="Expexcted use">
                                </div>
                                <div class="form-group col-lg-12">
                                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Whatelse should we know"></textarea>
                                </div>
                                 <div class="form-group col-lg-6">
                                    <label for="file"> Attach Image(s) <small> (optional*)</small></label>
                                    <input type="file" class="form-control" id="file" name="image[]" accept="image/*" multiple>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" value="submit" class=" submit_btn form-control">Donate Equipment</button>
                                </div>
                            </form>
                                <hr>
                               <div class="dn_item">
                                <a class="btn btn-money" href="#sectiondonate" style=" float: right;"><i class="fa fa-money"> </i> Donate money instead  </a>
                            </div>
                    
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Denation Area =================-->
        
@endsection