@extends('adminlte::page')

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Productos
      </h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('producto.index') }}">Admininstrar Inventario</a></li>
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
            <h4 class="card-title">Datos del producto</h4>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'producto.store', 'enctype' => 'multipart/form-data']) !!}

              <div class="row">
                <div class="form-group col-lg-3">
                  {!! Form::label('generico_id', 'Nombre Generico:') !!}
                  {!! Form::select('generico_id', $genericos,isset($user) ? $user->roles()->pluck('id'):'', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-lg-3">
                    {!! Form::label('nombre', 'Nombre:') !!}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-3">
                    {!! Form::label('dosis', 'Dosis:') !!}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                    {!! Form::text('dosis', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group col-lg-3">
                  {!! Form::label('formato_id', 'Formato:') !!}
                  {!! Form::select('formato_id', $formatos,isset($user) ? $user->roles()->pluck('id'):'', ['class' => 'form-control']) !!}
              </div>
            </div>

            <div class="row">
              <div class="form-group col-lg-3">
                  {!! Form::label('precio ', 'Precio:') !!}
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="">Bs.</i></span>
                    </div>
                  {!! Form::text('precio', null, ['class' => 'form-control']) !!}
                  </div>
              </div>
              <div class="form-group col-lg-3">
                  {!! Form::label('stock ', 'Stock:') !!}
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                    </div>
                  {!! Form::text('stock', null, ['class' => 'form-control']) !!}
                </div>
              </div>
              <div class="form-group col-lg-3">
                  {!! Form::label('stock_min', 'Stock Minimo:') !!}
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                      </div>
                  {!! Form::text('stock_min', null, ['class' => 'form-control']) !!}
                  </div>
              </div>
              <div class="form-group col-lg-3">
                {!! Form::label('fecha_ven', 'Fecha de Vencimiento:') !!}
                {!! Form::date('fecha_ven', null, ['class' => 'form-control']) !!}
              </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-4">
                  {!! Form::label('nro_lote', 'Numero de Lote:') !!}
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                    </div>
                    {!! Form::text('nro_lote', null, ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="form-group col-lg-4">
                    {!! Form::label('laboratorio_id', 'Laboratorio:') !!}
                    {!! Form::select('laboratorio_id', $laboratorios,isset($user) ? $user->roles()->pluck('id'):'', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-lg-4">
                    {!! Form::label('categoria_id', 'Categoria:') !!}
                    {!! Form::select('categoria_id', $categorias,isset($user) ? $user->roles()->pluck('id'):'', ['class' => 'form-control']) !!}
                </div>

            </div>

            <div class="row">
              <div class="form-group col-lg-12">
                {!! Form::label('observacion', 'Observacion:') !!}
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                    </div>
                {!! Form::text('observacion', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            </div>

            <div class="row">
              <div class="form-group col-sm-6">
                <label for="exampleInputFile">Imagen</label>
                <div class="input-group">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="img">
                    <label class="custom-file-label" for="exampleInputFile">Seleccionar una imagen</label>
                    </div>
                        <div class="input-group-append">
                    </div>
                </div>
            </div>
            <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('producto.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
