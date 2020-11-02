@extends('partial-views.header')
@section('body')  
 <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
              <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
          <div class="banner_content text-center">
            <h2>Projects</h2>
            <div class="page_link">
              <a href="{{url('/')}}">Home</a>
              <a href="{{url('/projects')}}">Projects</a>
            </div>
          </div>
        </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

             <!--================End Home Banner Area =================-->

                               <style type="text/css">
                                  p{
                                  font-weight: 400;
                                  font-size: 14px;
                                 }
                                 b{
                                   font-weight: 600;
                                  font-size: 16px;
                                 }
                               </style>
    <section class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                 
                        <div class="blog_left_sidebar">
                          
                            <article class="row blog_item">
                              <div class="col-md-3">
                                   <div class="blog_info text-right">
                                        <div class="post_tag">
                                            
                                           
                                        </div>
                                        <ul class="blog_meta list">
                                            <li><a href="#">{{$project->name}}<i class="lnr lnr-user"></i></a></li>
                                            <li><a href="#"> {{$project->created_at->diffForHumans()}}<i class="lnr lnr-calendar-full"></i></a></li>
                                            <li><a href="#">{{$project->organization}}<i class="lnr lnr-eye"></i></a></li>
                                            <li><a href="#"> {{$project->email}}<i class="lnr lnr-bubble"></i></a></li>
                                            <li><a href="#"> {{$project->address}}<i class="fa fa-book"></i></a></li>
                                        </ul>
                                    </div>
                               </div>
                            
                                <div class="col-md-8" style="background:#fff; padding:20px;">
                                   <h2>{{$project->projectHead}}</h2><hr>
                                    <div class="blog_post">
                                      @if($project->file)
                                      @foreach ($project->file as $file)
                                          <img src="{{asset('public/'.$file->file)}}" class="img-fluid">
                                      @endforeach
                                    @endif
                                        <div class="blog_details">
                                           <b>Project Need</b>
                                            <p>{{$project->need}} : {{$project->needDetail}}</p>
                                             <b>Project Details</b>
                                            <p>{{$project->projectDesc}}</p>
                                            <p><td><a href="/projects/{{$project->id}}" class="main_btn"> Approve </a></td>
                                            <td><a href="/projects/reject/{{$project->id}}" class="white_bg_btn"> Reject  </a></td></p>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>
                    </div>
                  
                    </div>
               
            </div>
        </section>
        <!--================Blog Area =================-->

@endsection