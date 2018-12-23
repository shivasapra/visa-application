
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <title>
     - Authentication
  </title>
  <link href="{{asset('/css/reset.min.css?v=2.1.1')}}" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="{{asset("/plugins/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href='{{asset("/plugins/roboto/roboto.css")}}' rel='stylesheet'>
  <link href='{{asset("/css/bs-overides.min.css")}}' rel='stylesheet'>
  
  <style>
      body {
        font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
        background-color: #fff;
        font-size: 13px;
        color: #6a6c6f;
        background: #444a52;
        margin: 0;
        padding: 0;
      }

      h1 {
        font-weight: 400;
        font-size: 24px;
        margin-bottom: 35px;
        text-transform: uppercase;
        text-align: center;
      }

      .btn-primary {
        color: #ffffff;
        background-color: #28b8da;
        border-color: #22a7c6;
      }

      .btn-primary:focus,
      .btn-primary.focus {
        color: #ffffff;
        background-color: #1e95b1;
        border-color: #0f4b5a;
      }

      .btn-primary:hover {
        color: #ffffff;
        background-color: #1e95b1;
        border-color: #197b92;
      }

      .btn-primary:active,
      .btn-primary.active,
      .open>.dropdown-toggle.btn-primary {
        color: #ffffff;
        background-color: #1e95b1;
        border-color: #197b92;
      }

      .btn-primary:active:hover,
      .btn-primary.active:hover,
      .open>.dropdown-toggle.btn-primary:hover,
      .btn-primary:active:focus,
      .btn-primary.active:focus,
      .open>.dropdown-toggle.btn-primary:focus,
      .btn-primary:active.focus,
      .btn-primary.active.focus,
      .open>.dropdown-toggle.btn-primary.focus {
        color: #ffffff;
        background-color: #197b92;
        border-color: #0f4b5a;
      }

      .btn-primary:active,
      .btn-primary.active,
      .open>.dropdown-toggle.btn-primary {
        background-image: none;
      }

      .btn-primary.disabled,
      .btn-primary[disabled],
      fieldset[disabled] .btn-primary,
      .btn-primary.disabled:hover,
      .btn-primary[disabled]:hover,
      fieldset[disabled] .btn-primary:hover,
      .btn-primary.disabled:focus,
      .btn-primary[disabled]:focus,
      fieldset[disabled] .btn-primary:focus,
      .btn-primary.disabled.focus,
      .btn-primary[disabled].focus,
      fieldset[disabled] .btn-primary.focus,
      .btn-primary.disabled:active,
      .btn-primary[disabled]:active,
      fieldset[disabled] .btn-primary:active,
      .btn-primary.disabled.active,
      .btn-primary[disabled].active,
      fieldset[disabled] .btn-primary.active {
        background-color: #28b8da;
        border-color: #22a7c6;
      }

      .btn-primary .badge {
        color: #28b8da;
        background-color: #ffffff;
      }

      input[type="text"],
      input[type="password"],
      input[type="datetime"],
      input[type="datetime-local"],
      input[type="date"],
      input[type="month"],
      input[type="time"],
      input[type="week"],
      input[type="number"],
      input[type="email"],
      input[type="url"],
      input[type="search"],
      input[type="tel"],
      input[type="color"],
      .uneditable-input,
      input[type="color"] {
        border: 1px solid #bfcbd9;
        -webkit-box-shadow: none;
        box-shadow: none;
        color: #494949;
        font-size: 14px;
        line-height: 1;
        height: 36px;
      }

      input[type="text"]:focus,
      input[type="password"]:focus,
      input[type="datetime"]:focus,
      input[type="datetime-local"]:focus,
      input[type="date"]:focus,
      input[type="month"]:focus,
      input[type="time"]:focus,
      input[type="week"]:focus,
      input[type="number"]:focus,
      input[type="email"]:focus,
      input[type="url"]:focus,
      input[type="search"]:focus,
      input[type="tel"]:focus,
      input[type="color"]:focus,
      .uneditable-input:focus,
      input[type="color"]:focus {
        border-color: #03a9f4;
        -webkit-box-shadow: none;
        box-shadow: none;
        outline: 0 none;
      }

      input.form-control {
        -webkit-box-shadow: none;
        box-shadow: none;
      }

      .company-logo {
        padding: 25px 10px;
        display: block;
      }

      .company-logo img {
        margin: 0 auto;
        display: block;
      }

      .authentication-form-wrapper {
        margin-top: 70px;
      }

      @media (max-width:768px) {
        .authentication-form-wrapper {
          margin-top: 15px;
        }
      }

      .authentication-form {
        border-radius: 2px;
        border: 1px solid #e4e5e7;
        padding: 20px;
        background: #fff;
      }

      label {
        font-weight: 400 !important;
      }

      @media screen and (max-height: 575px) {
        #rc-imageselect,
        .g-recaptcha {
          transform: scale(0.83);
          -webkit-transform: scale(0.83);
          transform-origin: 0 0;
          -webkit-transform-origin: 0 0;
        }
      }
</style>

</head>
<body class="login_admin">
 <div class="container">
  <div class="row">
   <div class="col-md-4 col-md-offset-4 authentication-form-wrapper">
    <div class="company-logo">
          </div>
    <div class="mtop40 authentication-form">
      <h1>Login</h1>
          <div class="row">
       </div>
      <form action="{{ route('login') }}" method="post" accept-charset="utf-8">
        @csrf                                                                                                         
        <div class="form-group">
            <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
         </div>
      
        <div class="form-group">
            <label for="password" class="control-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="checkbox">
          <label for="remember">
           <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}</label>
        </div>
       
       <div class="form-group">
            <button type="submit" class="btn btn-info btn-block">
                {{ __('Login') }}
            </button>
        </div>
      
        <div class="form-group">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>

        <div class="form-group">
            @if (Route::has('register'))
                <a class="btn btn-default btn-block" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        </div>
    </div>
</form>  
</div>
</div>
</div>
</div>
</body>
</html>





{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}