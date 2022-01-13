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
          <li class="breadcrumb-item"><a href="#">Admininstrar Inventario</a></li>
          <li class="breadcrumb-item">Laboratorio</li>
          <li class="breadcrumb-item active">Editar</li>
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
                    <h4 class="card-title">Editar Laboratorio</h4>
                </div>
                <div class="card-body">
                  <form action=" {{ route('laboratorio.update', $laboratorio->id) }}" method="POST">
                      @csrf
                      @method('PUT')
                      {{-- <input name="_method" type="hidden" value="PATCH"> --}}
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label for="nombre">Nombre:</label>
                              <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $laboratorio->nombre }}">
                      </div>
                      <div class="form-group col-sm-12">
                          <button type="submit" class="btn btn-primary">Actualizar</button>
                          <a href="{{ route('laboratorio.index') }}"  class="btn btn-default">Cancelar</a>
                      </div>
                  </form>
                </div>
            </div>
        </div>
	  </div>
</div>
@endsection