@extends('layouts.plantilla2')

@section('title')
    <title>Inicio</title>
@endsection

@section('contenido')
<div class="accordion accordion-flush" id="accordionFlushExample">
  @foreach ($credenciales as $credencial)
    @if ($credencial->servicio == "reniec")
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
          RENIEC
        </button>
      </h2>
      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            <form action="{{ route('actualizacion', $credencial->id)}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="ippublica" value="NE">
                <input type="hidden" name="entidad" value="NE">
                <input type="hidden" name="mac" value="NE">
                <input type="hidden" name="servicio" value="reniec">
                <div class="mb-3">
                    <label for="usuario" class="form-label">USUARIO</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $credencial->usuario }}" required>
                </div>
                <div class="mb-3">
                    <label for="clave" class="form-label">CLAVE</label>
                    <input type="text" class="form-control" id="clave" name="clave" value="{{ $credencial->clave }}" required>
                </div>
                <div class="mb-3">
                    <label for="ruc" class="form-label">RUC</label>
                    <input type="text" class="form-control" id="ruc" name="ruc" value="{{ $credencial->ruc }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
      </div>
    </div>
    @endif

    @if ($credencial->servicio == "essalud")
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-heading3">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
          ESSALUD
        </button>
      </h2>
      <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <form action="{{ route('actualizacion', $credencial->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="ippublica" value="NE">
            <input type="hidden" name="entidad" value="NE">
            <input type="hidden" name="mac" value="NE">
            <input type="hidden" name="ruc" value="NE">
            <input type="hidden" name="servicio" value="essalud">
            <div class="mb-3">
                <label for="usuario" class="form-label">USUARIO</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $credencial->usuario }}" required>
            </div>
            <div class="mb-3">
                <label for="clave" class="form-label">CLAVE</label>
                <input type="text" class="form-control" id="clave" name="clave" value="{{ $credencial->clave }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
        </div>
      </div>
    </div>
    @endif
    @if ($credencial->servicio == "sunat")
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
          SUNAT
        </button>
      </h2>
      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            No requiere Credenciales
        </div>
      </div>
    </div>
    @endif
    @if ($credencial->servicio == "conadis")
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-heading4">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
          CONADIS
        </button>
      </h2>
      <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <form action="{{ route('actualizacion', $credencial->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="ippublica" value="NE">
            <input type="hidden" name="entidad" value="NE">
            <input type="hidden" name="mac" value="NE">
            <input type="hidden" name="ruc" value="NE">
            <input type="hidden" name="servicio" value="conadis">
            <div class="mb-3">
                <label for="usuario" class="form-label">USUARIO</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $credencial->usuario }}" required>
            </div>
            <div class="mb-3">
                <label for="clave" class="form-label">CLAVE</label>
                <input type="text" class="form-control" id="clave" name="clave" value="{{ $credencial->clave }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
        </div>
      </div>
    </div>
    @endif
    @if ($credencial->servicio == "mtc")
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-heading5">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
          MTC
        </button>
      </h2>
      <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            No requiere Credenciales
        </div>
      </div>
    </div>
    @endif
    @if ($credencial->servicio == "minedu")
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-heading6">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">
          MINEDU
        </button>
      </h2>
      <div id="flush-collapse6" class="accordion-collapse collapse" aria-labelledby="flush-heading6" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            No requiere Credenciales
        </div>
      </div>
    </div>
    @endif
    @if ($credencial->servicio == "pnp")
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-heading7">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse7" aria-expanded="false" aria-controls="flush-collapse7">
          PNP
        </button>
      </h2>
      <div id="flush-collapse7" class="accordion-collapse collapse" aria-labelledby="flush-heading7" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <form action="{{ route('actualizacion', $credencial->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="entidad" value="NE">
            <input type="hidden" name="servicio" value="pnp">
            <div class="mb-3">
                <label for="usuario" class="form-label">USUARIO</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $credencial->usuario }}" required>
            </div>
            <div class="mb-3">
                <label for="clave" class="form-label">CLAVE</label>
                <input type="text" class="form-control" id="clave" name="clave" value="{{ $credencial->clave }}" required>
            </div>
            <div class="mb-3">
              <label for="ippublica" class="form-label">IP PUBLICA</label>
              <input type="text" class="form-control" id="ippublica" name="ippublica" value="{{ $credencial->ippublica }}" required>
          </div>
          <div class="mb-3">
            <label for="mac" class="form-label">MAC</label>
            <input type="text" class="form-control" id="mac" name="mac" value="{{ $credencial->mac }}" required>
        </div>
        <div class="mb-3">
          <label for="ruc" class="form-label">DOCUMENTO DE CLIENTE FINAL</label>
          <input type="text" class="form-control" id="ruc" name="ruc" value="{{ $credencial->ruc }}" required>
      </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
        </div>
      </div>
    </div>
    @endif
    @if ($credencial->servicio == "pj")
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-heading8">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse8" aria-expanded="false" aria-controls="flush-collapse8">
          PODER JUDICIAL
        </button>
      </h2>
      <div id="flush-collapse8" class="accordion-collapse collapse" aria-labelledby="flush-heading8" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <form action="{{ route('actualizacion', $credencial->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="servicio" value="pj">
            <div class="mb-3">
                <label for="usuario" class="form-label">NOMBRE DE USUARIO</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $credencial->usuario }}" required>
            </div>
            <div class="mb-3">
                <label for="clave" class="form-label">DNI DE PERSONA CONSULTANTE</label>
                <input type="text" class="form-control" id="clave" name="clave" value="{{ $credencial->clave }}" required>
            </div>
            <div class="mb-3">
              <label for="ippublica" class="form-label">IP PUBLICA</label>
              <input type="text" class="form-control" id="ippublica" name="ippublica" value="{{ $credencial->ippublica }}" required>
          </div>
                <div class="mb-3">
                  <label for="mac" class="form-label">DIRECCION MAC</label>
                  <input type="text" class="form-control" id="mac" name="mac" value="{{ $credencial->mac }}" required>
              </div>
              <div class="mb-3">
                <label for="entidad" class="form-label">ENTIDAD CONSULTANTE</label>
                <input type="text" class="form-control" id="entidad" name="entidad" value="{{ $credencial->entidad }}" required>
            </div>
            <div class="mb-3">
              <label for="ruc" class="form-label">RUC</label>
              <input type="text" class="form-control" id="ruc" name="ruc" value="{{ $credencial->ippublica }}" required>
          </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
        </div>
      </div>
    </div>
    @endif
    @if ($credencial->servicio == "inpe")
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-heading9">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse9" aria-expanded="false" aria-controls="flush-collapse9">
          INPE
        </button>
      </h2>
      <div id="flush-collapse9" class="accordion-collapse collapse" aria-labelledby="flush-heading9" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <form action="{{ route('actualizacion', $credencial->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="entidad" value="NE">
            <input type="hidden" name="mac" value="NE">
            <input type="hidden" name="clave" value="NE">
            <input type="hidden" name="servicio" value="inpe">
            <div class="mb-3">
                <label for="usuario" class="form-label">USUARIO</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $credencial->usuario }}" required>
            </div>
            <div class="mb-3">
                <label for="ippublica" class="form-label">IP</label>
                <input type="text" class="form-control" id="ippublica" name="ippublica" value="{{ $credencial->ippublica }}" required>
            </div>
            <div class="mb-3">
              <label for="ruc" class="form-label">RUC</label>
              <input type="text" class="form-control" id="ruc" name="ruc" value="{{ $credencial->ruc }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
        </div>
      </div>
    </div>
    @endif
    @if ($credencial->servicio == "minsa")
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-heading10">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse10" aria-expanded="false" aria-controls="flush-collapse10">
          MINSA
        </button>
      </h2>
      <div id="flush-collapse10" class="accordion-collapse collapse" aria-labelledby="flush-heading10" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            No requiere Credenciales
        </div>
      </div>
    </div>
    @endif
    @if ($credencial->servicio == "sunedu")
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-heading11">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse11" aria-expanded="false" aria-controls="flush-collapse11">
          SUNEDU
        </button>
      </h2>
      <div id="flush-collapse11" class="accordion-collapse collapse" aria-labelledby="flush-heading11" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <form action="{{ route('actualizacion', $credencial->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="ruc" value="NE">
            <input type="hidden" name="servicio" value="sunedu">
            <div class="mb-3">
                <label for="usuario" class="form-label">USUARIO</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $credencial->usuario }}" required>
            </div>
            <div class="mb-3">
              <label for="clave" class="form-label">CLAVE</label>
              <input type="text" class="form-control" id="clave" name="clave" value="{{ $credencial->clave }}" required>
          </div>
            <div class="mb-3">
                <label for="entidad" class="form-label">ENTIDAD</label>
                <input type="text" class="form-control" id="entidad" name="entidad" value="{{ $credencial->entidad }}" required>
            </div>
            <div class="mb-3">
              <label for="mac" class="form-label">MAC</label>
              <input type="text" class="form-control" id="mac" name="mac" value="{{ $credencial->mac }}" required>
            </div>
            <div class="mb-3">
              <label for="ippublica" class="form-label">IP DEL SERVIDOR</label>
              <input type="text" class="form-control" id="ippublica" name="ippublica" value="{{ $credencial->ippublica }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
        </div>
      </div>
    </div>
    @endif
    @if ($credencial->servicio == "sunarp")
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-heading12">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse12" aria-expanded="false" aria-controls="flush-collapse12">
          SUNARP
        </button>
      </h2>
      <div id="flush-collapse12" class="accordion-collapse collapse" aria-labelledby="flush-heading12" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            <form action="{{ route('actualizacion', $credencial->id)}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="ruc" value="NE">
                <input type="hidden" name="ippublica" value="NE">
                <input type="hidden" name="entidad" value="NE">
                <input type="hidden" name="mac" value="NE">
                <input type="hidden" name="servicio" value="sunarp">
                <div class="mb-3">
                    <label for="usuario" class="form-label">USUARIO</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" value="{{ $credencial->usuario }}" required>
                </div>
                <div class="mb-3">
                    <label for="clave" class="form-label">CLAVE</label>
                    <input type="text" class="form-control" id="clave" name="clave" value="{{ $credencial->clave }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
      </div>
    </div>
    @endif
    @if ($credencial->servicio == "migraciones")
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-heading13">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse13" aria-expanded="false" aria-controls="flush-collapse13">
          MIGRACIONES
        </button>
      </h2>
      <div id="flush-collapse13" class="accordion-collapse collapse" aria-labelledby="flush-heading13" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            <form action="{{ route('actualizacion', $credencial->id)}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="ruc" value="NE">
                <input type="hidden" name="usuario" value="NE">
                <input type="hidden" name="clave" value="NE">
                <input type="hidden" name="servicio" value="migraciones">
                <div class="mb-3">
                    <label for="clave" class="form-label">Codigo de Institucion</label>
                    <input type="text" class="form-control" id="entidad" name="entidad" value="{{ $credencial->clave }}" required>
                </div>
                <div class="mb-3">
                  <label for="clave" class="form-label">MAC</label>
                  <input type="text" class="form-control" id="mac" name="mac" value="{{ $credencial->clave }}" required>
              </div>
              <div class="mb-3">
                <label for="clave" class="form-label">IP</label>
                <input type="text" class="form-control" id="ippublica" name="ippublica" value="{{ $credencial->clave }}" required>
            </div>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
      </div>
    </div>
    @endif
  @endforeach
    
  
</div>
@endsection