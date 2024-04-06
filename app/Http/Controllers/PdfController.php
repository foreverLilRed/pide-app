<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpParser\Node\Expr\Cast\Array_;
use App\Models\credencial;

class PdfController extends Controller
{
    public function generarPDF(Request $request)
    {
        $credenciales = credencial::where('servicio', 'sunarp')->get();

        foreach ($credenciales as $credencial) {
            $usuario = $credencial->usuario;
            $clave = $credencial->clave;
        }

        $zon = $request->input('zon');
            $par = $request->input('par');
            $reg = $request->input('reg');
            $ofi = $request->input('ofi');
            $ch = curl_init();
            $ws_sunarp_1 = "https://ws5.pide.gob.pe/Rest/APide/Sunarp/WSServicelistarAsientosSIRSARP?usuario=$usuario&clave=$clave&zona=$zon&oficina=$ofi&partida=$par&registro=$reg&out=json";
            curl_setopt($ch, CURLOPT_URL, $ws_sunarp_1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $data6 = json_decode($response,true);

            $data7 = [];
            $busqueda = [];

            if(isset($data6['listarAsientosSIRSARPResponse']['asientos']['transaccion'])){
                if(isset($data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['idImgAsiento'])){
                    //[listAsientos] tiene un elemento
                    echo "Resultado 1";
                    if(isset($data6['listarAsientosSIRSARPResponse']['asientos']['listPag']['nroPagRef'])){
                        //[listPag] tiene un elemento
                        echo "Resultado 2";
                        $tra = $data6['listarAsientosSIRSARPResponse']['asientos']['transaccion'];
                        $tpa = $data6['listarAsientosSIRSARPResponse']['asientos']['nroTotalPag'];
                        $tipo = $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['tipo'];
                        $img = $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['idImgAsiento'];
                        $npa = $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['listPag']['nroPagRef'];
                        $pagina = $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['listPag']['pagina'];
                        
                        $ch = curl_init();
                        $ws_sunarp_1 = "https://ws5.pide.gob.pe/Rest/APide/Sunarp/WSServiceverAsientosSIRSARP?usuario=$usuario&clave=$clave&transaccion=$tra&idImg=$img&tipo=$tipo&nroTotalPag=$tpa&nroPagRef=$npa&pagina=$pagina&out=json";
                        curl_setopt($ch, CURLOPT_URL, $ws_sunarp_1);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        $data = json_decode($response, true);
                        $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['listPag']['img'] = $data['verAsientoSIRSARPResponse']['img'];
                        $data7[$npa] = $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['listPag']['img'];
                        $r = 1;
                    }else{
                        //[listPag] tiene mas de un elemento
                        echo "Resultado 3";
                        foreach($data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['listPag'] as &$paginas){
                            $tra = $data6['listarAsientosSIRSARPResponse']['asientos']['transaccion'];
                            $tpa = $data6['listarAsientosSIRSARPResponse']['asientos']['nroTotalPag'];
                            $tipo = $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['tipo'];
                            $img = $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['idImgAsiento'];
                            $npa = $paginas['nroPagRef'];
                            $pagina = $paginas['pagina'];
                            
                            $ch = curl_init();
                            $ws_sunarp_1 = "https://ws5.pide.gob.pe/Rest/APide/Sunarp/WSServiceverAsientosSIRSARP?usuario=$usuario&clave=$clave&transaccion=$tra&idImg=$img&tipo=$tipo&nroTotalPag=$tpa&nroPagRef=$npa&pagina=$pagina&out=json";
                            curl_setopt($ch, CURLOPT_URL, $ws_sunarp_1);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $response = curl_exec($ch);
                            curl_close($ch);
                            $data = json_decode($response, true);
                            $paginas['img'] = $data['verAsientoSIRSARPResponse']['img'];
                            $data7[$npa] = $paginas['img'];
                            $r = 2;
                        }
                    }
                } else {
                    //[listAsientos] mas de un elemento
                    echo "Resultado 4";
                    foreach($data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos'] as &$asientos){
                        if(isset($asientos['listPag']['pagina'])){
                            //[listPag] tiene un elemento
                            echo "Resultado 5";
                                    $tra = $data6['listarAsientosSIRSARPResponse']['asientos']['transaccion'];
                                    $tpa = $data6['listarAsientosSIRSARPResponse']['asientos']['nroTotalPag'];
                                    $tipo = $asientos['tipo'];
                                    $img = $asientos['idImgAsiento'];
                                    $npa = $asientos['listPag']['nroPagRef'];
                                    $pagina = $asientos['listPag']['pagina'];
                            
                                    $ch = curl_init();
                                    $ws_sunarp_1 = "https://ws5.pide.gob.pe/Rest/APide/Sunarp/WSServiceverAsientosSIRSARP?usuario=$usuario&clave=$clave&transaccion=$tra&idImg=$img&tipo=$tipo&nroTotalPag=$tpa&nroPagRef=$npa&pagina=$pagina&out=json";
                                    curl_setopt($ch, CURLOPT_URL, $ws_sunarp_1);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    $response = curl_exec($ch);
                                    curl_close($ch);
                                    $data = json_decode($response, true);
                                    $asientos['listPag']['img'] = $data['verAsientoSIRSARPResponse']['img'];
                                    $data7[$npa] = $asientos['listPag']['img'];
                                    $r = 3;

                        }else{
                            //[listPag] tiene un mas de un elemento
                            echo "Resultado 6";
                                foreach ($asientos['listPag'] as &$pagItem) {
                                    $tra = $data6['listarAsientosSIRSARPResponse']['asientos']['transaccion'];
                                    $tpa = $data6['listarAsientosSIRSARPResponse']['asientos']['nroTotalPag'];
                                    $tipo = $asientos['tipo'];
                                    $img = $asientos['idImgAsiento'];
                                    $npa = $pagItem['nroPagRef'];
                                    $pagina = $pagItem['pagina'];
                            
                                    $ch = curl_init();
                                    $ws_sunarp_1 = "https://ws5.pide.gob.pe/Rest/APide/Sunarp/WSServiceverAsientosSIRSARP?usuario=$usuario&clave=$clave&transaccion=$tra&idImg=$img&tipo=$tipo&nroTotalPag=$tpa&nroPagRef=$npa&pagina=$pagina&out=json";
                                    curl_setopt($ch, CURLOPT_URL, $ws_sunarp_1);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    $response = curl_exec($ch);
                                    curl_close($ch);
                                    $data = json_decode($response, true);
                                    $pagItem['img'] = $data['verAsientoSIRSARPResponse']['img'];
                                    $data7[$npa] = $pagItem['img'];
                                    $r = 4;
                                }
                        }
                    }
                }
                ksort($data7);
                $images = $data7;
            }else{
                $data6 = 0;
                return view('servicios.sunarp', compact('data6','oficinasPorZona','tip'));
            }
        
            $imageData = [];

            foreach ($images as $base64Image) {
                $imageData[] = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
            }
        
            $adjustedImageData = array_map(function ($image) {
                $adjustedImage = preg_replace('/margin=\"\d+/i', 'margin="0', $image);
                return $adjustedImage;
            }, $imageData);
            
        $pdf = PDF::loadView('asientospdf', compact('imageData'));

        return $pdf->stream('asientos.pdf');
    }

}

