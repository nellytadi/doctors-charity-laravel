@extends('partial-views.header')
@section('body')
<style type="text/css">
     .form-field{
        background: url('img/login.jpg') no-repeat ;
        margin-top: 150px;
       height: 800px;
       width: 100%;
       position: relative;
    }
    .register-form{
        background:#fff;
        position: absolute;
        width: 400px;
        padding: 50px;
        top: 43%;
        left: 60%;
        transform: translate(-50%, -50%);
        font-size: 14px;
    }
</style>
<div class="form-field">
   <div class="container">
        <div class="register-form contact_form">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                         <h1 style="text-align: center;">Register</h1>
                         <hr>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                           
                        </div>
                         <div class="form-group{{ $errors->has('organization') ? ' has-error' : '' }}">
                          
                                <input id="name" type="text" class="form-control" name="organization" value="{{ old('organization') }}" placeholder="Organization's Name" required autofocus>

                                @if ($errors->has('organization'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('organization') }}</strong>
                                    </span>
                                @endif
                           

                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            <textarea id="bio" name="bio" class="form-control" placeholder="Brief description about yourself" value="{{ old('bio') }}" required></textarea> 
                        </div>

                         <div class="form-group{{ $errors->has('cv') ? ' has-error' : '' }}">
                            <label for ="file"> Attach CV <small>(optional*)</small></label>
                            <input type="file" name="cv" class="form-control" accept="application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document">

                             @if ($errors->has('cv'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cv') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                        <div class="form-group">
                           
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                            
                        </div>

                        <div class="form-group">
                           
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                         
                        </div>
                           
                    </form>
                     
</div>
</div>
</div>
@endsection
