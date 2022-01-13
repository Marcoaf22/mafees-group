@extends('adminlte::page')
@section('title','compras')

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Compras</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('compra.index') }}">Admininstrar Compras</a></li>
        <li class="breadcrumb-item active">Compras</li>
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
            <h4 class="card-title">Lista de compras&nbsp&nbsp</h4>
            @can('Crear cliente')
            <a href="{{ route('compra.create') }}" id='crear-cargo' class="btn btn-outline-success btn-sm">Agregar compra</a>
            @endcan
				</div>
            @include('flash::message')
				<div class="card-body">
					<table id="lista" class="table dt-responsive table-bordered data-table" >
                        <thead>
                            <th >Id</th>
                            <th >Fecha</th>
                            <th >Proveedor</th>
                            <th >Usuario</th>
                            <th >Monto Total</th>
                            <th >Estado</th>
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
        ajax: "{{ route('compra.index') }}",
        columns: [
                    {data: 'id', name: 'id'},
                    {data: 'fecha', name: 'fecha'},
                    {data: 'proveedor_id', name: 'proveedor_id'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'total_ingreso', name: 'total_ingreso'},
                    {data: 'estado', name: 'estado'},
                    {data: 'accion', name: 'accion',searchable: false, orderable:false},
                    ],
        "order": [[ 0, "desc" ]]
        }) 
    }

$('body').on('click', '#delete-compra', function () {
  var user_id = $(this).data("id");
  var token = $("meta[name='csrf-token']").attr("content");
  Swal.fire({
    title: '¿Esta seguro de anular la compra?',
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
        type: "PUT",
        url: "http://farmacia.test/compra/"+user_id,
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
          'La compra ha sido anulada correctamente',
          'success'
        )
      }
    })
});
listarTabla();
</script>
@endsection
