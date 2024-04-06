<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SunarpController extends Controller
{
    public function PJRazonSocial(Request $request){
        $usuario = '###';
        $clave = '###';
        $tip = $request->input('tip');
        $rso = $request->input('ruc');

        $ch = curl_init();
        $ws_sunarp = "https://ws5.pide.gob.pe/Rest/APide/Sunarp/WSServiceTitularidadSIRSARP?usuario=".$usuario."&clave=".$clave."&tipoParticipante=J&razonSocial=".$rso."&out=json";
        curl_setopt($ch, CURLOPT_URL, $ws_sunarp);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $data1 = json_decode($response,true);
        return view('servicios.sunarp',compact('data1','tip'));
    }
}
