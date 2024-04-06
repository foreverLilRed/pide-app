<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\credencial;
use Illuminate\Support\Facades\Redirect;

class CredencialesController extends Controller
{
    public function index()
    {
        $credenciales = credencial::all();

        return view('credenciales', compact('credenciales'));
    }

    public function store(Request $request)
    {
        $servicio = new credencial;
        $servicio->servicio = $request->input('servicio');
        $servicio->usuario = $request->input('usuario');
        $servicio->clave = $request->input('clave');
        $servicio->entidad = $request->input('entidad');
        $servicio->ruc = $request->input('ruc');
        $servicio->ippublica = $request->input('ippublica');
        $servicio->mac = $request->input('mac');

        $servicio->save();

        return redirect()->route('servicios.index');
    }

    public function update(Request $request, $id)
    {
        $servicio = credencial::find($id);
        $servicio->servicio = $request->input('servicio');
        $servicio->usuario = $request->input('usuario');
        $servicio->clave = $request->input('clave');
        $servicio->entidad = $request->input('entidad');
        $servicio->ruc = $request->input('ruc');
        $servicio->ippublica = $request->input('ippublica');
        $servicio->mac = $request->input('mac');

        $servicio->save();

        return redirect()->route('credenciales');
    }

    public function show($id)
    {
        $servicio = credencial::find($id);

        return view('servicios.show', compact('servicio'));
    }

    public function destroy($id)
    {
        $servicio = credencial::find($id);
        $servicio->delete();

        return redirect()->route('servicios.index');
    }

    

}
