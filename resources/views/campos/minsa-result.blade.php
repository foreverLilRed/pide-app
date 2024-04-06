<div id="tablas" class="w-90">
    <div>
        @php
            if($data['afiliadoSisResponse']['afiliadoDetalle']['tipoDocumento']!='1'){
                $doc = '???';
            }else{
                $doc = $data['afiliadoSisResponse']['afiliadoDetalle']['tipoDocumento']." (DNI)";
            }

            if($data['afiliadoSisResponse']['afiliadoDetalle']['genero']!='1'){
                $gen = 'Femenino';
            }else{
                $gen = "Masculino";
            }

            if($data['afiliadoSisResponse']['afiliadoDetalle']['direccion']==NULL){
                $ubi = '---';
            }else{
                $ubi = $data['afiliadoSisResponse']['afiliadoDetalle']['direecion'];
            }

            if($data['afiliadoSisResponse']['afiliadoDetalle']['fecCaducidad']==NULL){
                $fec = 'No tiene';
            }else{
                $fec = $data['afiliadoSisResponse']['afiliadoDetalle']['fecCaducidad'];
            }

        @endphp
        @if($data['afiliadoSisResponse']['afiliadoDetalle']['codError']=='0000')
        <table class="table table-striped table-bordered" style="text-align: center">
            <tr>
                <td><h5 class="card-title">Numero de afiliacion:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['contrato']}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Tipo de Documento:</h5></td>
                <td><p>{{$doc}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Numero de Documento:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['nroDocumento']}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Apellido Paterno:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['apePaterno']}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Apellido Materno:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['apeMaterno']}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Nombres:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['nombres']}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Estado:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['estado']}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Fecha de Afiliacion:</h5></td>
                <td><p>{{date("Y/m/d", strtotime($data['afiliadoSisResponse']['afiliadoDetalle']['fecAfiliacion']))}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Establecimiento de salud:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['eess']}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Descripcion del Establecimiento de salud:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['descEESS']}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Ubigeo de Establecimiento de salud:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['eessUbigeo']}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Descripcion de Ubigeo de Establecimiento de salud:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['descEESSUbigeo']}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Regimen:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['regimen']}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Tipo de Seguro:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['tipoSeguro']}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Descripcion de Tipo de seguro:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['descTipoSeguro']}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Fecha de Caducidad:</h5></td>
                <td><p>{{$fec}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">ID Numero de registro:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['idNumReg']}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Genero:</h5></td>
                <td><p>{{$gen}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Fecha de Nacimiento:</h5></td>
                <td><p>{{date("Y/m/d", strtotime($data['afiliadoSisResponse']['afiliadoDetalle']['fecNacimiento']))}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">ID Ubigeo:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['idUbigeo']}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Direccion:</h5></td>
                <td><p>{{$ubi}}</p></td>
            </tr>
            <tr>
                <td><h5 class="card-title">Codigo de error:</h5></td>
                <td><p>{{$data['afiliadoSisResponse']['afiliadoDetalle']['codError']}}</p></td>
            </tr>
        </table>
        
            
        @else
            <b>No se encontraron datos para la busqueda</b>
        @endif
    </div>
</div>