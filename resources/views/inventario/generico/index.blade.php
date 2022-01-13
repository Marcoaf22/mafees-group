@extends('adminlte::page')

@section('title','Productos')

@section('content_header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Medicamentos</h1> 
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('generico.index') }}">Admininstrar Inventario</a></li>
        <li class="breadcrumb-item active">generico</li>
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
            <h4 class="card-title">Lista de medicamentos&nbsp&nbsp</h4>
            @can('Crear generico')
            <a href="{{ route('generico.create') }}" id='crear-cargo' class="btn btn-outline-success btn-sm">Agregar generico</a>
            @endcan
				</div>
            @include('flash::message')
				<div class="card-body">
					<table id="lista" class="table dt-responsive table-bordered data-table" >
							<thead>
								<th >Id</th>
								<th >Nombre</th>
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
      console.log('marco');
      Swal.fire(
  '¡Guardado!','". session('message') ."',
  'success')
      </script>
    "?>
@endif

<script>
    function listarTabla(){
        table = $('#lista').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        // fixedHeader: {
        //       header: true,
        //   },
        // dom: 'Bfrtip',
        //   buttons: [
        //       'colvis'
        //   ],
        "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
        autoWidth: false,
        ajax: "{{ route('generico.index') }}",
        columns: [
                    {data: 'id', name: 'id'},
                    {data: 'nombre', name: 'nombre'},
                    {data: 'accion', name: 'accion',searchable: false, orderable:false},
                    ]
        })
    }

$('body').on('click', '#delete-generico', function () {
  var user_id = $(this).data("id");
  var token = $("meta[name='csrf-token']").attr("content");
  Swal.fire({
    title: '¿Esta seguro de eliminar el generico?',
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
        $.ajax({
        type: "DELETE",
        url: "http://farmacia.test/generico/"+user_id,
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
          'El nombre ha sido borrado',
          'success'
        )
      }
    })
});
listarTabla();
</script>
@endsection