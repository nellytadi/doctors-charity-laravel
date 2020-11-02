@extends('partial-views.adminheader')
@section('body')
 
        <!--================Blog Categorie Area =================-->
        <section class="blog_categorie_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="categories_post">
                        	 <a href="{{route('admin.create.blog')}}">
                            <img src="img/blog/cat-post/create.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                   <h5>Create Blog Post</h5>
                                    <div class="border_line"></div>
                                    <p>All blog posts are published on the home page </p>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="categories_post"><a href="{{route('admin.projects')}}">
                            <img src="img/blog/cat-post/create.jpg" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <h5>Verify Projects</h5></a>
                                    <div class="border_line"></div>
                                    <p>Verify project to begin fund raising </p>
                                </div>
                            </div></a>
                        </div>
                    </div>
              
                </div>
            </div>
        </section>
        <!--================Blog Categorie Area =================-->
        
       
@endsection