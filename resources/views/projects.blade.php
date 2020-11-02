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
              <a href="#">Projects</a>
            </div>
          </div>
        </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

             <div class="container" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-lg-12">
                          @if (session('status'))
                         <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <div class="alert alert-success">
                              {{ session('status') }}
                          </div>
                         @endif
                        <div class="blog_left_sidebar">
                        	 <article class="row blog_item">
                               <table class="table table-striped">
                               	<tr>
                               		<th>Id</th>
                               		<th>Name</th>
	                               	<th>Email</th>
	                               	<th>Organisation</th>
	                               	<th>Project Title</th>
	                               	<th>Need</th>
	                               	<th>Details Of Need</th>
	                               	<th>Address</th>
	                               	<th>Time Created</th>
	                               	<th></th>
	                               	<th></th>
	                            </tr>
                            @foreach($projects as $project)
                           
	                            <tr>
	                            	<td>{{$project->id}}</td>
	                            	<td>{{$project->name}}</td>
	                            	<td>{{$project->email}}</td>
	                            	<td>{{$project->organization}}</td>
	                            	<td>{{$project->projectHead}}</td>
	                            	
	                            	<td>{{$project->need}}</td>
	                            	<td>{{$project->needDetail}}</td>
	                            	<td>{{$project->address}}</td>
	                            	<td>{{$project->created_at->diffForHumans()}}</td>
	                            	<td><a href="/project/{{$project->id}}" class="main_btn"> View </a></td>
	                            	
	                            </tr>
	                             @endforeach
 							   </table>
                            </article>
                         
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
                                  
                               
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
        
@endsection