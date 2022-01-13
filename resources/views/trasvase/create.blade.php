@extends('adminlte::page')



@section('css')
<style>
    .card-head {
        background: #1488CC;
        background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);
        background: linear-gradient(to right, #2B32B2, #1488CC);
        color: white;
    }

    .card-heaad {
        background: #1488CC;
        background: linear-gradient(to right, #5bb3ce, #1179b6);
        color: white;
    }
</style>
@stop


@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Orden de trabajo
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('orden.index') }}">Orden de trabajo</a></li>
                <li class="breadcrumb-item">producto</li>
                <li class="breadcrumb-item active">Registro</li>
            </ol>
        </div>
    </div>
</div>
@stop

@section('content')

<div class="container-fluid" id="Contenido">
    <div class="row" id="tabla">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Registro de Formato</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'trasvase.store', 'enctype' => 'multipart/form-data']) !!}

                    <div class="row">
                        <div class="form-group col-lg-4">
                            {!! Form::label('Nombre', 'Tanque IBC:') !!}

                            <select name="tanque_id" id="" class="form-control">
                                @foreach ($tanques as $tanque)
                                <option value=" {{ $tanque->id }}"> Tanque #{{ $tanque->id }} - Capacidad:
                                    {{$tanque->capacidad }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            {!! Form::label('fecha', 'Fecha:') !!}
                            {!! Form::date('fecha',null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="productos">Lista de Productos</label>
                            <button type="button" id="productos" class="btn btn-primary form-control"
                                data-toggle="modal" data-target=".bd-example-modal-xl"><i
                                    class="fas fa-plus-square"></i>Agregar Producto</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <div class="">
                                <table id="detalles" class="table table-bordered table-condensed table-hover">
                                    <thead class="card-heaad">
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>presentacion</th>
                                        <th>Unidades</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            {!! Form::label('comentario', 'Observaciones:') !!}
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-comment-alt"></i></span>
                                </div>
                                {!! Form::textArea('comentario', null, ['class' => 'form-control', 'cols' => 100 ,
                                'rows' => '2']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row pt-5">
                        <div class="form-group col-12">
                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ url('/') }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header card-head">
                <h5 class="modal-title ">Productos Disponibles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <table id="lista" class="table dt-responsive table-bordered data-table" width='100%'>
                        <thead>
                            <th>Añadir</th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Presentacion</th>
                            {{-- <th style="width: 10%">img</th> --}}
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer" style="background: #ffffff">
                    <button id="submit" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('js')

<script>
    function listarTabla(){
  console.log('oe')
  table = $('#lista').DataTable({
  processing: true,
  serverSide: true,
  responsive: true,
  "language": {
          "url": "http://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
      },
  autoWidth: false,
  ajax: "{{ route('trasvase.productos') }}",
  columns: [
              {data: 'accion', name: 'accion'},
              {data: 'id', name: 'id'},
              {data: 'nombre', name: 'nombre'},
              {data: 'presentacion', name: 'presentacion'},
              ],
  })
}

var cont=0;

function agregarDetalle(id,nombre,presentacion){
  var prods = Array.from(document.getElementsByName("id[]"));

  var bol = prods.find((elemento) => {
    return elemento.value == id
  })
  if (!bol){
    var cantidad=1;
    var descuento= document.getElementById('monto-t');
    if (id!=""){
    //   var subtotal=cantidad*precio;
      var fila='<tr class="filas" id="fila'+cont+'">'+
      '<td class="d-flex justify-content-center"><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')"><i class="fas fa-trash"></i></button></td>'+
      '<td><input type="hidden" name="id[]" value="'+id+'">'+nombre+'</td>'+
      '<td><p>'+presentacion+'</p></td>'+
      '<td><input type="number" id="cantidad-prd" class="form-control " name="cantidad[]" data-cantidad='+cont +"id='cantidad[]'" + '</td>'+
      '</tr>';
      cont++;
      detalles=detalles+1;
      $('#detalles').append(fila);
    }else{
      alert("Error al ingresar el detalle, revisar los datos del artículo");
    }
  }
}


listarTabla();
</script>
@endsection





{{--
@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Solicitud de Servicio Tecnico
            </h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('empleado.index') }}">Admininstrar Veta</a></li>
                <li class="breadcrumb-item">Empleado</li>
                <li class="breadcrumb-item active">Registro</li>
            </ol>
        </div>
    </div>
</div>
@stop


@section('content')
<div class="container-fluid" id="Contenido">
    <div class="row" id="tabla">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rellene el formulario</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'GuardarOrden', 'enctype' => 'multipart/form-data']) !!}
                    {!! Form::hidden('latitud', '',['id' => 'latitud']) !!}
                    {!! Form::hidden('longitud', '', ['id' => 'longitud']) !!}
                    <div class="row">
                        <div class="form-group col-12">
                            {!! Form::label('servicio', 'Tipo de servicio:') !!}
                        </div>
                        @foreach ($servicios as $servicio)
                        <div class="form-group col-3">
                            <div class="form-check">
                                {!! Form::radio('servicio', $servicio->id, false, ['class' =>
                                'form-check-input','required' => 'true']) !!}
                                {!! Form::label('servicio', $servicio->nombre, ['class' => 'form-check-label']) !!}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            {!! Form::label('comment', 'Comentario:') !!}
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-comment-alt"></i></span>
                                </div>
                                {!! Form::textArea('comentario', null, ['class' => 'form-control', 'cols' => 100 ,
                                'rows' => '2']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="">Indique la ubicacion</label>
                        </div>
                        <div class="col-4"></div>
                        <div id="myMap" class="col-4" style="height:500px; width:500px"></div>
                        <div class="col-4"></div>
                    </div>

                    <div class="row pt-5">
                        <div class="form-group col-12">
                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ url('/') }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}



{{-- @section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" /> --}}

{{-- @section('js')
<script src="/js/app.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
<script>
    console.log('hola');
  var url = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';

  let myMap = L.map('myMap').setView([-17.784320, -63.181102],13);

  L.tileLayer(url,{
    maxZoom:20,
  }).addTo(myMap);

let marker= L.marker([myMap.getCenter().lat,myMap.getCenter().lng]).addTo(myMap)
let lng = document.getElementById('longitud')
let lat = document.getElementById('latitud')

myMap.doubleClickZoom.disable();
myMap.on('dblclick', e => {
  let latLng = myMap.mouseEventToLatLng(e.originalEvent);
  marker.remove();
  marker = L.marker([latLng.lat,latLng.lng]).addTo(myMap);
  ln = ''+marker._latlng.lng
  lt = ''+marker._latlng.lat
  ln = ln.slice(0,11);
  lt = lt.slice(0,11);
  lng.setAttribute('value',ln);
  lat.setAttribute('value',lt);
})


</script>

@endsection --}}
