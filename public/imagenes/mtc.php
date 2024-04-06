<?php
    $tdoc = '2';
    $ddoc = '40029519';
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
        if($data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['CodigoRespuesta']=='MSJ00'){
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['TipoDoc'].'<h4>';
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['NroDocumento'].'<h4>';
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['Correlato'].'<h4>';
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['NroLicencia'].'<h4>';
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['Categoria'].'<h4>';
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['ApellidoPaterno'].'<h4>';
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['ApellidoMaterno'].'<h4>';
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['Nombre'].'<h4>';
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['Departamento'].'<h4>';
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['Provincia'].'<h4>';
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['Distrito'].'<h4>';
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['Direccion'].'<h4>';
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['Fechaemision'].'<h4>';
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['Fechaexpedicion'].'<h4>';
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['Fecharevalidacion'].'<h4>';
            echo '<h4>'.$data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['Estadolicencia'].'<h4>';
        }else{
            echo "No hay datos para mostrar";
        }
    }
?>