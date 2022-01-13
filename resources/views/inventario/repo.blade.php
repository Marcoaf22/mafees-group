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
            <h4 class="card-title">Lista de Productos a Reponer</h4>
				</div>
            @include('flash::message')
				<div class="card-body">
					<table id="lista" class="table dt-responsive table-bordered data-table" >
                        <thead>
                            <th >Id</th>
                            <th >Nombre Generico</th>
                            <th >Nombre Comercial</th>
                            <th >Formato</th>
                            <th >Dosis</th>
                            <th >Stock</th>
                            <th >Stock Min</th>
                            <th >Fecha Vencimiento</th>
                            <th >Categoria</th>
                            <th >Codigo</th>
                            <th >Estado</th>
                            <th >Imagen</th>
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
        ajax: "{{ route('repo.index') }}",
        columns: [
                    {data: 'id', name: 'id'},
                    {data: 'generico', name: 'generico'},
                    {data: 'nombre', name: 'nombre'},
                    {data: 'formato', name: 'formato'},
                    {data: 'dosis', name: 'dosis'},
                    {data: 'stock', name: 'stock'},
                    {data: 'stock_min', name: 'stock_min'},
                    {data: 'fecha_ven', name: 'fecha_ven'},
                    {data: 'categoria', name: 'categoria'},
                    {data: 'nro_lote', name: 'nro_lote'},
                    {data: 'estado', name: 'estado'},
                    {data: 'img', name: 'img',searchable: false, orderable:false},
                    ]
        })
    }

listarTabla();
</script>
@endsection
