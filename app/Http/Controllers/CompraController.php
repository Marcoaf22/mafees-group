<?php

namespace App\Http\Controllers\Compra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Compras\Compra;
use App\Models\Compras\Proveedor;
use App\Models\Compras\Compra_Producto;
use App\Models\Inventario\Producto;
use App\Models\Usuario\User;
use App\Models\Usuario\Bitacora;
use DataTables;
use Yajra\DataTables\Contracts\DataTable;

class CompraController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Compra::All();
            return Datatables::of($data)
            ->editColumn('proveedor_id', function($row){
                return $row->proveedor->nombre;
            })
            ->editColumn('user_id', function($row){
                $emp = User::find($row->user_id);
                return $emp->empleado->nombre . ' ' . $emp->empleado->apellido;
            })
            ->editColumn('estado',function($row){
                return $row->estado == 1 ? '<div class="d-flex justify-content-center"><span style="font-size: 0.9rem"class="badge badge-success">&nbspRegistrado&nbsp</span></div>' : '<div class="d-flex justify-content-center"><span style="font-size: 0.9rem" class="badge badge-danger">&nbspAnulado&nbsp</span></div>';
            })
            ->addColumn('accion', function($row){
            $action = '<div class="d-flex justify-content-center flex-nowrap ">';
            if (auth()->user()->can('Ver venta')){
                $action = $action .'<a class="btn btn-info" href='.route('venta.show', $row->id) .' data-id='.$row->id.'><i class="far fa-eye"></i></a>&nbsp';
            }
            if (auth()->user()->can('Reporte venta')) {
            $action = $action .'<a class="btn btn-secondary" href='. route('compra.reporte',$row->id).'> <i class="fas fa-file-invoice-dollar"></i></a>&nbsp';
            }
            if (auth()->user()->can('Anular venta')) {
            $action = $action .'<a id="delete-venta" data-id='.$row->id.' class="btn btn-danger delete-user"><i class="fas fa-trash"></i></i></a></div>';
            }
                return $action;
            })
            ->rawColumns(['accion','estado'])
            ->make(true);
        }
        return view('Compras.compra.index');
    }

    public function create()
    {
        $proveedores = Proveedor::All();
        return view('Compras.compra.create', compact('proveedores'));
    }

    public function productos()
    {
        // $productos = Producto::where("estado","=",1)->get();
        $productos = Producto::All();
        // dd($productos);
        $data = Datatables::of($productos)
        ->editColumn('generico_id',function($row){
            return $row->generico->nombre;
        })
        ->editColumn('formato_id',function($row){
            return $row->formato->nombre;
        })
        ->addColumn('accion', function($row){
            return '<div class="d-flex justify-content-center"> <button class="btn btn-warning" onclick="agregarDetalle('.$row->id.',\''.$row->generico->nombre.'\',\''.$row->formato->nombre.'\',\''.$row->dosis.'\',\''.$row->precio.'\',\''.$row->stock.'\')" data-barcode="'. $row->nro_lote .'"><i class="fas fa-plus-circle"></i></button></div>' ;
        })
        ->addColumn('img', function($row){
            return "<div class='d-flex justify-content-center flex-nowrap'><img class='img-circle' style='width: 80px' src='". $row->img ."' alt=''></div>";
        })
        ->rawColumns(['accion','img'])
        ->make(true);

        // dd($data);
        return $data;
    }


    public function pdf(Request $request,$id){
        // $po = Producto_Venta::find($id);
        // dd($po);
        $compra = Compra::join('proveedores','compras.proveedor_id','=','proveedores.id')
        ->join('users','compras.user_id','=','users.id')->join('empleados','users.empleado_id','=','empleados.id')
        ->join('telefonos','proveedores.id','=','telefonos.proveedor_id')
        ->select('compras.id','compras.created_at','compras.total_ingreso',
        'compras.estado','proveedores.nombre','compras.impuesto','proveedores.correo','telefonos.numero','proveedores.direccion',
        'empleados.nombre as emnom','empleados.apellido as emape')
        ->where('compras.id','=',$id)
        ->orderBy('compras.id', 'desc')->take(1)->get();

        $detalles = Compra_Producto::join('productos','compra_producto.producto_id','=','productos.id')->join('formatos','productos.formato_id', '=', 'formatos.id')
        ->select('compra_producto.cantidad','compra_producto.precio_venta','compra_producto.precio','productos.nombre as articulo','formatos.nombre as fornom','productos.dosis')
        ->where('compra_producto.compra_id','=',$id)
        ->orderBy('compra_producto.id', 'desc')->get();

        // $numventa=Venta::select('num_comprobante')->where('id',$id)->get();

        $pdf = \PDF::loadView('Compras.compra.reporte',['venta'=>$compra,'detalles'=>$detalles]);
        // return \PDF::loadView('Ventas.venta.reporte',['venta'=>$venta,'detalles'=>$detalles]);
        return $pdf->stream();
        // $pdf = \PDF::loadView('pdf.venta',['venta'=>$venta,'detalles'=>$detalles]);
        return $pdf->download('reporte-venta.pdf');
    }


    public function store(Request $request)
    {

        $compra = Compra::create(['total_ingreso'=>$request->total_ingreso, 'proveedor_id'=>$request->proveedor_id, 'user_id'=>auth()->user()->id, 'fecha' => $request->fecha, 'estado' => 1, 'impuesto' => $request->impuesto]);

        $i = 0;
        while ($i < count($request->id)) {
            $detalle = new Compra_Producto();
            $detalle->compra_id = $compra->id;
            $detalle->producto_id = $request->id[$i];
            $detalle->cantidad = $request->cantidad[$i];
            $detalle->precio = $request->precio[$i];
            $detalle->precio_venta = $request->precio_venta[$i];
            $detalle->save();
            $i = $i + 1;
        }
        Bitacora::registro(2,' ha registrado la compra de ID: '. $compra->id);
        return view('Compras.compra.index');
    }

    public function show($id)
    {
        dd($id);
    }

    public function update(Request $request, $id)
    {
        $compra = Compra::find($id);
        if (empty($compra)) {
            Flash::error('compra no encontrado');
            return redirect(route('compras.index'));
        }

        $compra->estado = 0;
        $compra->save();
        Bitacora::registro(4,' ha anulado la compra "'. $request->nombre .'" de ID: '. $id);
    }
}