@extends('partial-views.header')
@section('body')  

  <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
              <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
          <div class="banner_content text-center">
            <h2>Blog Posts</h2>
            <div class="page_link">
              <a href="{{url('/')}}">Home</a>
              <a href="#">Blog Post</a>
            </div>
          </div>
        </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
    <section class="blog_area"  >
            <div class="container" style="padding-bottom: 100px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog_left_sidebar">
                        
                            <article class="row blog_item">
                              <div class="col-md-12">
                                <h1 style="padding: 50px; text-align: center;">{{ucfirst($blogs->postHead)}}</h1>
                              </div>
                               <div class="col-md-3">
                                   <div class="blog_info text-right">
                                    
                                        <ul class="blog_meta list" >
                                            <li style="font-size: 16px; font-weight: 600px;"><a href="#">{{$blogs->name}}<i class="lnr lnr-user"></i></a></li>
                                            <li><a href="#">{{$blogs->created_at->diffForHumans()}}<i class="lnr lnr-calendar-full"></i></a></li>
                                        </ul>
                                    </div>
                               </div>
                                <div class="col-md-9" style="background-color: white; padding: 0px 20px;">
                                    <div class="blog_post">
                                   	
                                     
                                        <div class="blog_details">
                                        
                                              @foreach ($blogs->blogfile as $blog)
                                              <div class="row gallery_inner imageGallery1">
                                              <div class="col-md-4 col-sm-6 gallery_item">
                                                  <div class="gallery_img">
                                                      <img src="{{asset('public/'.$blog->file)}}" alt="Image" class="img-fluid">
                                                      <div class="hover">
                                                        <a class="light" href="{{asset('public/'.$blog->file)}}"><i class="fa fa-expand"></i></a>
                                                      </div>
                                                  </div>
                                              </div>
		                                   	</div>
		                           			 @endforeach
                                            <p style="margin-top:25px;">{{$blogs->post}}</p>
                                            <p><a href="{{$blogs->url}}"> {{$blogs->url}}</a></p>
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