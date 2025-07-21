@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/Eventos') }}">Actividades</a></li>
            <li class="breadcrumb-item active" aria-current="page">Actualizar Actividad</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="col-md-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos del Formulario</h3>

                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <form action="{{ route('actividades.update', $actividad->id_actividad) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre_actividad">Nombre de la Acticvidad</label>
                                <input type="text" class="form-control" value="{{ $actividad->nombre_actividad }}"
                                    id="nombre_actividad" name="nombre_actividad" placeholder="Ingrese el nombre del evento"
                                    required>
                            </div>
                            @error('nombre_actividad')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción de la actividad</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                                    placeholder="Ingrese la descripción del evento" required>{{ $actividad->descripcion }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tipo_actividad">Tipo de Actividad</label>
                                <select class="form-control" id="tipo_actividad" name="tipo_actividad" required>
                                    <option value="">Seleccione un tipo</option> {{-- Opción por defecto --}}
                                    <option value="ponencia"
                                        {{ $actividad->tipo_actividad == 'ponencia' ? 'selected' : '' }}>
                                        Ponencia/Presentación</option>
                                    <option value="sesion_interactiva"
                                        {{ $actividad->tipo_actividad == 'sesion_interactiva' ? 'selected' : '' }}>
                                        Sesión Interactiva</option>
                                    <option value="mesa_redonda"
                                        {{ $actividad->tipo_actividad == 'mesa_redonda' ? 'selected' : '' }}>
                                        Mesa Redonda/Panel de Discusión</option>
                                    <option value="demostracion_practica"
                                        {{ $actividad->tipo_actividad == 'demostracion_practica' ? 'selected' : '' }}>
                                        Demostración Práctica</option>
                                    <option value="workshop_practico"
                                        {{ $actividad->tipo_actividad == 'workshop_practico' ? 'selected' : '' }}>
                                        Workshop Práctico</option>
                                    <option value="sesion_preguntas_respuestas"
                                        {{ $actividad->tipo_actividad == 'sesion_preguntas_respuestas' ? 'selected' : '' }}>
                                        Sesión de Preguntas y Respuestas</option>
                                    <option value="networking"
                                        {{ $actividad->tipo_actividad == 'networking' ? 'selected' : '' }}>
                                        Sesión de Networking</option>
                                    <option value="presentacion_producto"
                                        {{ $actividad->tipo_actividad == 'presentacion_producto' ? 'selected' : '' }}>
                                        Presentación de Producto/Servicio</option>
                                    <option value="caso_estudio"
                                        {{ $actividad->tipo_actividad == 'caso_estudio' ? 'selected' : '' }}>
                                        Análisis de Caso de Estudio</option>
                                    <option value="debate" {{ $actividad->tipo_actividad == 'debate' ? 'selected' : '' }}>
                                        Debate</option>
                                    <option value="otro" {{ $actividad->tipo_actividad == 'otro' ? 'selected' : '' }}>
                                        Otro (Especificar)</option>
                                </select>
                            </div>
                            @error('tipo_actividad')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Aqui termina es el input select -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hora_inicio">Hora de Inicio del Evento</label>
                                <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required
                                    value="{{ old('hora_inicio', \Carbon\Carbon::parse($actividad->hora_inicio)->format('H:i')) }}">
                            </div>
                            @error('hora_inicio')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- FIN: Nuevo campo INPUT para Hora del Evento --}}

                        {{-- INICIO: Nuevo campo INPUT para Hora del Evento --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hora_fin">Hora de Finalizacion del Evento</label>
                                <input type="time" class="form-control" id="hora_fin" name="hora_fin" required
                                    value="{{ old('hora_fin', \Carbon\Carbon::parse($actividad->hora_fin)->format('H:i')) }}">
                            </div>
                            @error('hora_fin')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- FIN: Nuevo campo INPUT para Hora del Evento --}}
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/Actividades') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success btn-black">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
