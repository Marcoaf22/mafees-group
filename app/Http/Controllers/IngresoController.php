<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Ingreso;
use App\Models\Orden;
use App\Models\Preparacion;
use App\Models\Proveedor;
use App\Models\Servicio;
use App\Models\Tanque;
use Illuminate\Http\Request;

class IngresoController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Ingreso::all();
            $datos = DataTables()->of($data)
                ->editColumn('cliente_id', function ($row) {
                    return $row->cliente->nombre;
                })
                ->editColumn('proveedor_id', function ($row) {
                    return $row->proveedor->nombre;
                })
                ->editColumn('estado', function ($row) {
                    if ($row->estado == "Sin asignar")
                        $color = 'danger';
                    if ($row->estado == 'Asignado')
                        $color = 'info';
                    if ($row->estado == "Terminado")
                        $color = 'success';
                    return '<div class="d-flex justify-content-center"><span class="badge badge-' . $color . '" >' . $row->estado . '</span></div>';
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

        $clientes = Cliente::all();
        $servicios = Proveedor::all();
        return view('ingreso.index')->with('servicios', $servicios)->with('clientes', $clientes);
    }

    public function registrar(Request $request)
    {
        $data = Servicio::all();
        $clientes = Cliente::all();
        $preparaciones = Preparacion::where('estado', '=', false)->get();
        // var_dump($clientes);
        return view('orden.create')->with('servicios', $data)->with('clientes', $clientes)->with('preparaciones', $preparaciones);
    }

    public function store(Request $request)
    {
        // dd($request);
        Orden::create(['servicio_id' => $request->servicio_id, 'cliente_id' => $request->cliente_id, 'comentario' => $request->comentario, 'latitud' => $request->latitud, 'longitud' => $request->longitud, 'duracion' => $request->duracion, 'preparacion_id' => $request->preparacion_id]);


        $preparacion = Preparacion::find($request->preparacion_id);
        $preparacion->estado = true;
        $preparacion->save();

        $tanque = $preparacion->tanque;

        var_dump($request->all());
        $tank = Tanque::find($tanque->id);
        $tank->estado_id = 2;
        $tank->latitud = $request->latitud;
        $tank->longitud = $request->longitud;
        $tank->save();

        // $servicios = Servicio::where('estado', '=', '1')->get();
        return redirect('/dashboard/orden');
    }

    public function show($id)
    {
        $categoria = Orden::find($id);
        if (empty($categoria)) {
            return redirect(route('categoria.index'));
        }

        return view('Inventario.categoria.show')->with('categoria', $categoria);
    }

    public function edit($id)
    {
        $categoria = Orden::find($id);
        if (empty($categoria)) {
            return redirect(route('categoria.index'));
        }

        return view('Inventario.categoria.edit')->with('categoria', $categoria);
    }

    public function update(Request $request, $id)
    {
        $categoria = Orden::find($id);
        if (empty($categoria)) {
            return redirect(route('categoria.index'));
        }
        $categoria->fill($request->all());
        $categoria->save();
        return redirect(route('categoria.index'))->with(['message' => 'Categoria actualizado correctamente']);
    }

    public function destroy($id)
    {
        $categoria = Orden::find($id);
        if (empty($categoria)) {
            return redirect(route('categoria.index'));
        }
        $categoria->delete();
    }
}
