<?php

namespace App\Http\Controllers;

use App\Models\DetallePreparacion;
use App\Models\Preparacion;
use App\Models\Producto;
use App\Models\Tanque;
use Illuminate\Http\Request;

class TrasvaseController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Preparacion::all();
            $datos = DataTables()->of($data)
                ->editColumn('tanque_id', function ($row) {
                    return "Tanque #" . $row->tanque->id;
                })
                ->editColumn('estado', function ($row) {
                    return 'Completado';
                })
                ->addColumn('accion', function ($row) {
                    $action = '<div class="d-flex justify-content-center flex-nowrap">';
                    // if (auth()->user()->can('Ver empleado')){
                    // $action = $action .'<a class="btn btn-info" href='.route('empleado.show', $row->id).' data-id='.$row->id.'><i class="far fa-eye"></i></a>&nbsp';
                    // if (auth()->user()->can('Editar empleado')){
                    $action = $action . '<a class="btn btn-warning" href=' . route('orden.index', $row->id) . '><i class="far fa-edit"></i></a>&nbsp';
                    // }
                    // if (auth()->user()->can('Borrar empleado')) {
                    $action = $action . '<a id="delete-empleado" data-id=' . $row->id . ' class="btn btn-danger delete-user"><i class="fas fa-trash"></i></i></a></div>';
                    // }
                    return $action;
                })
                ->rawColumns(['accion', 'estado'])
                ->make(true);
            return $datos;
        }

        return view('trasvase.index');
    }


    public function create()
    {
        $productos = Producto::all();
        $tanques = Tanque::where('estado_id', '=', 1)->get();
        return view('trasvase.create')->with('productos', $productos)->with('tanques', $tanques);
    }

    public function producto()
    {
        $productos = Producto::All();
        $data = DataTables()->of($productos)
            ->addColumn('accion', function ($row) {
                return '<div class="d-flex justify-content-center"> <button class="btn btn-warning" onclick="agregarDetalle(' . $row->id . ',\'' . $row->nombre . '\',\'' . $row->presentacion . '\')" ' . '"><i class="fas fa-plus-circle"></i></button></div>';
            })
            // ->addColumn('img', function ($row) {
            //     return "<div class='d-flex justify-content-center flex-nowrap'><img class='img-circle' style='width: 80px' src='" . $row->img . "' alt=''></div>";
            // })
            ->rawColumns(['accion'])
            ->make(true);
        return $data;
    }

    public function store(Request $request)
    {
        $input = $request->all();
        // var_dump($input);

        $prepa = Preparacion::create(['cantidad' => 1, 'tanque_id' => $request->tanque_id, 'fecha' => $request->fecha, 'estado' => false]);
        $i = 0;
        while ($i < count($request->id)) {
            $detalle = new DetallePreparacion();
            $detalle->preparacion_id = $prepa->id;
            $detalle->producto_id = $request->id[$i];
            $detalle->cantidad = $request->cantidad[$i];
            $detalle->save();
            $i = $i + 1;
        }

        $tanque = Tanque::find($request->tanque_id);
        $tanque->numero_uso = $tanque->numero_uso + 1;
        $tanque->save();

        $preparacion = Preparacion::find($prepa->id);
        $preparacion->cantidad = $i;
        $preparacion->save();

        return redirect('/dashboard/trasvase');
    }
}
