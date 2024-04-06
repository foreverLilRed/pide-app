<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\credencial;
use App\Models\Grupo;
use App\Models\Permiso;
use App\Models\User;

class serviciosController extends Controller
{
    public function index(){
        $permisos = Permiso::where('group_id', auth()->user()->group_id)->get();
        return view('inicio', ['permisos' => $permisos]);
    }
    public function essalud(){
        return view('servicios.essalud');
    }

    public function minedu(){
        return view('servicios.minedu');
    }

    public function minpe(){
        return view('servicios.minpe');
    }

    public function reniec(){
        return view('servicios.reniec');
    }
    
    public function conadis(){
        return view('servicios.conadis');
    }

    public function sunat(){
        return view('servicios.sunat');
    }

    public function mtc(){
        return view('servicios.mtc');
    }

    public function inpe(){
        return view('servicios.inpe');
    }

    public function pj(){
        return view('servicios.pj');
    }

    public function pnp(){
        return view('servicios.pnp');
    }

    public function minsa(){
        return view('servicios.minsa');
    }

    public function sunedu(){
        return view('servicios.sunedu');
    }

    public function sunarp(){
        $credenciales = credencial::where('servicio', 'sunarp')->get();

        foreach ($credenciales as $credencial) {
            $usuario = $credencial->usuario;
            $clave = $credencial->clave;
        }
        $ch = curl_init();
        $ws_sunarp_1 = "https://ws5.pide.gob.pe/Rest/APide/Sunarp/WSServicegetOficinas?usuario=".$usuario."&clave=".$clave."&out=json";
        curl_setopt($ch, CURLOPT_URL, $ws_sunarp_1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $data5 = json_decode($response,true);

        $oficinasPorZona = [];
        foreach ($data5['oficina']['oficina'] as $oficina) {
            $codigoZona = $oficina['codZona'];
            $oficinasPorZona[$codigoZona][] = $oficina;
        }

        return view('servicios.sunarp', compact('oficinasPorZona'));
    }

    public function migraciones(){
        return view('servicios.migraciones');
    }
}
