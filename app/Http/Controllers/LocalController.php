<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Busqueda;
use App\Models\credencial;

class LocalController extends Controller
{
    public function LOCALRENIEC(Request $request){
        $credenciales = credencial::where('servicio', 'reniec')->get();

        foreach ($credenciales as $credencial) {
            $usuario = $credencial->usuario;
            $clave = $credencial->clave;
            $ruc = $credencial->ruc;
        }

        $dni = $request->input('dni');
        $persona = Busqueda::where('dni',$dni)->first();

        if($persona == null){
            return redirect()->route('busquedaRENIEC',['dni' => $dni]);
        } else {
            return view('servicios.reniec-local', compact('persona'));
        }

    }

    public function store(Request $request){
        $response = $request->input('response');
        $dni = $request->input('dni');
        $data = json_decode($response,true);
        $registro = new Busqueda();
        if($data['consultarResponse']['return']['coResultado'] == '0000'){
            $registro -> dni = $dni;
            $registro -> apa = $data['consultarResponse']['return']['datosPersona']['apPrimer'];
            $registro -> ama = $data['consultarResponse']['return']['datosPersona']['apSegundo'];
            $registro -> direccion = $data['consultarResponse']['return']['datosPersona']['direccion'];
            $registro -> nombres = $data['consultarResponse']['return']['datosPersona']['prenombres'];
            $registro -> ubigeo  = $data['consultarResponse']['return']['datosPersona']['ubigeo'];
            $registro -> estado = $data['consultarResponse']['return']['datosPersona']['estadoCivil'];
            $registro -> restriccion = $data['consultarResponse']['return']['datosPersona']['restriccion'];
            $registro -> photo = $data['consultarResponse']['return']['datosPersona']['foto'];
            $registro -> foto = '64';
            $registro -> resultado = true;
            $registro->save();
        } else {
            $registro -> resultado = false;
        }

        return view('servicios.reniec', compact('data'));
    }
}
