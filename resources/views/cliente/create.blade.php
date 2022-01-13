@extends('adminlte::page')

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Empleados
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
            <h4 class="card-title">Datos del empleado</h4>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'empleado.store', 'enctype' => 'multipart/form-data']) !!}

            <div class="row">
              <div class="form-group col-lg-4">
                  {!! Form::label('nombre', 'Nombre:') !!}
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                      </div>
                  {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                  </div>
              </div>
              <div class="form-group col-lg-4">
                  {!! Form::label('apellido', 'Apellido:') !!}
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-address-card"></i></i></span>
                      </div>
                  {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
                  </div>
              </div>
              <div class="form-group col-lg-4">
                <div class="form-group">
                  {!! Form::label('ci', 'Carnet de Identidad:') !!}
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> <strong>C.I</strong> </i></span>
                    </div>
                    {!! Form::text('ci', null, ['class' => 'form-control']) !!}
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-lg-4">
                  {!! Form::label('telefono', 'Telefono:') !!}
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                  {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                  </div>
              </div>
              <div class="form-group col-lg-4">
                {!! Form::label('rol', 'Cargo:') !!}
                {!! Form::select('cargo_id', $cargos,isset($user) ? $user->roles()->pluck('id'):[], ['class' => 'form-control']) !!}
              </div>
              <div class="form-group col-lg-4">
                {!! Form::label('direccion', 'Direccion:') !!}
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                  </div>
                  {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-lg-4">
                  {!! Form::label('correo', 'Correo:') !!}
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                      </div>
                  {!! Form::text('email', null, ['class' => 'form-control']) !!}
                  </div>
              </div>
              <div class="form-group col-lg-4">
                  {!! Form::label('contraseña', 'Contraseña:') !!}
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-key"></i></span>
                      </div>
                      {!! Form::password('contraseña', ['class' => 'form-control']) !!}
                  </div>
              </div>
            </div>


            <div class="row">
              <div class="form-group col-sm-6">
                <label for="exampleInputFile">Imagen</label>
                <div class="input-group">
                    <div class="custom-file">
                    {!! Form::file('file', ['class' => 'custom-file-input', 'enctype' => 'multipart/form-data','accept' => 'image/*']) !!}
                    {!! Form::label('file', 'Seleccionar una imagen', ['class' =>'custom-file-label']) !!}
                    $@error('file')
                        <small class='text danger'>{{ $message }}</small>
                    @enderror
                  </div>
                        <div class="input-group-append">
                    </div>
                </div>
              </div>
            <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('empleado.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
