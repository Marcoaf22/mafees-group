@extends('adminlte::page')

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Personal
      </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('producto.index') }}">Admininstrar Personal</a></li>
        <li class="breadcrumb-item">producto</li>
        <li class="breadcrumb-item active">Informacion</li>
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
                    <h4 class="card-title">Datos del Cargo</h4>
                </div>
                <div class="card-body">

                <div class="row">
                    <!-- Ci Field -->
                <div class="form-group col-sm-3">
                    {!! Form::label('ci', 'Nombre Generico:') !!}
                    <p>{{ $producto->generico->nombre }}</p>
                </div>
                <!-- Nombre Field -->
                <div class="form-group col-sm-3">
                    {!! Form::label('nombre', 'Nombre Comercial:') !!}
                    <p>{{ $producto->nombre }}</p>
                </div>
                
                <div class="form-group col-sm-3">
                    {!! Form::label('nombre', 'Formato:') !!}
                    <p>{{ $producto->formato->nombre }}</p>
                </div>

                <div class="form-group col-sm-3">
                    {!! Form::label('nombre', 'Dosis:') !!}
                    <p>{{ $producto->dosis }}</p>
                </div>
                </div>

                <div class="row">
                <!-- Apellido Field -->
                <div class="form-group col-sm-3">
                    {!! Form::label('apellido', 'Stock:') !!}
                    <p>{{ $producto->stock }}</p>
                </div>
                <!-- Telefono Field -->
                <div class="form-group col-sm-3">
                    {!! Form::label('telefono', 'Stock Minimo:') !!}
                    <p>{{ $producto->stock_min }}</p>
                </div>

                <div class="form-group col-sm-3">
                    {!! Form::label('telefono', 'Precio:') !!}
                    <p>{{ $producto->stock_min }} Bs.</p>
                </div>

                <div class="form-group col-sm-3">
                    {!! Form::label('telefono', 'Fecha Vencimiento:') !!}
                    <p>{{ $producto->fecha_ven }}</p>
                </div>
                </div>

                <div class="row">
                    <!-- Correo Field -->
                <div class="form-group col-sm-3">
                    {!! Form::label('correo', 'Categoria:') !!}
                    <p>{{ $producto->categoria->nombre }}</p>
                </div>
                <!-- Created At Field -->
                <div class="form-group col-sm-3">
                    {!! Form::label('Creado', 'Laboratorio:') !!}
                    <p>{{ $producto->Laboratorio->nombre }}</p>
                </div>
                <!-- Created At Field -->
                <div class="form-group col-sm-3">
                    {!! Form::label('Creado', 'Creado en:') !!}
                    <p>{{ $producto->created_at }}</p>
                </div>
                <!-- Created At Field -->
                <div class="form-group col-sm-3">
                    {!! Form::label('Creado', 'Ultima modificacion:') !!}
                    <p>{{ $producto->update_at }}</p>
                </div>
                </div>

                <div class="row">
                    <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('Ultima modificacion:', 'Observaciones:') !!}
                    <p>{{ $producto->observacion }}</p>
                </div>
                </div>

                <div class="row">
                <div class="form-group col-sm-12">
                    <a class="btn btn-default" href="{{ route('producto.index') }}" class="btn btn-default">Volver</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
