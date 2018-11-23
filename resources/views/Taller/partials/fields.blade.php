 @csrf

                                         <div class="row p-t-20">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Codigo</label>
                                                    <input type="text" name="codigoT" id="codigoT" class="form-control" placeholder="Asignar un codigo">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Nombre</label>
                                                    <input type="text" id="nombre_taller" name="nombre_taller" class="form-control" placeholder="Nombre Taller">
                                                 </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Telefono</label>
                                                    <input type="text" id="numero" name="numero" class="form-control" placeholder="Ingrese numero Telefono">
                                                    </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tipo de Telefono</label>
                                                <select  class="form-control selectpicker" id="idTipo_telefono" name="idTipo_telefono" data-live-search="true">
                                                <option value="" disabled="" selected="">Seleccione Tipo Telefono</option>
                                                @foreach($tipotelefono as $tt)                
                                                <option value="{{$tt->id}}">{{$tt->nombre_tipo}}</option>
                                                @endforeach  
                                                </select>    
                                                    </div>
                                            </div>
                                       
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Operador</label>
                                                <select  class="form-control selectpicker" id="idTipooperador" name="idTipooperador" data-live-search="true">
                                                <option value="" disabled="" selected="">Seleccione el operador</option>
                                                @foreach($operador as $op)                
                                                <option value="{{$op->id}}">{{$op->nombre_operador}}</option>
                                                @endforeach  
                                                </select>    
                                                    </div>
                                            </div>

                                                 <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Direccion</label>
                                                    <input type="text" id="direccionAL" name="direccionAL" class="form-control" placeholder="Ingrese la Direccion">
                                                    </div>
                                            </div>                                  
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Departamento</label>
                                                <select  class="form-control selectpicker" id="departamento" name="departamento" data-live-search="true">
                                                <option value="" disabled="" selected="">Seleccione Departamento</option>
                                                @foreach($departamento as $de)                
                                                <option value="{{$de->id}}">{{$de->nombre_departamento}}</option>
                                                @endforeach  
                                                </select>    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Provincia</label>
                                                <select  class="form-control selectpicker" id="provincia" name="provincia" data-live-search="true">
                                                <option value="" disabled="" selected="">Seleccione Provincia</option>
                                                @foreach($provincia as $pro)                
                                                <option value="{{$pro->id}}">{{$pro->nombre_provincia}}</option>
                                                @endforeach  
                                                </select>    
                                                </div>
                                            </div>
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Distrito</label>
                                                <select  class="form-control selectpicker" id="distrito" name="distrito" data-live-search="true">
                                                <option value="" disabled="" selected="">Seleccione Distrito</option>
                                                @foreach($distrito as $dis)                
                                                <option value="{{$dis->id}}">{{$dis->nombre_distrito}}</option>
                                                @endforeach  
                                                </select>    
                                                    </div>
                                            </div>
                                            
                                       