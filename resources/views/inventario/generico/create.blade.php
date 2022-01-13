@extends('adminlte::page')

@section('title','Productos')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Formato</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admininstrar Personal</a></li>
          <li class="breadcrumb-item">Formato</li>
          <li class="breadcrumb-item active">Crear</li>
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
                    <form action=" {{ route('formato.store') }}" method="POST">
                        @csrf
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" >
                                {!! $errors->first('nombre', '<small class="bg-danger">:message</small>') !!}
                        </div>
                        <div class="form-group col-sm-12">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('formato.index') }}"  class="btn btn-default">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
