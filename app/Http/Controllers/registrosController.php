<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\registro;

class registrosController extends Controller
{
    public function registrar(Request $request){
        switch ($request->input('servicio')) {
            case "RENIEC":
                $this->guardar($request->input('servicio'),$request->input('dni'));
                return redirect()->route('busquedaLOCALRENIEC', ['dni' => $request->input('dni')]);
            case "SUNAT":
                $this->guardar($request->input('servicio'),$request->input('ruc'));
                return redirect()->route('busquedaSUNAT', ['ruc' => $request->input('ruc')]);
            case "CONADIS":
                $this->guardar($request->input('servicio'),$request->input('dni'));
                return redirect()->route('busquedaCONADIS', ['dni' => $request->input('dni')]);
            case "MTC":
                $this->guardar($request->input('servicio'),$request->input('doc'));
                return redirect()->route('busquedaMTC', ['doc' => $request->input('doc'),'tip' => $request->input('tip')]);
            case "MINEDU":
                $this->guardar($request->input('servicio'),$request->input('doc'));
                return redirect()->route('busquedaMINEDU', ['doc' => $request->input('doc')]);
            case "ESSALUD":
                $this->guardar($request->input('servicio'),$request->input('dni'));
                return redirect()->route('busquedaESSALUD', ['dni' => $request->input('dni')]);
            case "PNP":
                $this->guardar($request->input('servicio'),$request->input('doc'));
                return redirect()->route('busquedaPNP', ['doc' => $request->input('doc')]);
            case "PJ":
                $this->guardar($request->input('servicio'),$request->input('dni'));
                return redirect()->route('busquedaPJ', ['apa' => $request->input('apa'),'ama' => $request->input('ama'),'no1' => $request->input('no1'),'no2' => $request->input('no2'),'no3' => $request->input('no3'),'dni' => $request->input('dni')]);
            case "INPE":
                $this->guardar($request->input('servicio'),$request->input('nom'));
                return redirect()->route('busquedaINPE', ['ap1' => $request->input('ap1'),'ap2' => $request->input('ap2'),'nom' => $request->input('nom')]);
            case "MINSA":
                $this->guardar($request->input('servicio'),$request->input('dni'));
                return redirect()->route('busquedaMINSA', ['dni' => $request->input('dni')]);
            case "SUNEDU":
                $this->guardar($request->input('servicio'),$request->input('doc'));
                return redirect()->route('busquedaSUNEDU', ['doc' => $request->input('doc')]);
            case "SUNARP":
                switch ($request->input('tipo')){
                    case '1':
                        $this->guardar($request->input('servicio'),$request->input('ruc'));
                        return redirect()->route('busquedaSUNARP', ['ruc' => $request->input('ruc'),'tip'=>$request->input('tipo')]);
                    case '2':
                        $string = $request->input('nom')." ".$request->input('apa')." ".$request->input('ama');
                        $this->guardar($request->input('servicio'),$string);
                        return redirect()->route('busquedaSUNARP', ['apa' => $request->input('apa'),'ama' => $request->input('ama'),'nom' => $request->input('nom'),'tip'=>$request->input('tipo')]);
                    case '3':
                        $this->guardar($request->input('servicio'),$request->input('ruc'));
                        return redirect()->route('busquedaSUNARP', ['ruc' => $request->input('ruc'),'tip'=>$request->input('tipo')]);
                    case '4':
                        $this->guardar($request->input('servicio'),"Búsqueda de Oficinas");
                        return redirect()->route('busquedaSUNARP', ['tip' => $request->input('tipo')]);
                    case '5':
                        $this->guardar($request->input('servicio'),$request->input('placa'));
                        return redirect()->route('busquedaSUNARP', ['pla' => $request->input('placa'),'zon'=>$request->input('codZona'),'ofi'=>$request->input('codOficina'),'tip'=>$request->input('tipo')]);
                    case '6':
                        $string = "Partida: ".$request->input('partida')." Registro: ".$request->input('registro');
                        $this->guardar($request->input('servicio'),$string);
                        return redirect()->route('busquedaSUNARP', ['par' => $request->input('partida'),'reg' => $request->input('registro'),'zon'=>$request->input('codZona'),'ofi'=>$request->input('codOficina'),'tip'=>$request->input('tipo')]);
                    case '7':
                        $string = "Transaccion: ".$request->input('transaccion')."ID Imagen: ".$request->input('imagen');
                        $this->guardar($request->input('servicio'),$string);
                        return redirect()->route('busquedaSUNARP', ['tra' => $request->input('transaccion'),'img' => $request->input('imagen'),'tipo'=>$request->input('tipos'),'tot'=>$request->input('total'),'tpa'=>$request->input('total'),'npa'=>$request->input('referencia'),'pag'=>$request->input('pagina'),'tip'=>$request->input('tipo')]); 
                }
            case 'MIGRACIONES':
                $this->guardar($request->input('servicio'),$request->input('doc'));
                return redirect()->route('busquedaMIGRACIONES', ['doc' => $request->input('doc')]);   
                
        }
    }

    public function redireccion(Request $request){
        $tip = $request->input('tip');
        if($tip == 4 || $tip == 5 ){
            return redirect()->route('busquedaSUNARP',['tip' => $request->input('tip')]); 
        }else{
            return view('servicios.sunarp', compact('tip'));
        }
    }
    public function guardar($servicio, $descripcion){
        $registro = new registro();
        $registro->usuario = auth()->user()->name;
        $registro->servicio = $servicio;
        $registro->descripcion = $descripcion;
        $registro->usuarioid = auth()->user()->id;
        $registro->save();
    }
}
