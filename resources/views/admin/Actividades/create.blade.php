@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/Eventos') }}">Actividades</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear Un Nueva Actividad</li>
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
                <form action="{{ url('/admin/Actividades/create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_evento_debug" name="id_evento_debug"
                                value="{{ $id_evento_seleccionado ?? '' }}" hiden> {{-- Usamos $id_evento_seleccionado como en la solución anterior --}}
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre_actividad">Nombre de la Acticvidad</label>
                                <input type="text" class="form-control" id="nombre_actividad" name="nombre_actividad"
                                    placeholder="Ingrese el nombre del evento" required>
                            </div>
                            @error('nombre_actividad')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción de la actividad</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                                    placeholder="Ingrese la descripción del evento" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tipo_actividad">Tipo de Actividad</label>
                                <select class="form-control" id="tipo_actividad" name="tipo_actividad" required>
                                    <option value="">Seleccione un tipo</option> {{-- Opción por defecto --}}
                                    <option value="ponencia" {{ old('tipo_actividad') == 'ponencia' ? 'selected' : '' }}>
                                        Ponencia/Presentación</option>
                                    <option value="sesion_interactiva"
                                        {{ old('tipo_actividad') == 'sesion_interactiva' ? 'selected' : '' }}>
                                        Sesión Interactiva</option>
                                    <option value="mesa_redonda"
                                        {{ old('tipo_actividad') == 'mesa_redonda' ? 'selected' : '' }}>
                                        Mesa Redonda/Panel de Discusión</option>
                                    <option value="demostracion_practica"
                                        {{ old('tipo_actividad') == 'demostracion_practica' ? 'selected' : '' }}>
                                        Demostración Práctica</option>
                                    <option value="workshop_practico"
                                        {{ old('tipo_actividad') == 'workshop_practico' ? 'selected' : '' }}>
                                        Workshop Práctico</option>
                                    <option value="sesion_preguntas_respuestas"
                                        {{ old('tipo_actividad') == 'sesion_preguntas_respuestas' ? 'selected' : '' }}>
                                        Sesión de Preguntas y Respuestas</option>
                                    <option value="networking"
                                        {{ old('tipo_actividad') == 'networking' ? 'selected' : '' }}>
                                        Sesión de Networking</option>
                                    <option value="presentacion_producto"
                                        {{ old('tipo_actividad') == 'presentacion_producto' ? 'selected' : '' }}>
                                        Presentación de Producto/Servicio</option>
                                    <option value="caso_estudio"
                                        {{ old('tipo_actividad') == 'caso_estudio' ? 'selected' : '' }}>
                                        Análisis de Caso de Estudio</option>
                                    <option value="debate" {{ old('tipo_actividad') == 'debate' ? 'selected' : '' }}>
                                        Debate</option>
                                    <option value="otro" {{ old('tipo_actividad') == 'otro' ? 'selected' : '' }}>
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
                                <label for="hora_inicio">Hora de Inicio de la actividad</label>
                                <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required
                                    value="{{ old('hora_inicio') }}"> {{-- ¡CORREGIDO AQUÍ! --}}
                            </div>
                            @error('hora_inicio')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hora_fin">Hora de Finalización de la actividad</label>
                                <input type="time" class="form-control" id="hora_fin" name="hora_fin" required
                                    value="{{ old('hora_fin') }}"> {{-- ¡CORREGIDO AQUÍ! --}}
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
                                <a href="{{ url('/admin/Eventos') }}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary btn-black">Guardar</button>
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
