@extends('adminlte::page')

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Clientes</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('cliente.index') }}">Admininstrar Veta</a></li>
        <li class="breadcrumb-item">Cliente</li>
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
                <div class="form-group col-sm-6">
                    {!! Form::label('ci', 'Ci:') !!}
                    <p>{{ $cliente->ci }}</p>
                </div>
                <!-- Nombre Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('nombre', 'Nombre:') !!}
                    <p>{{ $cliente->nombre }}</p>
                </div>
                </div>

                <div class="row">
                <!-- Apellido Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('apellido', 'Apellido:') !!}
                    <p>{{ $cliente->apellido }}</p>
                </div>
                <!-- Telefono Field -->
                <div class="form-group">
                    {!! Form::label('telefono', 'Telefono:') !!}
                    <p>{{ $cliente->telefono }}</p>
                </div>
                </div>

                <div class="row">
                    <!-- Correo Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('correo', 'Correo:') !!}
                    <p>{{ $cliente->correo }}</p>
                </div>
                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('Creado', 'Creado:') !!}
                    <p>{{ $cliente->created_at }}</p>
                </div>
                </div>

                <div class="row">
                    <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('Ultima modificacion:', 'Ultima modificacion:') !!}
                    <p>{{ $cliente->updated_at }}</p>
                </div>
                </div>

                <div class="form-group col-sm-12">
                    <a class="btn btn-default" href="{{ route('cliente.index') }}" class="btn btn-default">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
