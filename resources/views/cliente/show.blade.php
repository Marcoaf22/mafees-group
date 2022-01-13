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
        <li class="breadcrumb-item"><a href="{{ route('empleado.index') }}">Admininstrar Personal</a></li>
        <li class="breadcrumb-item">empleado</li>
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
                    <p>{{ $empleado->ci }}</p>
                </div>
                <!-- Nombre Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('nombre', 'Nombre:') !!}
                    <p>{{ $empleado->nombre }}</p>
                </div>
                </div>

                <div class="row">
                <!-- Apellido Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('apellido', 'Apellido:') !!}
                    <p>{{ $empleado->apellido }}</p>
                </div>
                <!-- Telefono Field -->
                <div class="form-group">
                    {!! Form::label('telefono', 'Telefono:') !!}
                    <p>{{ $empleado->telefono }}</p>
                </div>
                </div>

                <div class="row">
                    <!-- Correo Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('correo', 'Correo:') !!}
                    <p>{{ $empleado->correo }}</p>
                </div>
                <!-- Created At Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('Creado', 'Creado:') !!}
                    <p>{{ $empleado->created_at }}</p>
                </div>
                </div>

                <div class="row">
                    <!-- Updated At Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('Ultima modificacion:', 'Ultima modificacion:') !!}
                    <p>{{ $empleado->updated_at }}</p>
                </div>
                </div>

                <div class="form-group col-sm-12">
                    <a class="btn btn-default" href="{{ route('empleado.index') }}" class="btn btn-default">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
