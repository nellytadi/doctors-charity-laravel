@extends('partial-views.header')
@section('body')
     
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Donation</h2>
                        <div class="page_link">
                            <a href="{{url('/')}}">Home</a>
                            <a href="donation.html">Donation</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Denation Area =================-->
        <section class="donation_f_area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="text-center" style="margin-bottom: 30px;">Your Projects <small><a class="cp_btn" href="{{ url('create/project') }}" style="margin-left: 50px; padding: 15px;">Create New Project</a></small></h1>
                    </div>
                          
                                @foreach($projects as $project)
                                 <div class="col-lg-8">
                                <article class="row blog_item">
                               <div class="col-md-4">
                                   <div class="blog_info text-right">
                                        <ul class="blog_meta list">
                                            <li><a href="#"> {{$project->created_at->diffForHumans()}}<i class="lnr lnr-calendar-full"></i></a></li>
                                            <li><label>Status : </label> {{$project->status}}</li>
                                        </ul>
                                    </div>
                               </div>
                                <div class="col-md-8">
                                    <div class="blog_post" style="background-color: white; ">
                                         <div class="blog_details">

                                            <h2>{{ucfirst($project->projectHead)}}</h2>
                                           
                                             <p>{{$project->projectDesc}}</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </article>
                            </div>
                          @endforeach
                    </div>
                    <hr>
                            <div class="col-lg-12" style="margin-top: 20px;">
                             
                                    <a class="cp_btn" href="{{ url('volunteer') }}" style=" padding: 15px;">Volunteer</a>
                                
                                    <a class="cp_btn text-center" href="{{ url('donate') }}" style="border: 1px solid #CDCCCC; width: 100px;padding: 15px;">Donate </a>
                               
                            </div>
  
               </div>
            </div>
        </section>
        <!--================End Denation Area =================-->
@endsection
