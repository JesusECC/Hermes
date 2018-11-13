@csrf
<div class="row p-t-20">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Lista de Trabajador</label>
            <!-- idTipo_documento -->
            <select class="select2" style="width: 100%" name="Trabajador_idTrabajador" id="Trabajador_idTrabajador">
                <option >Seleccione...</option>
                @foreach($trabajador as $traba)
                    <option value="{{$traba->idTrabajador}}">{{ $traba->nombre }} {{ $traba->apellidos }} </option>
                @endforeach
            </select>                
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="example@gmail.com">                
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
<div class="row p-t-20">    
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese Comtraseña">                
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="password-confirm" class="control-label">Confirmar Contraseña</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>    
        </div>
    </div>
</div>
<div class="row p-t-20">    
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Rol</label>
            <!-- idTipo_documento -->
            <select class="select2" style="width: 100%" name="idRol" id="idRol">
                <option >Seleccione...</option>
                @foreach($rol as $rol)
                    <option value="{{$rol->id}}">{{ $rol->nombreRol }}</option>
                @endforeach
            </select>                
        </div>
    </div>
</div>