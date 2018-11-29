 @csrf

                                         <div class="row p-t-20">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Nombre</label>
                                                     <input type="text" name="nombreper" id="nombreper" class="form-control" value="{{$telecliente[0]->nombreper}}">  
                                                </div>
                                            </div>

                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Apellidos</label>
                                                    <input type="text" id="apellidos" name="apellidos" class="form-control" value="{{$telecliente[0]->apellidos}}">
                                                 </div>
                                             </div>                                            
                                             <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Fecha de Nacimiento</label>
                                                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"  value="{{$telecliente[0]->fecha_nacimiento}}">                
                                                    </div>
                                             </div>
                                         </div>
                                        
                                         <div class="row p-t-20">
                                              <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">sexo</label>
                                                        <select class="select2" style="width: 100%" name="sexo" id="sexo">
                                                            <option >Seleccione</option>
                                                                <option value="F">Femenino</option>
                                                                <option value="M">Maculino</option>
                                                        </select>              
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Tipo de Telefono</label>
                                                                <select  class="select2" id="idTipo_telefono" name="idTipo_telefono" data-live-search="true">
                                                                <option value="" disabled="" selected="">Seleccione Tipo Telefono</option>
                                                                @foreach($tipotelefono as $tt)                
                                                                <option value="{{$tt->id}}">{{$tt->nombre_tipo}}</option>
                                                                @endforeach  
                                                                </select>    
                                                        </div>
                                               </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Telefono</label>
                                                        <input type="text" id="numero" name="numero" class="form-control"  value="{{$telecliente[0]->numero}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row p-t-20">
                                                     <div class="col-md-4">
                                                        <div class="form- group">
                                                            <label>Operador</label>
                                                                <select  class="select2" id="idTipooperador" name="idTipooperador" data-live-search="true">
                                                                <option value="" disabled="" selected="">Seleccione el operador</option>
                                                                @foreach($operador as $op)                
                                                                <option value="{{$op->id}}">{{$op->nombre_operador}}</option>
                                                                @endforeach  
                                                                </select>    
                                                        </div>
                                                      </div>
                                                   
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Tipo de cliente</label>
                                                                <select  class="select2" id="tipocliente" name="tipocliente" data-live-search="true">
                                                                <option value="" disabled="" selected="">Seleccione Tipo de cliente</option>
                                                                @foreach($tipocliente as $clie)                
                                                                <option value="{{$clie->id}}">{{$clie->nombreTC}}</option>
                                                                @endforeach  
                                                                </select>    
                                                        </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Departamento</label>
                                                                <select  class="select2" id="departamento" name="departamento" data-live-search="true">
                                                                <option value="" disabled="" selected="">Seleccione Departamento</option>
                                                                @foreach($departamento as $de)                
                                                                <option value="{{$de->id}}">{{$de->nombre_departamento}}</option>
                                                                @endforeach  
                                                                </select>    
                                                            </div>
                                                    </div>
                                                </div>


                                                    <div class="row p-t-20">
                                                         <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Provincia</label>
                                                                    <select  class="select2" id="provincia" name="provincia" data-live-search="true">
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
                                                                    <select  class="select2" id="distrito" name="distrito" data-live-search="true">
                                                                    <option value="" disabled="" selected="">Seleccione Distrito</option>
                                                                    @foreach($distrito as $dis)                
                                                                    <option value="{{$dis->id}}">{{$dis->nombre_distrito}}</option>
                                                                    @endforeach  
                                                                    </select>    
                                                            </div>
                                                         </div>
                                                         <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Direccion</label>
                                                                    <input type="text" id="nombre_direccion" name="nombre_direccion" class="form-control"  value="{{$telecliente[0]->nombre_direccion}}">
                                                                </div>
                                                         </div>
                                                    </div>
                                                      <div class="row p-t-20">
                                                            <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Tipo de Documento</label>
                                                                                <select  class="select2" id="idTipo_documento" name="idTipo_documento" data-live-search="true">
                                                                                <option value="" disabled="" selected="">Seleccione Tipo Telefono</option>
                                                                                @foreach($tipodocumento as $tt)                
                                                                                <option value="{{$tt->id}}">{{$tt->nombre_TD}}</option>
                                                                                @endforeach  
                                                                                </select>    
                                                                        </div>
                                                               </div>
                                                               <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">N°Documento</label>
                                                                    <input type="text" id="nro_documento" name="nro_documento" class="form-control"  value="{{$telecliente[0]->nro_documento}}">
                                                                 </div>
                                                             </div> 
                                                             <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Estado</label>
                                                                                <select  class="select2" id="estado_idEstado" name="estado_idEstado" data-live-search="true">
                                                                                <option value="" disabled="" selected="">Seleccione Tipo Telefono</option>
                                                                                @foreach($estado as $est)                
                                                                                <option value="{{$est->id}}">{{$est->tipo_estado}}</option>
                                                                                @endforeach  
                                                                                </select>    
                                                                        </div>
                                                               </div>  
                                                       </div>
                                        <input type="hidden" name="perid" value="{{$telecliente[
                                            0]->perid}}">
                                         <input type="hidden" name="tcid" value="{{$telecliente[
                                            0]->tcid}}">
                                          <input type="hidden" name="estid" value="{{$telecliente[
                                            0]->estid}}">
                                             <input type="hidden" name="direid" value="{{$telecliente[
                                            0]->direid}}">
                                             <input type="hidden" name="tepid" value="{{$telecliente[
                                            0]->tepid}}">
                                      
                                            
                                           
