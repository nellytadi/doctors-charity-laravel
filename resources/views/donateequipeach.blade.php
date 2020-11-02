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
  
    .register-form{
      margin-top: 50px;
    }

</style>

<section class="banner_area">
<div class="form-field">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="transform: translateY(-49.5783px);"></div>
       <div class="container">
          <div class="banner_content text-center">
            <h2>Make Donation</h2>
            <div class="page_link">
              <a href="{{url('/')}}">Home</a>
              <a href="#">Donate Equipment</a>
            </div>
          </div>
        </div>
    </div>
</div>
</section>
    <!--================Denation Area =================-->
        <section class="donation_f_area p_120" >
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
                    <h4>Project Title</h4>
                    <p>{{$projects->projectHead}}</p>
                  </div>
                  <div class="dn_item">
                    <h4>Project Details</h4>
                    <p>{{$projects->projectDesc}}</p><br>
                    <p><b>Created </b> {{$projects->created_at->diffForHumans()}}</p>
                    <p><b>Located at</b> {{$projects->address}}</p>
                  </div>
                 
                </div>
              </div>

                    <div class="col-lg-6 offset-lg-1">
                        <div class="dn_form_area">
                          
                            <form class="donation_form row" action="{{route('donate.equipment.submit')}}" method="post" id="contactForm" enctype="multipart/form-data" >
                                 {{ csrf_field() }}
                                <div class="form-group col-lg-12">
                                        <input type="text" name="project" class="form-control" id="project" value="{{$projects->projectHead}}" readonly>
                                </div>
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
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name"  required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"  required>
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
                                    <button type="submit" value="submit" class="btn submit_btn form-control">Donate Equipment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Denation Area =================-->

@endsection