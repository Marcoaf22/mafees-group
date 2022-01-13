@extends('adminlte::page')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Tanque IBC</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                {{-- <li class="breadcrumb-item"><a href="{{ route('empleado.index') }}">Admininstrar Veta</a></li> --}}
                <li class="breadcrumb-item active">Tanques</li>
            </ol>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
@endsection



@section('content')
<div class="container-fluid" id="Contenido">
    <div class="row" id="tabla">
        <div class="col-12">
            <div class="card">
                <div class="card-header row align-items-center">
                    <h4 class="card-title">Informacion del Tanque&nbsp
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Liberar
                        </button>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="form-group col-6">
                                    {!! Form::label(null , 'Capacidad: ', ['class' => '']) !!}
                                    <p>{{ $tanque->capacidad }} Ltrs.</p>
                                </div>
                                <div class="form-group col-6">
                                    {!! Form::label(null , 'Altura: ', ['class' => '']) !!}
                                    <p>{{ $tanque->alto }} cm.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    {!! Form::label(null , 'Numero de Usos: ', ['class' => '']) !!}
                                    <p>{{ $tanque->numero_uso }} veces</p>
                                </div>
                                <div class="form-group col-6">
                                    {!! Form::label(null , 'Codigo de Tanque: ', ['class' => '']) !!}
                                    <p>Tanque #{{ $tanque->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    {!! Form::label(null , 'Ultimo Almacen: ', ['class' => '']) !!}
                                    <p>{{ $tanque->almacen->nombre }}</p>
                                </div>
                                <div class="form-group col-6">
                                    {!! Form::label(null , 'Estado: ', ['class' => '']) !!}
                                    @php
                                    $class = 'badge badge-';
                                    if($tanque->estado->id == 1 )
                                    $class = $class . 'danger';
                                    if($tanque->estado->id == 2 )
                                    $class = $class . 'success';
                                    @endphp
                                    <p><span class='{{ $class }}'">
                                            {{ $tanque->estado->nombre }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class=" row">
                                            <div class="form-group col-6">
                                                {!! Form::label(null , 'Obaservaciones: ', ['class' => '']) !!}
                                                <p>{{ $tanque->observacion }}</p>
                                            </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 w-100">
                                    <div class="card-header">Ubicacion</div>
                                    <div class="card-body">
                                        <div id="myMap" class="h-100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TARJETA DE VISITAS --}}
        <div class="card">
            <div class="card-header row align-items-center">
                <h4 class="card-title">Visitas Asignadas &nbsp&nbsp</h4>
                <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal"
                    data-target="#exampleModal">
                    Asignar visita
                </button>
            </div>
            <div class="card-body">
                @php
                $hola = 1;
                @endphp
                @foreach ($preparaciones as $preparacion)
                <table class="table">
                    <h3>Uso # {{ $hola }}</h3>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Producto </th>
                            <th scope="col">Presentacion</th>
                            <th scope="col">cantidad</th>
                            {{-- <th scope="col">Estado</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($preparacion->detalles as $detalle)
                        <tr>
                            <th>{{ $detalle->id }}</th>
                            <th>{{ $detalle->p_nombre }}</th>
                            <th>{{ $detalle->p_presentacion }}</th>
                            <th>{{ $detalle->cantidad }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @php
                $hola = $hola +1;
                @endphp

                @endforeach
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Liberar Tanque IBC</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('tanque.actualizar') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            {!! Form::hidden('id', $tanque->id, ['class','']) !!}
                            {!! Form::label(null , 'Estado: ', ['class' => '']) !!}
                            <select name="estado_id" id="" class="form-control">
                                <option value="1">Sin asignar</option>
                                <option value="2">Asignado</option>
                                <option value="3">Mantenimientor</option>
                                <option value="4">Desechado</option>
                            </select>
                        </div>
                        <div class="row">
                            {!! Form::label(null , 'Almacen: ', ['class' => '']) !!}
                            <select name="almacen_id" id="" class="form-control">
                                <option value="1">Almacen 1</option>
                                <option value="2">Almacen 2</option>
                                <option value="3">Almacen 3</option>
                                <option value="4">Almacen 4</option>
                                <option value="5">Almacen 5</option>
                                <option value="6">Almacen 6</option>
                            </select>
                        </div>
                        <div class="row">
                            {!! Form::label(null , 'Observacion: ', ['class' => '']) !!}
                            {!! Form::text('observacion', '', ['class' => 'form-control']) !!}
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Visita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['url' => route('tanque.index') ]) !!}
                <div class="modal-body">
                    {{ Form::token() }}
                    {!! Form::hidden('orden_id', $tanque->id) !!}
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                {!! Form::label('fecha_hora', 'fecha de la visita') !!}
                                {!! Form::datetimeLocal('fecha_hora_visita', null,['class' =>'form-control','required'
                                =>
                                'true'] ) !!}
                            </div>
                            <div class="form-group nimodo">
                                {!! Form::label('empleado_id', 'Empleado', ['class' => 'd-block',]) !!}
                                {!! Form::select('empleado_id', $tanque, 10 ,['class' => 'form-control
                                select2','required' => 'true'] ) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {!! Form::submit('Guardar',['class' => 'btn btn-primary'] ) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    @endsection



    @section('js')

    @if(session('message'))
    <?php echo "
    <script>
      Swal.fire(
        '¡Guardado!','". session('message') ."','success')
      </script>
    "?>
    @endif


    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <script>
        console.log('hola');
    var url = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    let myMap = L.map('myMap').setView([{{ $tanque->latitud }},{{ $tanque->longitud }}],13);

    L.tileLayer(url,{
      // zoom:200,
      maxZoom:100,
    }).addTo(myMap);
    let marker= L.marker([{{ $tanque->latitud }},{{ $tanque->longitud }}]).addTo(myMap)

    marker.bindPopup("Tanque #{{ $tanque->id }}.").openPopup();

// $(document).ready(function() {
//     $('#empleado_id').select2();
// });

function listarTabla(){
  table = $('#lista').DataTable({
  processing: true,
  serverSide: true,
  responsive: true,
  "language": {
          "url": "http://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
      },
  autoWidth: false,
  ajax: "{{ route('tanque.index') }}",
  columns: [
              {data: 'id', name: 'id'},
              {data: 'cliente_id', name: 'nombre'},
              {data: 'servicio_id', name: 'apellido'},
              {data: 'comentario', name: 'telefono'},
              {data: 'estado_id', name: 'telefono', orderable:true},
              {data: 'accion', name: 'accion',searchable: false, orderable:false},
              ]
  })
}

$('body').on('click', '#delete-empleado', function () {
  var user_id = $(this).data("id");
  var token = $("meta[name='csrf-token']").attr("content");
  Swal.fire({
    title: '¿Esta seguro de eliminar al empleado?',
    text: "Esta accion no se puede revertir",
    icon: 'warning',
    showCancelButton: true,
    background: '#fff',
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#888',
    confirmButtonText: 'Si, borrarlo',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
      if (result.isConfirmed) {
        console.log(user_id);
        console.log(token);
        $.ajax({
        type: "DELETE",
        url: "http://controlAsistencia.test/empleado/"+user_id,
        data: {
        "id": user_id,
        "_token": token,
        },
        success: function (data) {
          table.ajax.reload();
        },
        error: function (data) {
          console.log('Error:', data);
        }
        });
        Swal.fire(
          'Eliminado',
          'El empleado ha sido borrado correctamente',
          'success'
        )
      }
    })
});

listarTabla();
    </script>
    @endsection
