@extends('layouts.app')
@section('content')
<form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login-user') }}">
    @csrf
        <a href="javascript:void(0)" class="text-center db"><img src="{{asset('images/logo-icon.jpg')}}" width="200" style="border-radius:50px" alt="Home" /><br/>            
        </a>        
        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email" type="email" required="" placeholder="Usuario" autofocus> 
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" type="password" name="password" required placeholder="Contraseña">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="form-group">
          <a href="javascript:void(0)" id="to-recover" class="text-light"><i class="fa fa-lock"></i> ¿Olvidaste tu contraseña?</a> 
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
          </div>
        </div>
</form>      
@endsection






