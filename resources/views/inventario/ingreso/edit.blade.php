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
                <h4 class="card-title">Editar Cargo</h4>
                </div>
                <div class="card-body">
                    {!! Form::model($cliente, ['route' => ['cliente.update', $cliente->id], 'method' => 'patch']) !!}

                        {{-- @include('clientes.fields') --}}
                    <div class="row">
                        <!-- Ci Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('ci', 'Ci:') !!}
                        {!! Form::text('ci', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Nombre Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('nombre', 'Nombre:') !!}
                        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                    </div>
                    </div>

                    <!-- Apellido Field -->
                    <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('apellido', 'Apellido:') !!}
                        {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Telefono Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('telefono', 'Telefono:') !!}
                        {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                    </div>
                    </div>


                    <div class="row">
                    <!-- Correo Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('correo', 'Correo:') !!}
                        {!! Form::text('correo', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        <a href="{{ route('cliente.index') }}" class="btn btn-default">Cancelar</a>
                    </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection