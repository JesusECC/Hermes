 @csrf

                                         <div class="row p-t-20">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Razon Social</label>
                                                    <input type="text" name="nombreper" id="nombreper" class="form-control" placeholder="Asignar Nombre">
                                                </div>
                                            </div>
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
                                                            <input type="text" id="nro_documentoP" name="nro_documentoP" class="form-control" placeholder="Ingrese documento">
                                                         </div>
                                                     </div>    
                                        </div>
                                         <div class="row p-t-20">
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
                                                        <input type="text" id="numero" name="numero" class="form-control" placeholder="Ingrese numero Telefono">
                                                    </div>
                                                </div>
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
                                            </div>
                                            <div class="row p-t-20">
                                                     <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label">Direccion</label>
                                                                    <input type="text" id="nombre_direccion" name="nombre_direccion" class="form-control" placeholder="Ingrese la Direccion">
                                                                </div>
                                                         </div>
                                             </div>
                                                     
                                           


                                                   
                                        
                                        
                                            
                                           
