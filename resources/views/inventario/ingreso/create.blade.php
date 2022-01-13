@extends('adminlte::page')
@section('title','Compras')

@section('css')
<style>
    .card-head {
        background: #1488CC;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #2B32B2, #1488CC);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #2B32B2, #1488CC);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: white;
    }

    .card-heaad {
        background: #1488CC;
        /* fallback for old browsers */
        background: linear-gradient(to right, #5bb3ce, #1179b6);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: white;
    }
</style>
@endsection

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Compras</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('venta.index') }}">Admininstrar Compras</a></li>
                <li class="breadcrumb-item">Compras</li>
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
                    <h4 class="card-title">Registra Compra</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'compra.store','id' => 'formulario']) !!}

                    <div class="row">
                        <div class="form-group col-sm-6">
                            {!! Form::label('proveedor', 'Proveedor:') !!}
                            <select class="form-control" name="proveedor_id" id="sclient">
                                @foreach ($proveedores as $proveedor)
                                <option value={{ $proveedor->id }}>{{$proveedor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('fecha', 'Fecha:') !!}
                            <input name="fecha" type="datetime-local" class="form-control" id='fecha' required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-4">
                            {!! Form::label('codigo', 'Codigo:') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                {!! Form::text('codigo', null, ['class' => 'form-control','id' => 'buscarCod']) !!}
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="productos">Lista de Productos</label>
                            <button type="button" id="productos" class="btn btn-primary form-control"
                                data-toggle="modal" data-target=".bd-example-modal-xl"><i
                                    class="fas fa-plus-square"></i>Agregar Producto</button>
                        </div>

                        <div class="form-group col-lg-4">
                            {!! Form::label('impuesto', 'Impuesto:') !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-percent"></i></span>
                                </div>
                                {!! Form::text('impuesto', '18', ['class' => 'form-control','id' => 'impuesto']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <div class="">
                                <table id="detalles" class="table table-bordered table-condensed table-hover">
                                    <thead class="card-heaad">
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Formato</th>
                                        <th>Dosis</th>
                                        <th>Unidades</th>
                                        <th>Precio de Compra</th>
                                        <th>Precio de Venta</th>
                                        <th>Subtotal</th>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Total Parcial</th>
                                            <th>
                                                <h5 id="total-p">Bs. 0.00</h5><input type="hidden" name="total-p"
                                                    id="total-p">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Total Descuento</th>
                                            <th>
                                                <h5 id="total-d">Bs. 0.00</h5><input type="hidden" name="total-d"
                                                    id="total-d">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Total Monto</th>
                                            <th>
                                                <h5 id="total_venta">Bs. 0.00</h5><input type="hidden"
                                                    name="total_ingreso" id="total_ingresoo">
                                            </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary','id' => 'btn-submit']) !!}
                        <a href="{{ route('venta.index') }}" class="btn btn-default">Cancelar</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header card-head">
                <h5 class="modal-title ">Productos Disponibles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <table id="lista" class="table dt-responsive table-bordered data-table" width='100%'>
                        <thead>
                            <th>Añadir</th>
                            <th>Nombre Generico</th>
                            <th>Nombre Comercial</th>
                            <th>Formato</th>
                            <th>Dosis</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Codigo</th>
                            <th style="width: 10%">img</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer" style="background: #ffffff">
                    <button id="submit" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script>
    console.log('empezado js');

function listarTabla(){
  var now = new Date();
  var minuto = ('0'+now.getMinutes()).slice(-2);
  var hora = ('0'+now.getHours()).slice(-2);
  var day = ("0" + now.getDate()).slice(-2);
  var month = ("0" + (now.getMonth() + 1)).slice(-2);
  var string = now.getFullYear()+"-"+(month)+"-"+(day)+'T'+hora+':'+minuto;
  console.log(string)
  $('#fecha').val(string);
  table = $('#lista').DataTable({
  processing: true,
  serverSide: true,
  responsive: true,
  "language": {
          "url": "http://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
      },
  autoWidth: false,
  ajax: "{{ route('compra.productos') }}",
  columns: [
              {data: 'accion', name: 'accion'},
              {data: 'generico_id', name: 'generico_id'},
              {data: 'nombre', name: 'nombre'},
              {data: 'formato_id', name: 'formato_id'},
              {data: 'dosis', name: 'dosis'},
              {data: 'stock', name: 'stock'},
              {data: 'precio', name: 'precio'},
              {data: 'nro_lote', name: 'nro_lote'},
              {data: 'img', name: 'img',searchable: false, orderable:false},
              ],
  })
}

var impuesto=18;
var cont=0;
var detalles=0;

function agregarDetalle(id,nombre,formato,dosis,precio,stock){
  var prods = Array.from(document.getElementsByName("id[]"));

  var bol = prods.find((elemento) => {
    return elemento.value == id
  })
  if (!bol){
    var cantidad=1;
    var descuento= document.getElementById('monto-t');
    if (id!=""){
      var subtotal=cantidad*precio;
      var fila='<tr class="filas" id="fila'+cont+'">'+
      '<td class="d-flex justify-content-center"><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')"><i class="fas fa-trash"></i></button></td>'+
      '<td><input type="hidden" name="id[]" value="'+id+'">'+nombre+'</td>'+
      '<td><p>'+formato+'</p></td>'+
      '<td><p>'+dosis+'</p></td>'+
      '<td><input type="number" id="cantidad-prd" class="form-control " name="cantidad[]" data-cantidad='+cont+' onchange="modificarSubototales();'+stock+','+cont+'); "id="cantidad[]" value="'+cantidad+'" aria-describedby="stock-error"></td>'+
      '<td><input class="form-control" type="number" name="precio[]" onchange=modificarSubototales() id="precio[]" value="0"></td>'+
      '<td><input class="form-control" type="number" name="precio_venta[]" onchange="modificarSubototales()" value="'+precio+'"></td>'+
      '<td><div class="class="d-flex justify-content-center""><span name="subtotal" id="subtotal'+cont+'">'+subtotal+'</span></div></td>'+
      '</tr>';
      cont++;
      detalles=detalles+1;
      $('#detalles').append(fila);
      modificarSubototales();
    }else{
      alert("Error al ingresar el detalle, revisar los datos del artículo");
    }
  }
}

$('#buscarCod').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
      event.preventDefault();
      $('[data-barcode='+ this.value +']').click();
      this.value= '';
    }
});

$(document).on('click', '#btn-submit', function(e) {
  e.preventDefault();
  modificarSubototales();
  var form = $('#formulario');
  Swal.fire({
    title: '¿Esta seguro de registrar la venta?',
    text: "Esta accion no se puede revertir",
    icon: 'warning',
    showCancelButton: true,
    background: '#fff',
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#888',
    confirmButtonText: 'Si',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
      if (result.isConfirmed) {
        console.log('es confirmado');
        console.log(form)
        form.submit();
      }else{
        e.preventDefault();
      }
    })
});

function comprobarStock(stock, id){
  var cant = document.getElementsByName("cantidad[]");
  var input = $("[data-cantidad="+id+"]");
  var cantidad = cant[id];
  if (cantidad.value>stock) {
    $("[data-cantidad="+id+"]").addClass('is-invalid');
    $('#btn-submit').attr("disabled", true);
  }else{
    $('#btn-submit').attr("disabled", false);
    $("[data-cantidad="+id+"]").removeClass('is-invalid');
  }
}

function modificarSubototales(){
  	var cant = document.getElementsByName("cantidad[]");
  	var stock = document.getElementsByName("stock[]");
    var prec = document.getElementsByName("precio[]");
    var desc = document.getElementsByName("precio_venta[]");
    var sub = document.getElementsByName("subtotal");

    for (var i = 0; i <cant.length; i++) {
			var inpC=cant[i];
			var inpP=prec[i];
			var inpD=desc[i];
			var inpS=sub[i];

    	inpS.value=(inpC.value * inpP.value);
    	document.getElementsByName("subtotal")[i].innerHTML = inpS.value;
    }
    calcularTotales();
}

function calcularTotales(){
  var sub = document.getElementsByName("subtotal");
  imp = $('#impuesto').val();
  imp = '0.'+imp;
  console.log(imp);
  var total = 0.0;
  for (var i = 0; i <sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;
  }
  console.log(total);
  var totalParcial = (total * imp).toFixed(2);
  console.log(totalParcial);
	$("#total-p").html("Bs. " + (total-totalParcial));
	$("#total-d").html("Bs. " + totalParcial);
	$("#total_venta").html("Bs. " + total);
  $("#total_ingresoo").val(total);
  evaluar();
}

function eliminarDetalle(indice){
		$("#fila" + indice).remove();
		calcularTotales();
		detalles=detalles-1;
		evaluar()
	}

function evaluar(){
  	if (detalles>0)
    {
      $("#btn-submit").attr("disabled", false);
    }
    else
    {
      $("#btn-submit").attr("disabled", true);
      cont=0;
    }
}

listarTabla();

$(document).ready(function() {
    $('#sclient').select2();
});
</script>
@endsection
