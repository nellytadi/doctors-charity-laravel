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
              <a href="#">Blog Posts</a>
            </div>
          </div>
        </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
 <!--================Blog Area =================-->
        <section class="blog_area" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog_left_sidebar">
                            @foreach($blogs as $blog)
                            <article class="row blog_item" style="margin-top: 70px;">
                               <div class="col-md-3">
                                   <div class="blog_info text-right">
                                        <ul class="blog_meta list">
                                            <li><a href="#">{{$blog->name}}<i class="lnr lnr-user"></i></a></li>
                                            <li><a href="#">{{$blog->created_at->diffForHumans()}}<i class="lnr lnr-calendar-full"></i></a></li>
                                        </ul>
                                    </div>
                               </div>
                                <div class="col-md-9">
                                    <div class="blog_post" style="background-color: white; padding:  20px;">
                                         <div class="blog_details">

                                            <h1>{{ucfirst($blog->postHead)}}</h1>
                                            @if(count($blog->blogfile))
                                               @foreach($blog->blogfile as $file)
                                               <img src="{{asset('public/'.$file->file)}}" alt="Image" class="img-fluid" style="margin-bottom: 20px;" width="300">
                                              @endforeach
                                            @endif
                                             <p>{{str_limit($blog->post, 300)}}</p>
                                             <a href="/blog/{{$blog->id}}" class="white_bg_btn">Read more ...</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                          @endforeach
                            <nav class="blog-pagination justify-content-center d-flex">
                               <style type="text/css">
                                   .blog-pagination li{
                                   
                                      border-color: transparent;
                                      border-radius: 3px;
                                      padding: 10px;
                                      color: #ea2c58;
                                   }
                                   .blog-pagination li:hover{
                                    background-color: #fff;
                                    color: #ea2c58;
                                   
                                   }
                                 
                               </style>
                                    {{ $blogs->links() }}
                               
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
        

@endsection