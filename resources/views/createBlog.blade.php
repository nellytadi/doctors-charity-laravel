@extends('partial-views.adminheader')
@section('body')
<style type="text/css">
 .btn{
      width: 150px;
      height: 40px;
      border-radius: 5px;
      padding: 10px;
    }
    .register-form{
    	background: url('{{asset('img/login.jpg')}}') no-repeat ;
     	 margin-top: 150px;
    }
</style>



        <section class="register-form">
          <div class="container">
            <div class="row donation_f_inner">

              <div class="col-lg-8 offset-lg-1">
                <div class="dn_form_area">
                    @if (session('status'))
                        <div class="alert alert-success">
                        	<button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session('status') }}
                        </div>
                    @endif
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
  	       	   	<h1 style="color: #fff;" >Create Blog Post</h1><hr style="margin-bottom: 50px;">
                     
                            <form class="donation_form row" action="{{ route('admin.create.blog.submit') }}" method="POST" id="contactForm" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <div class="form-group col-lg-12">
                                     <input type="text" class="form-control" name="postHead" placeholder="Post Heading" required>
                                </div>
                              
                                <div class="form-group col-lg-6">
                                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name }}" readonly  required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control"  name="email" value="{{Auth::user()->email }}" readonly required>
                                </div>
                                <div class="form-group col-lg-12">
                                    <input type="url" name="url" class="form-control" placeholder="Enter Related Url (optional*)">
                                </div>
                                <div class="form-group col-lg-12">
                                    <textarea class="form-control" name="post" placeholder="Blog Post"></textarea>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="file" style="color: #fff;" > Attach Image(s) <small> (optional*)</small></label>
                                    <input type="file" class="form-control" id="file" name="image[]" accept="image/*" multiple>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <button type="submit" value="submit" class="submit_btn form-control">Publish</button>
                                </div>
                            </form>
                          </div>
                        </div>
          </div>
      </div>
  </section>



@endsection