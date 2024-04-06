@if($data6 != 0)


<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("imageForm").submit();
    });
</script>


<div class="modal" tabindex="-1" role="dialog" id="imageModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="imageModalBody">
            </div>
        </div>
    </div>
</div>
<script>
    function openImageFullscreen(base64Image) {

        var newWindow = window.open('', '_blank');

        newWindow.document.write('<html><head><title>Imagen</title></head><body style="margin: 0; overflow-y: auto;"><img src="data:image/jpeg;base64,' + base64Image + '" style="width: 100%; height: auto; display: block; margin: 0 auto;" /></body></html>');

        newWindow.moveTo(0, 0);
        newWindow.resizeTo(screen.width, screen.height);
    }

	function downloadImage(base64Image) {
        var link = document.createElement('a');
        link.href = 'data:image/jpeg;base64,' + base64Image;
        link.download = 'imagen.jpg';

        link.click();
    }
</script>
<script>
    function showImage(base64Image) {

        var modalBody = document.getElementById('imageModalBody');
        
        modalBody.innerHTML = '<img src="data:image/jpeg;base64,' + base64Image + '" style="max-width: 100%;" />';

        $('#imageModal').modal('show');
    }
</script>
   @switch($r)
        @case(1)
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">ID imagen de Asiento</th>
                    <th class="text-center">Numero de Pagina</th>
                    <th class="text-center">tipo</th>
                    <th class="text-center">Lista de Paginas</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td class="text-center">{{ $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['idImgAsiento'] }}</td>
                        <td class="text-center">{{ $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['numPag'] }}</td>
                        <td class="text-center">{{ $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['tipo'] }}</td>
                        <td>
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Numero de pagina de referencia</th>
                                        <th class="text-center">Pagina</th>
                        <th class="text-center" colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td class="text-center">{{$data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['listPag']['nroPagRef'] }}</td>
                                            <td class="text-center">{{ $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['listPag']['pagina'] }}</td>
        <td class="text-center">
        <button onclick="openImageFullscreen('{{ $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['listPag']['img'] }}')" type="button" class="btn btn-info mx-2"><img src="{{asset('imagenes/eye.png')}}"  width="26" height="26"></button>
        </td><td class="text-center"><button onclick="downloadImage('{{ $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['listPag']['img'] }}')" type="button" class="btn btn-success mx-2"><img src="{{asset('imagenes/descarga.png')}}"  width="26" height="26"></button>
        </td>                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr><td colspan="4"><form action="{{route('pdf')}}" method="POST">
                        @csrf
                        <input type="hidden" name="zon" value="{{$busqueda[0]}}">
                        <input type="hidden" name="par" value="{{$busqueda[1]}}">
                        <input type="hidden" name="reg" value="{{$busqueda[2]}}">
                        <input type="hidden" name="ofi" value="{{$busqueda[3]}}">
                        <button type="submit" class="btn btn-success w-100 m-0">Generar PDF</button>
                    </form></td></tr>
            </tbody>
        </table>
           @break
        @case(2)
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">ID imagen de Asiento</th>
                    <th class="text-center">Numero de Pagina</th>
                    <th class="text-center">tipo</th>
                    <th class="text-center">Lista de Paginas</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td class="text-center">{{ $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['idImgAsiento'] }}</td>
                        <td class="text-center">{{ $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['numPag'] }}</td>
                        <td class="text-center">{{ $data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['tipo'] }}</td>
                        <td>
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Numero de pagina de referencia</th>
                                        <th class="text-center">Pagina</th>
                        <th class="text-center" colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos']['listPag'] as $pagina)
                                        <tr>
                                            <td class="text-center">{{ $pagina['nroPagRef'] }}</td>
                                            <td class="text-center">{{ $pagina['pagina'] }}</td>
        <td class="text-center">
        <button onclick="openImageFullscreen('{{ $pagina['img'] }}')" type="button" class="btn btn-info mx-2"><img src="{{asset('imagenes/eye.png')}}"  width="26" height="26"></button>
        </td><td class="text-center"><button onclick="downloadImage('{{ $pagina['img'] }}')" type="button" class="btn btn-success mx-2"><img src="{{asset('imagenes/descarga.png')}}"  width="26" height="26"></button>
        </td>                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr><td colspan="4"><form action="{{route('pdf')}}" method="POST">
                        @csrf
                        <input type="hidden" name="zon" value="{{$busqueda[0]}}">
                        <input type="hidden" name="par" value="{{$busqueda[1]}}">
                        <input type="hidden" name="reg" value="{{$busqueda[2]}}">
                        <input type="hidden" name="ofi" value="{{$busqueda[3]}}">
                        <button type="submit" class="btn btn-success w-100 m-0">Generar PDF</button>
                    </form></td></tr>
            </tbody>
        </table>
           @break
        @case(3)
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">ID imagen de Asiento</th>
                    <th class="text-center">Numero de Pagina</th>
                    <th class="text-center">tipo</th>
                    <th class="text-center">Lista de Paginas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos'] as $asientos)
                    <tr>
                        <td class="text-center">{{ $asientos['idImgAsiento'] }}</td>
                        <td class="text-center">{{ $asientos['numPag'] }}</td>
                        <td class="text-center">{{ $asientos['tipo'] }}</td>
                        <td>
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Numero de pagina de referencia</th>
                                        <th class="text-center">Pagina</th>
                        <th class="text-center" colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td class="text-center">{{ $asientos['listPag']['nroPagRef'] }}</td>
                                            <td class="text-center">{{ $asientos['listPag']['pagina'] }}</td>
        <td class="text-center">
        <button onclick="openImageFullscreen('{{ $asientos['listPag']['img'] }}')" type="button" class="btn btn-info mx-2"><img src="{{asset('imagenes/eye.png')}}"  width="26" height="26"></button>
        </td><td class="text-center"><button onclick="downloadImage('{{ $asientos['listPag']['img'] }}')" type="button" class="btn btn-success mx-2"><img src="{{asset('imagenes/descarga.png')}}"  width="26" height="26"></button>
        </td>                                </tr>
    
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
                <tr><td colspan="4"><form id="pdfForm" action="{{route('pdf')}}" method="POST">
                    @csrf
                    <input type="hidden" name="zon" value="{{$busqueda[0]}}">
                    <input type="hidden" name="par" value="{{$busqueda[1]}}">
                    <input type="hidden" name="reg" value="{{$busqueda[2]}}">
                    <input type="hidden" name="ofi" value="{{$busqueda[3]}}">
                    <button type="submit" class="btn btn-success w-100 m-0">Generar PDF</button>
                </form></td></tr>
            </tbody>
        </table>
           @break
        @case(4)
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">ID imagen de Asiento</th>
                    <th class="text-center">Numero de Pagina</th>
                    <th class="text-center">tipo</th>
                    <th class="text-center">Lista de Paginas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data6['listarAsientosSIRSARPResponse']['asientos']['listAsientos'] as $asientos)
                    <tr>
                        <td class="text-center">{{ $asientos['idImgAsiento'] }}</td>
                        <td class="text-center">{{ $asientos['numPag'] }}</td>
                        <td class="text-center">{{ $asientos['tipo'] }}</td>
                        <td>
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Numero de pagina de referencia</th>
                                        <th class="text-center">Pagina</th>
                        <th class="text-center" colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($asientos['listPag'] as $pagina)
                                        <tr>
                                            <td class="text-center">{{ $pagina['nroPagRef'] }}</td>
                                            <td class="text-center">{{ $pagina['pagina'] }}</td>
        <td class="text-center">
        <button onclick="openImageFullscreen('{{ $pagina['img'] }}')" type="button" class="btn btn-info mx-2"><img src="{{asset('imagenes/eye.png')}}"  width="26" height="26"></button>
        </td><td class="text-center"><button onclick="downloadImage('{{ $pagina['img'] }}')" type="button" class="btn btn-success mx-2"><img src="{{asset('imagenes/descarga.png')}}"  width="26" height="26"></button>
        </td>                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
                <tr><td colspan="4"><form action="{{route('pdf')}}" method="POST">
                    @csrf
                    <input type="hidden" name="zon" value="{{$busqueda[0]}}">
                    <input type="hidden" name="par" value="{{$busqueda[1]}}">
                    <input type="hidden" name="reg" value="{{$busqueda[2]}}">
                    <input type="hidden" name="ofi" value="{{$busqueda[3]}}">
                    <button type="submit" class="btn btn-success w-100 m-0">Generar PDF</button>
                </form></td></tr>
            </tbody>
        </table>
        
            @break
       @default
           
   @endswitch
@else
    <p>No hay datos disponibles</p>
@endif

<script>
    function openPdfInNewWindow() {
        var newWindow = window.open('', '_blank');
        
        document.getElementById("pdfForm").submit();
    }
</script>



