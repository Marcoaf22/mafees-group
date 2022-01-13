@extends('adminlte::page')



@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
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
                    {!! Form::open(['route' => 'orden.store', 'enctype' => 'multipart/form-data']) !!}

                    <div class="row">
                        <div class="form-group col-lg-4">
                            {!! Form::label('Nombre', 'Cliente:') !!}

                            <select name="cliente_id" id="" class="form-control">
                                @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }} - {{ $cliente->tipo }}
                                </option>
                                @endforeach
                            </select>

                            {{--
                            {!! Form::select('cliente_id', $clientes,isset($user) ? $user->roles()->pluck('id'):'',
                            ['class' => 'form-control']) !!} --}}
                        </div>
                        <div class="form-group col-lg-4">
                            {!! Form::label('duracion', 'Dias de duracion:') !!}
                            <div class="input-group mb-3">
                                {{-- <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                </div> --}}
                                {!! Form::text('duracion', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            {!! Form::label('servicio_id', 'Servicio:') !!}
                            <select name="servicio_id" id="" class="form-control">
                                @foreach ($servicios as $servicio)
                                <option value="{{ $servicio->id }}">{{ $servicio->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group col-lg-3">
                            {!! Form::label('formato_id', 'Formato:') !!}
                            {!! Form::select('formato_id', $formatos,isset($user) ? $user->roles()->pluck('id'):'',
                            ['class' => 'form-control']) !!}
                        </div> --}}
                    </div>


                    {!! Form::hidden('latitud', '',['id' => 'latitud']) !!}
                    {!! Form::hidden('longitud', '', ['id' => 'longitud']) !!}
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
                    <div class="row">
                        <div class="col-12">
                            <label for="">Indique la ubicacion</label>
                        </div>
                        <div class="col-2"></div>
                        <div id="myMap" class="col-8" style="height:500px; width:700px"></div>
                        <div class="col-2"></div>
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


@section('js')

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
<script>
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
