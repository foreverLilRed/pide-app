<div class="row mb-4">
        @if (isset($data1['list']['multiRef']['ddp_nombre']['@nil']))
            <b>No hay datos para mostrar</b>
        @else
        <div id="tablas">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="2" class="bg-primary text-white text-center font-weight-bold">Informacion General del Contribuyente</th>
                </tr>                
                <tr>
                    <td>Fecha de Alta</td>
                    <td>{{ $data1['list']['multiRef']['ddp_fecalt']['$'] }}</td>
                </tr>
                <tr>
                    <td>Fecha de Actualizacion</td>
                    <td>{{ $data1['list']['multiRef']['ddp_fecact']['$'] }}</td>
                </tr>
                <tr>
                    <td>RUC</td>
                    <td>{{ $data1['list']['multiRef']['ddp_numruc']['$'] }}</td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td>{{ $data1['list']['multiRef']['ddp_nombre']['$'] }}</td>
                </tr>
                <tr>
                    <td>Tipo de Via</td>
                    <td>{{ $data1['list']['multiRef']['desc_tipvia']['$'] }}</td>
                </tr>
                <tr>
                    <td>Nombre de Vi­a</td>
                    <td>{{ $data1['list']['multiRef']['ddp_nomvia']['$'] }}</td>
                </tr>
                <tr>
                    <td>Numero 1</td>
                    <td>{{ $data1['list']['multiRef']['ddp_numer1']['$'] }}</td>
                </tr>
                <tr>
                    <td>Tipo de Zona</td>
                    <td>{{ $data1['list']['multiRef']['desc_tipzon']['$'] }}</td>
                </tr>
                <tr>
                    <td>Nombre de Zona</td>
                    <td>{{ $data1['list']['multiRef']['ddp_nomzon']['$'] }}</td>
                </tr>
                <tr>
                    <td>Referencia 1</td>
                    <td>{{ $data1['list']['multiRef']['ddp_refer1']['$'] }}</td>
                </tr>
                <tr>
                    <td>Descripcion CIIU</td>
                    <td>{{ $data1['list']['multiRef']['desc_ciiu']['$'] }}</td>
                </tr>
                <tr>
                    <td>Tipo de Empresa</td>
                    <td>{{ $data1['list']['multiRef']['desc_tpoemp']['$'] }}</td>
                </tr>
                <tr>
                    <td>Ubigeo</td>
                    <td>{{ $data1['list']['multiRef']['ddp_ubigeo']['$'] }}</td>
                </tr>
                <tr>
                    <td>Departamento</td>
                    <td>{{ $data1['list']['multiRef']['desc_dep']['$'] }}</td>
                </tr>
                <tr>
                    <td>Provincia</td>
                    <td>{{ $data1['list']['multiRef']['desc_prov']['$'] }}</td>
                </tr>
                <tr>
                    <td>Distrito</td>
                    <td>{{ $data1['list']['multiRef']['desc_dist']['$'] }}</td>
                </tr>
                <tr>
                    <td>Estado</td>
                    <td>{{ $data1['list']['multiRef']['desc_estado']['$'] }}</td>
                </tr>
                <tr>
                    <td>Condicion del Domicilio</td>
                    <td>{{ $data1['list']['multiRef']['desc_flag22']['$'] }}</td>
                </tr>
                <tr>
                    <td>Identificacion</td>
                    <td>{{ $data1['list']['multiRef']['desc_identi']['$'] }}</td>
                </tr>
                <tr>
                    <td>Numero de Registro</td>
                    <td>{{ $data1['list']['multiRef']['desc_numreg']['$'] }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="2" class="bg-primary text-white text-center font-weight-bold">Otra Informacion del Contribuyente</th>
                </tr>  
                @if (isset($data2['list']['multiRef']['dds_fecnac']['$']))
                    <tr>
                        <td>Fecha de Nacimiento</td>
                        <td>{{ $data2['list']['multiRef']['dds_fecnac']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Inicio</td>
                        <td>{{ $data2['list']['multiRef']['dds_inicio']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Numero de Documento</td>
                        <td>{{ $data2['list']['multiRef']['dds_nrodoc']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Declaracion</td>
                        <td>{{ $data2['list']['multiRef']['declara']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Codigo de profesion / Oficio</td>
                        <td>{{ $data2['list']['multiRef']['desc_cierre']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Descripcion Comercio Exterior</td>
                        <td>{{ $data2['list']['multiRef']['desc_comext']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Descripcion Contabilidad</td>
                        <td>{{ $data2['list']['multiRef']['desc_contab']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Descripcion Documento de Identidad</td>
                        <td>{{ $data2['list']['multiRef']['desc_docide']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Descripcion Domicilio</td>
                        <td>{{ $data2['list']['multiRef']['desc_domici']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Descripcion Facturacion</td>
                        <td>{{ $data2['list']['multiRef']['desc_factur']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Descripcion Nacionalidad</td>
                        <td>{{ $data2['list']['multiRef']['desc_nacion']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Descripcion Sexo</td>
                        <td>{{ $data2['list']['multiRef']['desc_sexo']['$'] }}</td>
                    </tr>
                @else
                    <tr>
                        <td>Inicio</td>
                        <td>{{ $data2['list']['multiRef']['dds_inicio']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Numero de Documento</td>
                        <td>{{ $data2['list']['multiRef']['dds_nrodoc']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Declaracion</td>
                        <td>{{ $data2['list']['multiRef']['declara']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Descripcion Comercio Exterior</td>
                        <td>{{ $data2['list']['multiRef']['desc_comext']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Descripcion Contabilidad</td>
                        <td>{{ $data2['list']['multiRef']['desc_contab']['$'] }}</td>
                    </tr>
                    <tr>
                        <td>Descripcion Facturacion</td>
                        <td>{{ $data2['list']['multiRef']['desc_factur']['$'] }}</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="2" class="bg-primary text-white text-center font-weight-bold">Otra Informacion del Contribuyente (Parte 2)</th>
                </tr>  
                <tr>
                    <td>Numero de Departamento</td>
                    <td>{{ $data3['list']['multiRef']['num_depar']['$'] }}</td>
                </tr>
                <tr>
                    <td>Numero de Fax</td>
                    <td>{{ $data3['list']['multiRef']['num_fax']['$'] }}</td>
                </tr>
                <tr>
                    <td>Numero de Kilometro</td>
                    <td>{{ $data3['list']['multiRef']['num_kilom']['$'] }}</td>
                </tr>
                <tr>
                    <td>Numero de Lote</td>
                    <td>{{ $data3['list']['multiRef']['num_lote']['$'] }}</td>
                </tr>
                <tr>
                    <td>Numero de Manzana</td>
                    <td>{{ $data3['list']['multiRef']['num_manza']['$'] }}</td>
                </tr>
            </tbody>
        </table>
        
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="2" class="bg-primary text-white text-center font-weight-bold">Domicilio Legal</th>
                </tr>  
                <tr>
                    <td>Domicilio Legal</td>
                    <td>{{ $data4['list']['getDomicilioLegalResponse']['getDomicilioLegalReturn']['$'] }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="2" class="bg-primary text-white text-center font-weight-bold">Establecimientos Anexos</th>
                </tr> 
                @if (isset($data5['list']['multiRef']))
                    @foreach ($data5['list']['multiRef'] as $data)
                        <tr>
                            <td>Codigo de Distrito</td>
                            <td>{{ $data['cod_dist']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Departamento</td>
                            <td>{{ $data['desc_dep']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Provincia</td>
                            <td>{{ $data['desc_prov']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Distrito</td>
                            <td>{{ $data['desc_dist']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Tipo de Establecimiento</td>
                            <td>{{ $data['desc_tipest']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Direccion</td>
                            <td>{{ $data['direccion']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Referencia</td>
                            <td>{{ $data['spr_refer1']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td>{{ $data['spr_nombre']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Fecha de Actualizacion</td>
                            <td>{{ $data['spr_fecact']['$'] }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="2" class="bg-primary text-white text-center font-weight-bold">Representantes Legales</th>
                </tr>
                @if($data6['list']['getRepLegalesResponse']['getRepLegalesReturn']['@arrayType'] == "xsd:anyType[0]")
                    <td>No hay datos para mostrar en este campo</td>
                @else
                    @if ($data6['list']['getRepLegalesResponse']['getRepLegalesReturn']['@arrayType'] != "xsd:anyType[1]")
                    @foreach ($data6['list']['multiRef'] as $data)
                        <tr>
                            <td>Documento de Identidad</td>
                            <td>{{ $data['desc_docide']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Numero de Documento</td>
                            <td>{{ $data['rso_nrodoc']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td>{{ $data['rso_nombre']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Fecha de Nacimiento</td>
                            <td
                            >{{ $data['rso_fecnac']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Cargo</td>
                            <td>{{ $data['rso_cargoo']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Fecha de Inicio</td>
                            <td>{{ $data['rso_vdesde']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Fecha de Actualizacion</td>
                            <td>{{ $data['rso_fecact']['$'] }}</td>
                        </tr>
                    @endforeach
                    @else
                        <tr>
                            <td>Documento de Identidad</td>
                            <td>{{ $data6['list']['multiRef']['desc_docide']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Numero de Documento</td>
                            <td>{{ $data6['list']['multiRef']['rso_nrodoc']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td>{{ $data6['list']['multiRef']['rso_nombre']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Fecha de Nacimiento</td>
                            <td
                            >{{ $data6['list']['multiRef']['rso_fecnac']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Cargo</td>
                            <td>{{ $data6['list']['multiRef']['rso_cargoo']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Fecha de Inicio</td>
                            <td>{{ $data6['list']['multiRef']['rso_vdesde']['$'] }}</td>
                        </tr>
                        <tr>
                            <td>Fecha de Actualizacion</td>
                            <td>{{ $data6['list']['multiRef']['rso_fecact']['$'] }}</td>
                        </tr>
                    @endif
                @endif
            </tbody>
        </table>
        </div>
        @endif       
</div>