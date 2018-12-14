<div class="modal fade in" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal-delete-{{$prod->id}}" style="padding-left: 17px;border-radius:0px !important;">
 
{{Form::Open(array('action'=>array('Producto_DetalleController@destroy',$prod->id),'method'=>'POST'))}}
@csrf

  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header mh-p" style="border:1px solid #EC5565 !important;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <center>
          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-transparent text-center p-md">
                
                <h3 class="m-t-none m-b-sm text-warning">Advertencia</h3>
                
              </div>
            </div>
            <h3>¿Desea eliminar al El detalle del Producto?</h3>
          </div>
          
        </center>
  </div>
  <div class="modal-footer">
       <button type="button" class="btn btn-danger"  data-dismiss="modal" aria-label="Close"> Cancelar</button>
       <button herf="" type="submit" class="btn " style="background-color: #18A689 !important;border: 1px solid #18A689 !important;color: white !important"> Aceptar</button>
        
      </div>

    </div>

  </div> 

  {{Form::Close()}}

</div>
</div>