<div id='tablas' class="w-100">
    @if($data['respuesta']['ERROR']==1)
            <b>No se encontraron datos para la busqueda</b>
        @else
        <p><b>Tipo de Documento de Identidad: </b>{{$data['respuesta']['ACCRED'][0]['tp_doc'] == 1 ? 'DNI' : $data['respuesta']['ACCRED'][0]['tp_doc']}}</p>
        <p><b>Numero de Documento: </b>{{$data['respuesta']['ACCRED'][0]['nu_doc']}}</p>
        <p><b>Centro de adscripcion del asegurado: </b>{{$data['respuesta']['ACCRED'][0]['ce_ads']}}</p>
        <p><b>Fecha de incio de vigencia: </b>{{date("Y/m/d", strtotime($data['respuesta']['ACCRED'][0]['in_vig']))}}</p>
        <p><b>Fecha fin de vigencia: </b>{{date("Y/m/d", strtotime($data['respuesta']['ACCRED'][0]['fi_vig']))}}</p>
     @endif
</div>

