@extends('layouts.app')

@section('content')


<form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
    @csrf
        <a href="javascript:void(0)" class="text-center db"><img src="{{asset('images/logo-icon.png')}}" alt="Home" /><br/>
            
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

      <form class="form-horizontal" id="recoverform" method="POST" action="{{ route('password.update') }}">
      @csrf
      
        <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recuperar Contraseña</h3>
            <p class="text-muted">Ingrese los siguientes datos!</p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
          <input id="email" type="email" placeholder="Ingrese Correo" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
          @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
          <input id="password" type="password" placeholder="Ingrese Nuevo Correo" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
          @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
          <input id="password-confirm" type="password" placeholder="Confirme nuevo correo" class="form-control" name="password_confirmation" required>
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reiniciar</button>
          </div>
        </div>
      </form>

@endsection






