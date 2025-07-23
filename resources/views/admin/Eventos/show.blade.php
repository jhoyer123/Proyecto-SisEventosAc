@extends('adminlte::page')

@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/admin/Eventos') }}">Eventos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ver Evento</li>
    </ol>
</nav>
@stop

@section('content')

<div class="col-md-9">
    @can('ver usuarios')
    @if ($asistenciasRegistradas)
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Resumen de Asistencias</h5>
            <p class="card-text">
                <strong>Asistentes confirmados:</strong> {{ $totalAsistentes }}
            </p>
        </div>
    </div>
    @else
    <div class="alert alert-info mt-3">
        📌 Aún no se ha tomado asistencia para este evento.
    </div>
    @endif
    @endcan
    <div class="card card-success">
        <div class="card-header">
            {{-- Mensaje de error si no hay cupos --}}
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
            @endif

            <h3 class="card-title">Información del Evento</h3>

            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">


            <div class="d-flex align-items-center justify-content-between mb-3">
                @can('ver usuarios')
                <a href="{{ route('inscripciones.showine', $evento->id_evento) }}"
                    class="btn btn-info me-3"> Ver Inscritos </a>
                @endcan
                <a href="{{ url('/admin/Eventos/Act/' . $evento->id_evento) }}"
                    class="btn btn-info me-3">Ver Actividades </a>
                <a href="{{ url('/admin/Eventos/Act/' . $evento->id_evento) }}"
                    class="btn btn-info me-3">Ver Expositores </a>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombre_evento">Nombre del evento</label>
                        <input type="text" class="form-control" id="nombre_evento" name="nombre_evento"
                            placeholder="Ingrese el nombre del evento" value=" {{ $evento->nombre_evento }}" readonly>
                    </div>
                    @error('nombre_evento')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="descripcion">Descripción del Evento</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                            placeholder="Ingrese la descripción del evento" readonly>{{ $evento->descripcion }}</textarea>
                    </div>
                </div>
                <!-- Este es el input select -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="tipo_evento">Tipo del Evento</label>
                        <select class="form-control" id="tipo_evento" name="tipo_evento" disabled>
                            <option value="conferencia" {{ $evento->tipo_evento == 'conferencia' ? 'selected' : '' }}>
                                Conferencia</option>
                            <option value="taller" {{ $evento->tipo_evento == 'taller' ? 'selected' : '' }}>Taller
                            </option>
                            <option value="seminario" {{ $evento->tipo_evento == 'seminario' ? 'selected' : '' }}>
                                Seminario</option>
                            <option value="webinar" {{ $evento->tipo_evento == 'webinar' ? 'selected' : '' }}>Webinar
                            </option>
                            <option value="otro" {{ $evento->tipo_evento == 'otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                    </div>
                </div>
                <!-- Aqui termina es el input select -->
                {{-- INICIO: Nuevo campo INPUT para Fecha del Evento --}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="fecha_evento">Fecha del Evento</label>
                        <input type="date" class="form-control" id="fecha_evento" name="fecha_evento"
                            value="{{ $evento->fecha_evento }}" readonly>
                    </div>
                    @error('fecha_evento')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                {{-- FIN: Nuevo campo INPUT para Fecha del Evento --}}

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="ubicacion">Ubicación del evento</label>
                        <input type="text" class="form-control" id="ubicacion" name="ubicacion"
                            placeholder="Ingrese la dirección donde se realizara el evento"
                            value=" {{ $evento->ubicacion }}" readonly>
                    </div>
                    @error('ubicacion')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>

                {{-- INICIO: Nuevo campo INPUT para Números (Enteros y Decimales) --}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="precio">Precio de Inscripción del Evento</label>
                        <input type="number" class="form-control" id="precio" name="precio"
                            placeholder="Ingrese el precio (ej. 10.50)" step="0.01" min="0"
                            value="{{ $evento->precio }}" readonly>
                    </div>
                    @error('precio')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>

                {{-- FIN: Nuevo campo INPUT para Números (Enteros y Decimales) --}}

                {{-- INICIO: Nuevo campo INPUT para Hora del Evento --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="hora_inicio">Hora de Inicio del Evento</label>
                        <input type="time" class="form-control" id="hora_inicio" name="hora_inicio"
                            value="{{ $evento->hora_inicio }}" readonly>
                    </div>
                    @error('hora_inicio')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>

                {{-- FIN: Nuevo campo INPUT para Hora del Evento --}}

                {{-- INICIO: Nuevo campo INPUT para Hora del Evento --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="hora_inicio">Hora de finalizacion del Evento</label>
                        <input type="time" class="form-control" id="hora_inicio" name="hora_inicio"
                            value="{{ $evento->hora_fin }}" readonly>
                    </div>
                    @error('hora_inicio')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>

                {{-- FIN: Nuevo campo INPUT para Hora del Evento --}}
            </div>
            <hr>
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center mb-3">
                    <a href="{{ url('/admin/Eventos') }}" class="btn btn-secondary">Regresar</a>

                    @if($yaInscrito)
                    <button class="btn btn-danger" disabled>Inscrito</button>
                    @else
                    <a href="{{ url('/admin/Pagos/create', $evento->id_evento) }}" class="btn btn-success">Inscribirse</a>
                    @endif
                    

                    @can('crear actividades')
                    <a href="{{ route('actividades.create', $evento->id_evento) }}"
                        class="btn btn-primary me-3"> Agregar Actividad </a>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#asignarExpositorModal">
                        Asignar Expositor
                    </button>
                    @endcan
                </div>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- DataTables JS y CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tablaExpositores').DataTable({
            "language": {
                "search": "Buscar expositor:",
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)"
            }
        });
    });
</script>



{{-- Modal aquí abajo --}}
@include('admin.modals.asignarExp')

@stop

@section('css')

@stop

@section('js')

@stop