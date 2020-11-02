@extends('partial-views.header')
@section('body')
<style type="text/css">
     .form-field{
        background: url('{{asset('img/login.jpg')}}') no-repeat ;
        margin-top: 150px;
       height: 800px;
       width: 100%;
       position: relative;
    }
    .form{
        background:#fff;
        position: absolute;
        padding: 50px;
        top: 30%;
        left: 60%;
        transform: translate(-50%, -50%);
        font-size: 14px;
    }
</style>
<div class="form-field">
   <div class="container">
        <div class="form">

              
                    <form class="contact_form" method="POST" action="{{ route('admin.login.submit') }}">
                         <h1 style="text-align: center;">Admin Login</h1>
                         <hr>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-6 control-label">E-Mail Address</label>
                          
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-6 control-label">Password</label>

                           
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                 

                        <div class="form-group">
                         
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                           
                        </div>
                        <hr>
                    </form>
                     
                </div>
        </div>     
   
</div>
@endsection
