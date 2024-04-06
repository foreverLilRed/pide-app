<?php
    $usuario = '40029519-20141784901';
    $clave = 'Kl@zod9XUh6B1!t7';
    $persona = '16440517'; //16440517 //44032000 //16719851
    $ch = curl_init();
    $ws_conadis = "https://ws5.pide.gob.pe/Rest/APide/Conadis/PDiscapacidad?Username=".$usuario."&Password=".$clave."&DocNumber=".$persona."&out=json";
    curl_setopt($ch, CURLOPT_URL, $ws_conadis);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if(curl_errno($ch)){
        $error_msg = curl_error($ch);
        echo "error al conectarser al servicio";
    }else{
        curl_close($ch);
        $data = json_decode($response,true);
        switch($data['Fallecido']){
            case true:
                $conadis_vida = 'FALLECIDO';
            break;
            case false:
                $conadis_vida = 'VIVO';
            break;
        }
        //Evaluacion de gravedad de discapacidad
        switch($data['Gravedad']){
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
        //Evaluacion de inscripcion
        switch($data['Estado']){
            case 0:
                $conadis_est = 'NO INSCRITO';
            break;
            case 1:
                $conadis_est = 'INSCRITO';
            break;
        }
        if($data['Estado']==0){
            echo 'La persona no está inscrita en CONADIS';
        }else{
            echo '<h3>'.$data['Nombre'].' '.$data['ApellidoPaterno'].' '.$data['ApellidoMaterno'].' / '.$conadis_vida.' / '.$conadis_grav.' / '.$conadis_est.'</h3>';
        }
    }
?>