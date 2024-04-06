<?php
    $ruc = '20479801275'; //10440320002 //20141784901
    $ch = curl_init();
    $ws_sunat_1 = "https://ws3.pide.gob.pe/Rest/Sunat/DatosPrincipales?numruc=".$ruc."&out=json";
    curl_setopt($ch, CURLOPT_URL, $ws_sunat_1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if(curl_errno($ch)){
        $error_msg = curl_error($ch);
        echo "error al conectarser al servicio";
    }else{
        curl_close($ch);
        $data = json_decode($response,true);
        /*
        echo '<pre>';
        echo print_r($data);
        echo '</pre>';
        */        
        echo '<h4>'.$data['list']['multiRef']['ddp_fecalt']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['ddp_fecact']['$'].'<br/></h4>';        
        echo '<h4>'.$data['list']['multiRef']['ddp_numruc']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['ddp_nombre']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['desc_tipvia']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['ddp_nomvia']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['ddp_numer1']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['desc_tipzon']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['ddp_nomzon']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['ddp_refer1']['$'].'<br/></h4>';        
        echo '<h4>'.$data['list']['multiRef']['desc_ciiu']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['desc_tpoemp']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['ddp_ubigeo']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['desc_dep']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['desc_prov']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['desc_dist']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['desc_estado']['$'].'<br/></h4>';      
        echo '<h4>'.$data['list']['multiRef']['desc_flag22']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['desc_identi']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['desc_numreg']['$'].'<br/></h4>';
        echo '<h4>************************** 1 ****************************<br/></h4>';
    }
    $ch = curl_init();
    $ws_sunat_2 = "https://ws3.pide.gob.pe/Rest/Sunat/DatosSecundarios?numruc=".$ruc."&out=json";
    curl_setopt($ch, CURLOPT_URL, $ws_sunat_2);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if(curl_errno($ch)){
        $error_msg = curl_error($ch);
        echo "error al conectarser al servicio";
    }else{
        curl_close($ch);
        $data = json_decode($response,true);
        if(isset($data['list']['multiRef']['dds_fecnac']['$'])){
            echo '<h4>'.$data['list']['multiRef']['dds_fecnac']['$'].'<br/></h4>';
            echo '<h4>'.$data['list']['multiRef']['dds_inicio']['$'].'<br/></h4>';
            echo '<h4>'.$data['list']['multiRef']['dds_nrodoc']['$'].'<br/></h4>';
            echo '<h4>'.$data['list']['multiRef']['declara']['$'].'<br/></h4>';
            echo '<h4>'.$data['list']['multiRef']['desc_cierre']['$'].'<br/></h4>';
            echo '<h4>'.$data['list']['multiRef']['desc_comext']['$'].'<br/></h4>';
            echo '<h4>'.$data['list']['multiRef']['desc_contab']['$'].'<br/></h4>';
            echo '<h4>'.$data['list']['multiRef']['desc_docide']['$'].'<br/></h4>';
            echo '<h4>'.$data['list']['multiRef']['desc_domici']['$'].'<br/></h4>';
            echo '<h4>'.$data['list']['multiRef']['desc_factur']['$'].'<br/></h4>';
            echo '<h4>'.$data['list']['multiRef']['desc_nacion']['$'].'<br/></h4>'; 
            echo '<h4>'.$data['list']['multiRef']['desc_sexo']['$'].'<br/></h4>';
            echo '<h4>*************************** 2 ***************************<br/></h4>';
        }else{
            echo '<h4>'.$data['list']['multiRef']['dds_inicio']['$'].'<br/></h4>';
            echo '<h4>'.$data['list']['multiRef']['dds_nrodoc']['$'].'<br/></h4>';
            echo '<h4>'.$data['list']['multiRef']['declara']['$'].'<br/></h4>';            
            echo '<h4>'.$data['list']['multiRef']['desc_comext']['$'].'<br/></h4>';
            echo '<h4>'.$data['list']['multiRef']['desc_contab']['$'].'<br/></h4>';
            echo '<h4>'.$data['list']['multiRef']['desc_factur']['$'].'<br/></h4>';
            echo '<h4>**************************** 2 ***************************<br/></h4>';
        }
    }
    $ch = curl_init();
    $ws_sunat_3 = "https://ws3.pide.gob.pe/Rest/Sunat/DatosT1144?numruc=".$ruc."&out=json";
    curl_setopt($ch, CURLOPT_URL, $ws_sunat_3);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if(curl_errno($ch)){
        $error_msg = curl_error($ch);
        echo "error al conectarser al servicio";
    }else{
        curl_close($ch);
        $data = json_decode($response,true);              
        echo '<h4>'.$data['list']['multiRef']['num_depar']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['num_fax']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['num_kilom']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['num_lote']['$'].'<br/></h4>';
        echo '<h4>'.$data['list']['multiRef']['num_manza']['$'].'<br/></h4>';
        echo '<h4>************************** 3 *****************************<br/></h4>';        
    }
    $ch = curl_init();
    $ws_sunat_4 = "https://ws3.pide.gob.pe/Rest/Sunat/DomicilioLegal?numruc=".$ruc."&out=json";
    curl_setopt($ch, CURLOPT_URL, $ws_sunat_4);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if(curl_errno($ch)){
        $error_msg = curl_error($ch);
        echo "error al conectarser al servicio";
    }else{
        curl_close($ch);
        $data = json_decode($response,true);        
        echo '<h4>'.$data['list']['getDomicilioLegalResponse']['getDomicilioLegalReturn']['$'].'<br/></h4>';
    }    
    $ch = curl_init();
    $ws_sunat_5 = "https://ws3.pide.gob.pe/Rest/Sunat/EstablecimientosAnexos?numruc=".$ruc."&out=json";
    curl_setopt($ch, CURLOPT_URL, $ws_sunat_5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if(curl_errno($ch)){
        $error_msg = curl_error($ch);
        echo "error al conectarser al servicio";
    }else{
        curl_close($ch);
        $data = json_decode($response,true);
        if(isset($data['list']['multiRef'])){
            foreach($data['list']['multiRef'] as $sede){
                echo '<h4>'.$sede['cod_dist']['$'].'<br/></h4>';
                echo '<h4>'.$sede['desc_dep']['$'].'<br/></h4>';
                echo '<h4>'.$sede['desc_prov']['$'].'<br/></h4>';
                echo '<h4>'.$sede['desc_dist']['$'].'<br/></h4>';
                echo '<h4>'.$sede['desc_tipest']['$'].'<br/></h4>';
                echo '<h4>'.$sede['direccion']['$'].'<br/></h4>';
                echo '<h4>'.$sede['spr_refer1']['$'].'<br/></h4>';
                echo '<h4>'.$sede['spr_nombre']['$'].'<br/></h4>';
                echo '<h4>'.$sede['spr_fecact']['$'].'<br/></h4>';
                echo '<h4>************************* 4 ******************************<br/></h4>';
            }
        }
    }
    $ch = curl_init();
    $ws_sunat_6 = "https://ws3.pide.gob.pe/Rest/Sunat/RepLegales?numruc=".$ruc."&out=json";
    curl_setopt($ch, CURLOPT_URL, $ws_sunat_6);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if(curl_errno($ch)){
        $error_msg = curl_error($ch);
        echo "error al conectarser al servicio";
    }else{
        curl_close($ch);
        $data = json_decode($response,true);
        if(isset($data['list']['multiRef'])){
            foreach($data['list']['multiRef'] as $sede){
                echo '<h4>'.$sede['desc_docide']['$'].'<br/></h4>';
                echo '<h4>'.$sede['rso_nrodoc']['$'].'<br/></h4>';
                echo '<h4>'.$sede['rso_nombre']['$'].'<br/></h4>';
                echo '<h4>'.$sede['rso_fecnac']['$'].'<br/></h4>';
                echo '<h4>'.$sede['rso_cargoo']['$'].'<br/></h4>';
                echo '<h4>'.$sede['rso_vdesde']['$'].'<br/></h4>';
                echo '<h4>'.$sede['rso_fecact']['$'].'<br/></h4>';
                echo '<h4>************************* 5 ******************************<br/></h4>';
            }
        }
    }
?>