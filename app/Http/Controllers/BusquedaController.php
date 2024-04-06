<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Busqueda;
use App\Models\credencial;
class BusquedaController extends Controller
{


    public function info(){
        return view('servicios.error');
    }

    public function migraciones(Request $request){
        $credenciales = credencial::where('servicio', 'migraciones')->get();

        foreach ($credenciales as $credencial) {
            $strCodInstitucion = $credencial->entidad;
            $strMac = $credencial->mac;
            $strNroIp = $credencial->ippublica;
        }
   
        $strNumDocumento = $request->input('doc');//'000759556';
        $strTipoDocumento = 'CE';
        $ch = curl_init();
        $ws_migraciones = "https://ws3.pide.gob.pe/Rest/Migraciones/CarnetExtranjeria?strCodInstitucion=".$strCodInstitucion."&strMac=".$strMac."&strNroIp=".$strNroIp."&strNumDocumento=".$strNumDocumento."&strTipoDocumento=".$strTipoDocumento."&out=json";
        curl_setopt($ch, CURLOPT_URL, $ws_migraciones);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if(curl_errno($ch)){
            $error_msg = curl_error($ch);
            echo "error al conectarser al servicio";
        }else{
            curl_close($ch);
            $data = json_decode($response,true);
            return view('servicios.migraciones', compact('data'));
        }
        
    }
    public function RENIEC(Request $request)
    {
        $credenciales = credencial::where('servicio', 'reniec')->get();

        foreach ($credenciales as $credencial) {
            $usuario = $credencial->usuario;
            $clave = $credencial->clave;
            $ruc = $credencial->ruc;
        }

        $dni = $request->input('dni');

        $persona = $dni;

        $ch = curl_init();
        $ws_reniec = "https://ws5.pide.gob.pe/Rest/Reniec/Consultar?nuDniConsulta=".$persona."&nuDniUsuario=".$usuario."&nuRucUsuario=".$ruc."&password=".$clave."&out=json";
        curl_setopt($ch, CURLOPT_URL, $ws_reniec);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            $data = ['error' => $error_msg];
        } else {
            curl_close($ch);
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
        }

