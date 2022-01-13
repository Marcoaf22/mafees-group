@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Productos</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('producto.index') }}">Admininstrar Inventario</a></li>
                <li class="breadcrumb-item active">producto</li>
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
                    <h4 class="card-title">Lista de Productos&nbsp&nbsp</h4>
                    @can('Crear producto')
                    <a href="{{ route('producto.create') }}" id='crear-cargo'
                        class="btn btn-outline-success btn-sm">Agregar producto</a>
                    @endcan
                </div>
                <div class="card-body">
                    <table id="lista" class="table dt-responsive table-bordered data-table">
                        <thead>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Presentacion</th>
                            {{-- <th>Nombre Comercial</th> --}}
                            {{-- <th>Formato</th> --}}
                            <th>Stock</th>
                            <th>Codigo</th>
                            {{-- <th>Fecha Vencimiento</th> --}}
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th>Imagen</th>
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
        fixedHeader: {
              header: true,
          },
        // dom: 'Bfrtip',
        //   buttons: [
        //       'colvis'
        //   ],
        "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
        autoWidth: false,
        ajax: "{{ route('producto.index') }}",
        columns: [
                    {data: 'id', name: 'id'},
                    {data: 'nombre', name: 'nombre'},
                    {data: 'presentacion', name: 'presentacion'},
                    {data: 'numero_unidades', name: 'numero_unidades'},
                    {data: 'codigo', name: 'codigo'},
                    {data: 'categoria', name: 'categoria'},
                    {data: 'precio', name: 'precio'},
                    {data: 'img', name: 'img',searchable: false, orderable:false},
                    {data: 'accion', name: 'accion',searchable: false, orderable:false},
                    ]
        })
    }

$('body').on('click', '#delete-producto', function () {
  var user_id = $(this).data("id");
  var token = $("meta[name='csrf-token']").attr("content");
  Swal.fire({
    title: '¿Esta seguro de eliminar al producto?',
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
        url: "http://farmacia.test/producto/"+user_id,
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
          'El producto ha sido borrado correctamente',
          'success'
        )
      }
    })
});
listarTabla();
</script>
@endsection
