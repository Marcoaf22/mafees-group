<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <title>Document</title>
</head>

<body class="bg-secondary">
    <div class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a href="https://bootstrap.jumpseller.com" title="Bootstrap" class="navbar-brand">System ABC
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarContainer" aria-controls="navbarContainer" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarContainer">
                    <form id="search_mini_form" class="d-lg-none d-md-block" method="get" action="/search">
                        <div class="input-group mb-3">
                            <input type="text" value="" name="q" class="form-control form-control-sm"
                                onfocus="javascript:this.value=''" placeholder="Search for products">
                            <button type="submit" class="btn btn-outline-secondary"><i
                                    class="fas fa-search"></i></button>
                        </div>
                        <input type="hidden" value="Rn89RgxyagOnMvCFpKvNxgIotru8Z31Hh8yXWkxe4+o="
                            name="authenticity_token">
                    </form>
                    <ul id="navbarContainerMobile" class="navbar-nav d-lg-none">
                        <li class="nav-item  ">
                            <a href="/" title="Inicio" class="level-1 trsn nav-link">Inicio</a>
                        </li>
                        <li class="nav-item dropdown ">
                            <a href="/techno" title="Techno" class="dropdown-toggle level-1 trsn nav-link"
                                data-toggle="dropdown">Techno</a>
                            <ul class="dropdown-menu multi-level">
                                <li class="nav-item dropdown ">
                                    <a href="/techno" title="Techno" class="dropdown-toggle level-1 trsn nav-link"
                                        data-toggle="dropdown">Techno</a>
                                    <ul class="dropdown-menu multi-level">
                                        <li class="nav-item  ">
                                            <a href="/techno" title="Techno" class="level-1 trsn nav-link">Techno</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="/about-us" title="About Us" class="level-1 trsn nav-link">About Us</a>
                        </li>
                        <li class="nav-item  ">
                            <a href="/blog" title="Blog" class="level-1 trsn nav-link">Blog</a>
                        </li>
                        <li class="nav-item  ">
                            <a href="/contact" title="Contact" class="level-1 trsn nav-link">Contact</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right nav-top">
                        {{-- <li> --}}
                            {{-- <a href="{{ route('login') }}" id="login-link" class="trsn nav-link"
                                title="Login toBootstrap"> --}}
                    </ul>
                    @if (Route::has('login'))
                    @auth
                    <li style="list-style: none;">
                        <a href="{{ url('/') }}" class="trsn nav-link">Home</a>
                    </li>
                    <li style="list-style: none;">
                        <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}&nbsp;
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @if(auth()->user()->can('administracion'))
                    <li style="list-style: none;">
                        <a href="{{ url('/admin') }}" class="trsn nav-link">Administracion</a>
                    </li>
                    @endif
                    @else
                    <li style="list-style: none;">
                        <a href="{{ route('login') }}" class="trsn nav-link">Login</a>
                    </li>
                    @if (Route::has('register'))
                    <li style="list-style: none;">
                        <a href="{{ route('register') }}" class="trsn nav-link">Register</a>
                    </li>
                    @endif
                    @endauth
                    @endif
                    </ul>
                    <form id="search_mini_form" class="navbar-form float-right form-inline d-none d-lg-flex"
                        method="get" action="/search">
                        <input type="text" value="" name="q" class="form-control form-control-sm"
                            onfocus="javascript:this.value=''" placeholder="Buscar">
                        <button type="submit" class="btn btn-secondary btn-sm"><i class="fas fa-search"></i></button>
                        <input type="hidden" value="Rn89RgxyagOnMvCFpKvNxgIotru8Z31Hh8yXWkxe4+o="
                            name="authenticity_token">
                    </form>
                    <ul class="social list-inline d-lg-none text-center">
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <hr>
    <hr>
    <hr>

    <div class="container" id="Contenido">
        <div class="row" id="tabla">
            <div class="col-12">
                <div class="card text-black-50">
                    <div class="card-header ">
                        <h4 class="card-title">Rellene el formulario</h4>
                    </div>
                    <div class="card-body text-black-50">
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


    <script src="/js/app.js"></script>
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
</body>

</html>

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
