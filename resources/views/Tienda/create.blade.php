 @extends('layouts.admin')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Panel de Adminsitrador</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tienda</a></li>
            <li class="breadcrumb-item ">Registrar Tienda</li>
            
        </ol>
    </div>
</div>
<div class="card">
  <div class="card-header">
     <h4 class="card-title pull-left">Registrar Tienda</h4>
     
  </div>
    <div class="card-body">
        <div class="form-body">
            {!! Form::open(['route'=>'tienda-store','method'=>'POST']) !!}
                   @include('Tienda.partials.fields')
                <button type="submit" class="btn waves-effect waves-light btn-success pull-right">Agregar</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@push('scripts')
<script>
    // $('#departamento').click(function(){
    //         console.log('departamento');
    // });

    // $("#departamento").change(console.log('entre'));

    var selectDepartamento = document.getElementById('departamento');
    selectDepartamento.addEventListener('change',function(){
        var selectedOption = this.options[selectDepartamento.selectedIndex];
        console.log(selectedOption.value + ': ' + selectedOption.text);
        var id=selectedOption.value;
        console.log(id);
        provincia(id);
        
    });
    var selectProvincia = document.getElementById('provincia');
    selectProvincia.addEventListener('change',function(){
        var selectedOption = this.options[selectProvincia.selectedIndex];
        console.log(selectedOption.value + ': ' + selectedOption.text);
        var id=selectedOption.value;
        console.log(id);
        distrito(id);        
    });
  

    function provincia(idDepartamento){
        console.log(idDepartamento,'-----');
      $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{departamento:idDepartamento}, //datos que se envian a traves de ajax
            url:'departamento', //archivo que recibe la peticion
            type:'post', //método de envio
            dataType:"json",//tipo de dato que envio 
            beforeSend: function () {
                console.log('procesando');
                // $("#resultado").html("Procesando, espere por favor...");
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                if(response.veri==true){

                    // var urlBase=window.location.origin;
                    // var url=urlBase+'/'+response.data;
                    // document.location.href=url;
                    var provincia=response.provincia;
                    var va;
                    // console.log(response.provincia,response.veri);
                    va='<option value="" disabled="" selected="">Seleccione</option>'
                    for(const i in provincia){
                        va+='<option value="'+provincia[i]['id']+'">'+provincia[i]['nombre_provincia']+'</option>';                 
                    }
                    $("#provincia").html(va); 
                }else{
                    alert("problemas al enviar la informacion");
                }
            }
        });
    }
    function distrito(idProvincia){
        console.log(idProvincia,'-----');
      $.ajax({
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{Provincia:idProvincia}, //datos que se envian a traves de ajax
            url:'distrito', //archivo que recibe la peticion
            type:'post', //método de envio
            dataType:"json",//tipo de dato que envio 
            beforeSend: function () {
                console.log('procesando');
                // $("#resultado").html("Procesando, espere por favor...");
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                if(response.veri==true){

                    // var urlBase=window.location.origin;
                    // var url=urlBase+'/'+response.data;
                    // document.location.href=url;
                    var distrito=response.distrito;
                    var va;
                    // console.log(response.distrito,response.veri);
                    va='<option value="" disabled="" selected="">Seleccione</option>'
                    for(const i in distrito){
                        va+='<option value="'+distrito[i]['id']+'">'+distrito[i]['nombre_distrito']+'</option>';      
                    }
                    $("#distrito").html(va); 
                }else{
                    alert("problemas al enviar la informacion");
                }
            }
        });
    }


</script>
@endpush
@endsection