        return view('servicios.reniec', compact('data'));


    }

    public function CONADIS(Request $request)
    {
        $credenciales = credencial::where('servicio', 'conadis')->get();

        foreach ($credenciales as $credencial) {
            $usuario = $credencial->usuario;
            $clave = $credencial->clave;
        }

        $persona = $request->input('dni');

        $ch = curl_init();
        $ws_conadis = "https://ws5.pide.gob.pe/Rest/APide/Conadis/PDiscapacidad?Username=".$usuario."&Password=".$clave."&DocNumber=".$persona."&out=json";
        curl_setopt($ch, CURLOPT_URL, $ws_conadis);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            return view('error')->with('error_msg', 'Error al conectarse al servicio');
        } else {
            curl_close($ch);
            $data = json_decode($response, true);

            $conadis_vida = '';
            $conadis_grav = '';
            $conadis_est = '';

            switch ($data['Fallecido']) {
                case true:
                    $conadis_vida = 'FALLECIDO';
                    break;
                case false:
                    $conadis_vida = 'VIVO';
                    break;
            }

            switch ($data['Gravedad']) {
                case 1:
                    $conadis_grav = 'ENTERO';
                    break;
                case 2:
                    $conadis_grav = 'MODERADO';
                    break;
                case 3:
                    $conadis_grav = 'SEVERO';
                    break;
                case 9:
                    $conadis_grav = 'NEP';
                    break;
            }

            switch ($data['Estado']) {
                case 0:
                    $conadis_est = 'NO INSCRITO';
                    break;
                case 1:
                    $conadis_est = 'INSCRITO';
                    break;
            }


            return view('servicios.conadis')->with([
                'data' => $data,
                'conadis_vida' => $conadis_vida,
                'conadis_grav' => $conadis_grav,
                'conadis_est' => $conadis_est,
            ]);
        }
    }

    public function SUNAT(Request $request){

        $ruc = $request->input('ruc');

        $ch = curl_init();
        $ws_sunat_1 = "https://ws3.pide.gob.pe/Rest/Sunat/DatosPrincipales?numruc=".$ruc."&out=json";
        curl_setopt($ch, CURLOPT_URL, $ws_sunat_1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response1 = curl_exec($ch);
        if(curl_errno($ch)){
            $error_msg = curl_error($ch);
            echo "error al conectarser al servicio";
        }else{
            curl_close($ch);
            $data1 = json_decode($response1,true);
        }

        $ws_sunat_2 = "https://ws3.pide.gob.pe/Rest/Sunat/DatosSecundarios?numruc=".$ruc."&out=json";
        curl_setopt($ch, CURLOPT_URL, $ws_sunat_2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response2 = curl_exec($ch);
        if(curl_errno($ch)){
            $error_msg = curl_error($ch);
            echo "error al conectarser al servicio";
        }else{
            curl_close($ch);
            $data2 = json_decode($response2,true);
        }

        $ws_sunat_3 = "https://ws3.pide.gob.pe/Rest/Sunat/DatosT1144?numruc=".$ruc."&out=json";
        curl_setopt($ch, CURLOPT_URL, $ws_sunat_3);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response3 = curl_exec($ch);
        if(curl_errno($ch)){
            $error_msg = curl_error($ch);
            echo "error al conectarser al servicio";
        }else{
            curl_close($ch);
            $data3 = json_decode($response3,true);
        }

        $ws_sunat_4 = "https://ws3.pide.gob.pe/Rest/Sunat/DomicilioLegal?numruc=".$ruc."&out=json";
        curl_setopt($ch, CURLOPT_URL, $ws_sunat_4);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response4 = curl_exec($ch);
        if(curl_errno($ch)){
            $error_msg = curl_error($ch);
            echo "error al conectarser al servicio";
        }else{
            curl_close($ch);
            $data4 = json_decode($response4,true);        
        } 

        $ws_sunat_5 = "https://ws3.pide.gob.pe/Rest/Sunat/EstablecimientosAnexos?numruc=".$ruc."&out=json";
        curl_setopt($ch, CURLOPT_URL, $ws_sunat_5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response5 = curl_exec($ch);
        if(curl_errno($ch)){
            $error_msg = curl_error($ch);
        }else{
            curl_close($ch);
            $data5 = json_decode($response5,true);
        }

        $ws_sunat_6 = "https://ws3.pide.gob.pe/Rest/Sunat/RepLegales?numruc=".$ruc."&out=json";
        curl_setopt($ch, CURLOPT_URL, $ws_sunat_6);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response6 = curl_exec($ch);
        if(curl_errno($ch)){
            $error_msg = curl_error($ch);
            echo "error al conectarser al servicio";
        }else{
            curl_close($ch);
            $data6 = json_decode($response6,true);
        }

        return view('servicios.sunat', compact('data1','data2','data3','data4','data5','data6'));
    }

    public function MTC(Request $request){
        
        $ddoc = $request->input('doc');
        $tdoc = $request->input('tip');

        $ch = curl_init();
        $ws_mtc = "https://ws3.pide.gob.pe/Rest/Mtc/DatosLicencia?iTipoDocumento=".$tdoc."&sNumDocumento=".$ddoc."&out=json";
        curl_setopt($ch, CURLOPT_URL, $ws_mtc);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if(curl_errno($ch)){
            $error_msg = curl_error($ch);
            echo "error al conectarser al servicio";
        }else{
            curl_close($ch);
            $data = json_decode($response,true);
        }

        return view('servicios.mtc', compact('data'));
    }

    public function MINEDU(Request $request){
        $ddoc = $request->input('doc');

        $ch = curl_init();
        $ws_mtc = "https://ws3.pide.gob.pe/Rest/Minedu/Titulo?nroDocumento=".$ddoc."&out=json";
        curl_setopt($ch, CURLOPT_URL, $ws_mtc);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if(curl_errno($ch)){
            $error_msg = curl_error($ch);
            echo "error al conectarser al servicio";
        }else{
            curl_close($ch);
            $data = json_decode($response,true);
        }

        return view('servicios.minedu', compact('data'));
    }

    public function essalud(Request $request){
        $credenciales = credencial::where('servicio', 'essalud')->get();

        foreach ($credenciales as $credencial) {
            $usuario = $credencial->usuario;
            $clave = $credencial->clave;
        }

        $dni = $request->input('dni');

        $tipodoc = '01';
        $ch = curl_init();
        $ws_essalud = "https://ws3.pide.gob.pe/Rest/EsSalud/Asegurados?tipodoc=".$tipodoc."&numdoc=".$dni."&user=".$usuario."&pass=".$clave."&out=json";
        curl_setopt($ch, CURLOPT_URL, $ws_essalud);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if(curl_errno($ch)){
            $error_msg = curl_error($ch);
            echo "error al conectarser al servicio";
        }else{
            curl_close($ch);
            $data = json_decode($response,true);
            return view('servicios.essalud', compact('data'));
        }
    }

    public function pnp(Request $request){
        $credenciales = credencial::where('servicio', 'pnp')->get();

        foreach ($credenciales as $credencial) {
            $clienteUsuario = $credencial->usuario;
            $clienteClave = $credencial->clave;
            $clienteIp = $credencial->ippublica;
            $clienteMac = $credencial->mac;
            $nroDocUserClieFin = $credencial->ruc;
        }

        $nroDoc = $request->input('doc');
        
        $servicioCodigo = 'WS_PIDE_ANTECEDENTES_FLAG';
        $clienteSistema = 'SISTEMA_ENTIDAD';
        $tipoDocUserClieFin = 1;

        $ws_pnp = "https://ws3.pide.gob.pe/Rest/Pnp/APolicialPersonaNroDoc?clienteUsuario=".$clienteUsuario."&clienteClave=".$clienteClave."&servicioCodigo=".$servicioCodigo."&clienteSistema=".$clienteSistema."&clienteIp=".$clienteIp."&clienteMac=".$clienteMac."&tipoDocUserClieFin=".$tipoDocUserClieFin."&nroDocUserClieFin=".$nroDocUserClieFin."&nroDoc=".$nroDoc."&out=json";
        $data = json_decode(file_get_contents($ws_pnp),true);
        return view('servicios.pnp', compact('data'));
    }

    public function pj(Request $request){
        
        $credenciales = credencial::where('servicio', 'pj')->get();

        foreach ($credenciales as $credencial) {
            $xAudNombreUsuario = $credencial->usuario;
            $xDniPersonaConsultante = $credencial->clave;
            $xIpPublica = $credencial->ippublica;
            $xAudDireccionMAC = $credencial->mac;
            $xRucEntidadConsultante = $credencial->ruc;
            $xProcesoEntidadConsultante = $credencial->entidad;
        }
        
        $xMotivoConsulta = 'CONSULTA_SOBRE_PERSONAL';
        $xAudNombrePC = 'GTIE-JADG';
        $xAudIP = '192.168.12.249';
        
        $xApellidoPaterno = strtoupper(str_replace(' ', '%20',$request->input('apa')));
        $xApellidoMaterno = strtoupper(str_replace(' ', '%20',$request->input('ama')));
        $xNombre1 = strtoupper(str_replace(' ', '%20',$request->input('no1')));
        $xNombre2 = strtoupper(str_replace(' ', '%20',$request->input('no2')));
        $xNombre3 = strtoupper(str_replace(' ', '%20',$request->input('no3')));
        $xDni = $request->input('dni');
        
        $ws_pj = "https://ws3.pide.gob.pe/Rest/PJ/APenales?xApellidoPaterno=".$xApellidoPaterno."&xApellidoMaterno=".$xApellidoMaterno."&xNombre1=".$xNombre1."&xNombre2=".$xNombre2."&xNombre3=".$xNombre3."&xDni=".$xDni."&xMotivoConsulta=".$xMotivoConsulta."&xProcesoEntidadConsultante=".$xProcesoEntidadConsultante."&xRucEntidadConsultante=".$xRucEntidadConsultante."&xIpPublica=".$xIpPublica."&xDniPersonaConsultante=".$xDniPersonaConsultante."&xAudNombrePC=".$xAudNombrePC."&xAudIP=".$xAudIP."&xAudNombreUsuario=".$xAudNombreUsuario."&xAudDireccionMAC=".$xAudDireccionMAC."&out=json";
        $data = json_decode(file_get_contents($ws_pj),true);
        return view('servicios.pj', compact('data'));
    }

    public function inpe(Request $request){
        $credenciales = credencial::where('servicio', 'inpe')->get();

        foreach ($credenciales as $credencial) {

            $usuario = $credencial->usuario;
            $institucionRuc = $credencial->ruc;
            $institucionIp = $credencial->ippublica;
        }

        $usuarioDNI = '40029519';

        $primerApellido = strtoupper(str_replace(' ', '%20', $request->input('ap1')));
        $segundoApellido = strtoupper(str_replace(' ', '%20', $request->input('ap2')));
        $nombres = strtoupper(str_replace(' ', '%20', $request->input('nom')));

        $ws_inpe = "https://ws5.pide.gob.pe/Rest/Pide/INPE/AJudiciales?institucionRuc=".$institucionRuc."&institucionIp=".$institucionIp."&usuario=".$usuario."&usuarioDNI=".$usuarioDNI."&primerApellido=".$primerApellido."&segundoApellido=".$segundoApellido."&nombres=".$nombres."&out=json";
        $data = json_decode(file_get_contents($ws_inpe),true);
        return view('servicios.inpe', compact('data'));

    }

    public function MINSA(Request $request){
        $dni = $request->input('dni');
        $tip_doc = '1';
        $ch = curl_init();
        $ws_minsa = "https://ws3.pide.gob.pe/Rest/Minsa/AfiliadoSis?tiDocumento=".$tip_doc."&nuDocumento=".$dni."&out=json";
        curl_setopt($ch, CURLOPT_URL, $ws_minsa);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if(curl_errno($ch)){
            $error_msg = curl_error($ch);
            echo "error al conectarse al servicio";
        }else{
            curl_close($ch);
            $data = json_decode($response,true);
        }

        return view('servicios.minsa',compact('data'));

    }

    public function SUNEDU(Request $request){
        date_default_timezone_set("America/Lima");
        $nroDocIdentidad = $request->input('doc');

        $credenciales = credencial::where('servicio', 'sunedu')->get();

        foreach ($credenciales as $credencial) {

            $usuario = $credencial->usuario;
            $clave = $credencial->clave;
            $identidad = $credencial->entidad;
            $ip_wsServer = $credencial->ippublica;
            $mac_wsServer = $credencial->mac;

        }

        $fecha = date("Ymd");
        $hora = date("His");
        $ip_wsUser = '?';

        $ws_sunedu = "https://ws5.pide.gob.pe/Rest/Sunedu/Grados?usuario=".$usuario."&clave=".$clave."&idEntidad=".$identidad."&fecha=".$fecha."&hora=".$hora."&mac_wsServer=".$mac_wsServer."&ip_wsServer=".$ip_wsServer."&ip_wsUser=".$ip_wsUser."&nroDocIdentidad=".$nroDocIdentidad."&out=json";
        
        $data = json_decode(file_get_contents($ws_sunedu),true);

        return view('servicios.sunedu',compact('data'));
    }

    public function SUNARP(Request $request){
        $credenciales = credencial::where('servicio', 'sunarp')->get();

        foreach ($credenciales as $credencial) {
            $usuario = $credencial->usuario;
            $clave = $credencial->clave;
        }

        $tip = $request->input('tip');
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

        if($request->input('tip') == 2){
            $apa = strtoupper(str_replace(' ', '%20',$request->input('apa')));
                $ama = strtoupper(str_replace(' ', '%20',$request->input('ama')));
                $nom = strtoupper(str_replace(' ', '%20',$request->input('nom')));

                $ch = curl_init();
                $ws_sunarp = "https://ws5.pide.gob.pe/Rest/APide/Sunarp/WSServiceTitularidadSIRSARP?usuario=".$usuario."&clave=".$clave."&tipoParticipante=N&apellidoPaterno=".$apa."&apellidoMaterno=".$ama."&nombres=".$nom."&out=json";
                curl_setopt($ch, CURLOPT_URL, $ws_sunarp);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
                $data2 = json_decode($response,true);
                return view('servicios.sunarp',compact('data2','tip','oficinasPorZona'));
        }else if($request->input('tip') == 3){
            $rso = strtoupper(str_replace(' ', '%20',$request->input('ruc')));
                $ch = curl_init();
            $ws_sunarp_1 = "https://ws5.pide.gob.pe/Rest/APide/Sunarp/WSServiceTitularidadSIRSARP?usuario=$usuario&clave=$clave&tipoParticipante=J&razonSocial=$rso&out=json";
                curl_setopt($ch, CURLOPT_URL, $ws_sunarp_1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
                $data3 = json_decode($response,true);
                return view('servicios.sunarp',compact('data3','tip','oficinasPorZona'));
        }else if($request->input('tip') == 1){
            $rso = strtoupper(str_replace(' ', '%20',$request->input('ruc')));
            $ch = curl_init();
            $ws_sunarp_1 = "https://ws5.pide.gob.pe/Rest/APide/Sunarp/WSServicePJRazonSocial?usuario=".$usuario."&clave=".$clave."&razonSocial=".$rso."&out=json";
            curl_setopt($ch, CURLOPT_URL, $ws_sunarp_1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $data1 = json_decode($response,true);
            return view('servicios.sunarp',compact('data1','tip','oficinasPorZona')); 
        }else if($request->input('tip') == 5){
            $zon = $request->input('zon');
            $pla = $request->input('pla');
            $ofi = $request->input('ofi');
            $ch = curl_init();
            $ws_sunarp_1 = "https://ws5.pide.gob.pe/Rest/APide/Sunarp/WSServiceverDetalleRPVExtra?usuario=".$usuario."&clave=".$clave."&zona=".$zon."&oficina=".$ofi."&placa=".$pla."&out=json";
            curl_setopt($ch, CURLOPT_URL, $ws_sunarp_1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $data5 = json_decode($response,true);
            $ch = curl_init();

            return view('servicios.sunarp', compact('data5','oficinasPorZona','tip')); 
        }else if($request->input('tip') == 6){
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

            $busqueda[0] = $zon;
            $busqueda[1] = $par;
            $busqueda[2] = $reg;
            $busqueda[3] = $ofi;
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
                        array_push($data7, $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['listPag']['img']);
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
                            array_push($data7, $paginas['img']);
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
                                    array_push($data7, $asientos['listPag']['img']);
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
                                    array_push($data7, $pagItem['img']);
                                    $r = 4;
                                }
                        }
                    }
                }

                return view('servicios.sunarp', compact('data6','data7','oficinasPorZona','tip','r','busqueda'));

            }else{
                $data6 = 0;
                return view('servicios.sunarp', compact('data6','oficinasPorZona','tip'));
            }
        }else if($request->input('tip') == 7){
            $tra = $request->input('tra');
            $img = $request->input('img');
            $tipo = $request->input('tipo');
            $tot = $request->input('tot');
            $tpa = $request->input('tpa');
            $npa = $request->input('npa');
            $pag = $request->input('pag');
            $ch = curl_init();
            $ws_sunarp_1 = "https://ws5.pide.gob.pe/Rest/APide/Sunarp/WSServiceverAsientosSIRSARP?usuario=$usuario&clave=$clave&transaccion=$tra&idImg=$img&tipo=$tipo&nroTotalPag=$tpa&nroPagRef=$npa&pagina=$pag&out=json";
            curl_setopt($ch, CURLOPT_URL, $ws_sunarp_1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            $data7 = json_decode($response,true);

            return view('servicios.sunarp', compact('data7','oficinasPorZona','tip')); 
        }
        
    }
}
