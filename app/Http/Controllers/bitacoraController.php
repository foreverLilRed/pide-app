<?php

namespace App\Http\Controllers;

use App\Models\registro;
use Illuminate\Http\Request;


class bitacoraController extends Controller
{
    public function index(Request $request)
    {
        $registros = registro::paginate(30);

        return view('bitacora', compact('registros'));
    }

    public function bitacoraJSON($busqueda){
        $datos = registro::where('usuario', 'LIKE', '%' . $busqueda . '%')
                    ->orWhere('servicio', 'LIKE', '%' . $busqueda . '%')
                    ->get();
        return response()->json(['datos' => $datos]);
    }

    public function todobitacoraJSON(){
        $datos = registro::all();
        return response()->json(['datos' => $datos]);
    }

    public function buscarPorFecha($fecha)
    {
        $registros = registro::whereDate('created_at', $fecha)->get();

        return response()->json(['datos' => $registros]);
    }

}
