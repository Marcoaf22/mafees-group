{{-- @extends('layouts.app') --}}
@extends('adminlte::page')

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Laboratorio</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('laboratorio.index') }}">Admininstrar Personal</a></li>
        <li class="breadcrumb-item">Laboratorio</li>
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
                    <h4 class="card-title">Informacion del Laboratorio</h4>
                </div>
                <div class="card-body">
                    {{-- <div class="row" style="padding-left: 20px"> --}}
                    <!-- Nombre Field -->
                    <div class="form-group">
                      {!! Form::label('nombre', 'Nombre:') !!}
                      <p>{{ $laboratorio->nombre }}</p>
                    </div>

                    <!-- Created At Field -->
                    <div class="form-group">
                      {!! Form::label('Creado en:', 'Creado en:') !!}
                      <p>{{ $laboratorio->created_at }}</p>
                    </div>

                    <!-- Updated At Field -->
                    <div class="form-group">
                      {!! Form::label('Ultima Modificado:', 'Ultima modificacion:') !!}
                      <p>{{ $laboratorio->updated_at }}</p>
                    </div>

                    <div class="form-group col-sm-12">
                      <a class="btn btn-default" href="{{ route('laboratorio.index') }}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
