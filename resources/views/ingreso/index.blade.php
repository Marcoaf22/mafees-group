@extends('adminlte::page')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Registro de ingreso</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                {{-- <li class="breadcrumb-item"><a href="{{ route('empleado.index') }}">Admininstrar Veta</a></li> --}}
                <li class="breadcrumb-item active">Ingreso de productos</li>
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
                <div class="card-header row align-items-center">
                    <h4 class="card-title">Lista de Ingreso&nbsp</h4>
                    {{-- @can('Crear empleado') --}}
                    <a href="{{ route('ingreso.registrar')}}" id='crear-cargo'
                        class="btn btn-outline-success btn-sm">Agregar Ingreso</a>
                    {{-- @endcan --}}
                </div>
                <div class="card-body">
                    <table id="lista" class="table dt-responsive table-bordered data-table">
                        <thead>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Servicio</th>
                            {{-- <th>Comentario</th> --}}
                            <th>Estado</th>
                            <th style="width: 10%">Accion</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
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


<script>
    function listarTabla(){
    table = $('#lista').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    "language": {
            "url": "http://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
    autoWidth: false,
    ajax: "{{ route('ingreso.index') }}",
    columns: [
      {data: 'id', name: 'id'},
      {data: 'cliente_id', name: 'cliente_id'},
      {data: 'proveedor_id', name: 'proveedor_id'},
      {data: 'total', name: 'total'},
      {data: 'estado', name: 'estado'},
      {data: 'accion', name: 'accion',searchable: false, orderable:false},
      ],
    "order": [[ 0, 'desc' ]]
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
