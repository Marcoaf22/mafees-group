<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use App\Models\DetallePreparacion;
use App\Models\Preparacion;
use App\Models\Producto;
use App\Models\Tanque;
use chillerlan\QRCode\QROptions;
use Illuminate\Http\Request;

class TanqueController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Tanque::all();
            $datos = DataTables()->of($data)
                ->editColumn('almacen_id', function ($row) {
                    return $row->almacen->nombre;
                })
                ->addColumn('img', function ($row) {
                    return "<div class='d-flex justify-content-center flex-nowrap'><img class='img-circle' style='width: 80px' src='" . asset('tanques/' . $row->imagen . '.png') . "' alt=''></div>";
                })
                ->editColumn('estado_id', function ($row) {
                    $nombreEstado = "";
                    if ($row->estado_id == 1) {
                        $color = 'danger';
                        $nombreEstado = "Sin asignar";
                    }
                    if ($row->estado_id == 2) {
                        $color = 'success';
                        $nombreEstado = "Asignado";
                    }
                    if ($row->estado_id == 3) {
                        $color = 'info';
                        $nombreEstado = "Mantenimiento";
                    }
                    return '<div class="d-flex justify-content-center"><span class="badge badge-' . $color . '" >' . $row->estado->nombre . '</span></div>';
                })
                ->addColumn('accion', function ($row) {
                    $action = '<div class="d-flex justify-content-center flex-nowrap">';
                    // if (auth()->user()->can('Ver empleado')){
                    $action = $action . '<a class="btn btn-info" href=' . route('tanque.qr', $row->id) . ' data-id=' . $row->id . '><i class="far fa-eye"></i></a>&nbsp';
                    // if (auth()->user()->can('Editar empleado')){
                    $action = $action . '<a class="btn btn-warning" href=' . route('tanque.detalle', $row->id) . '><i class="far fa-edit"></i></a>&nbsp';
                    // }
                    // if (auth()->user()->can('Borrar empleado')) {
                    $action = $action . '<a id="delete-empleado" data-id=' . $row->id . ' class="btn btn-danger delete-user"><i class="fas fa-trash"></i></i></a></div>';
                    // }
                    return $action;
                })
                ->rawColumns(['accion', 'estado_id', 'imagen'])
                ->make(true);
            return $datos;
        }
        return view('tanque.index');
    }

    public function seguimiento()
    {
        $tanques = Tanque::all();
        return view('tanque.seguimiento')->with('tanques', $tanques);
    }

    public function generarQr($id)
    {
        // return QrCode::generate('Make me into a QrCode!');
        $tanque = Tanque::find($id);
        return view('tanque.qr')->with('tanque', $tanque);
    }

    public function detalle($id)
    {
        $tanque = Tanque::where('id', '=', $id)->first();
        $preparaciones = Preparacion::where('tanque_id', '=', $id)->get();

        foreach ($preparaciones as $preparacion) {
            $detalle = DetallePreparacion::where('preparacion_id', '=', $preparacion->id)->get();
            foreach ($detalle as $prod) {
                $producto = Producto::where('id', '=', $prod->producto_id)->first();
                $prod['p_nombre'] = $producto->nombre;
                $prod['p_presentacion'] = $producto->presentacion;
            }
            $preparacion['detalles'] = $detalle;
        }
        return view('tanque.detalle')->with('tanque', $tanque)->with('preparaciones', $preparaciones);
    }

    public function actualizar(Request $request)
    {
        var_dump($request->all());
        $tanque = Tanque::find($request->id);
        $almacen = Almacen::find($request->almacen_id);
        var_dump($almacen);

        $tanque->almacen_id = $request->almacen_id;
        $tanque->estado_id = $request->estado_id;
        $tanque->latitud = $almacen->latitud;
        $tanque->longitud = $almacen->longitud;
        $tanque->save();
        return redirect('dashboard/tanque');
    }
}
