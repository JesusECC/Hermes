@csrf
<div class="row p-t-20">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $trabajador[0]->nombre }}">                
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ $trabajador[0]->apellidos }}">                
        </div>
    </div>
</div>
<div class="row p-t-20">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Tipo de Documento</label>
            <!-- idTipo_documento -->
            <select class="form-control selectpicker" style="width: 100%" name="idTipo_documento" id="idTipo_documento" data-live-search="true">
                <option >Seleccione</option>
                @foreach($documento as $docu)
                    <option value="{{$docu->id}}">{{ $docu->nombre_TD}}</option>
                @endforeach
            </select>                
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Numero de Documento</label>
            <input type="text" name="nro_documento" id="nro_documento" class="form-control" value="{{ $trabajador[0]->nro_documento }}">                
        </div>
    </div>
</div>
<div class="row p-t-20">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ $trabajador[0]->fecha_nacimiento }}">                
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">sexo</label>
            <select class="form-control selectpicker" style="width: 100%" name="sexo" id="sexo" data-live-search="true">
                <option >Seleccione</option>
                    <option value="F">Femenino</option>
                    <option value="M">Maculino</option>
            </select>              
        </div>
    </div>
</div>
<div class="row p-t-20">    
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">sueldo</label>
            <input type="number" name="sueldo" id="sueldo" class="form-control" value="{{ $trabajador[0]->sueldo }}" >                
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Fecha Inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ $trabajador[0]->fecha_inicio }}">                
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Fecha Fin</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ $trabajador[0]->fecha_fin }}">                
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Estado</label>
            <select class="form-control selectpicker" style="width: 100%" name="estado_idEstado" id="estado_idEstado">
                <option >Seleccione</option>
                @foreach($estado as $estado)
                    <option value="{{$estado->id}}">{{ $estado->descripcion}}</option>
                @endforeach
            </select>          
        </div>
    </div>
</div>