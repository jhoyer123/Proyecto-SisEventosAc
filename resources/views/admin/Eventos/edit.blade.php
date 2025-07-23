@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/Eventos') }}">Eventos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear Un Nuevo Evento</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="col-md-9">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos del Formulario</h3>

                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <form action="{{ route('eventos.update', $evento->id_evento) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre_evento">Nombre del evento</label>
                                <input type="text" class="form-control" id="nombre_evento" name="nombre_evento"
                                    placeholder="Ingrese el nombre del evento" value=" {{ $evento->nombre_evento }}"
                                    required>
                            </div>
                            @error('nombre_evento')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción del Evento</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                                    placeholder="Ingrese la descripción del evento" required>{{ $evento->descripcion }}</textarea>
                            </div>
                        </div>
                        <!-- Este es el input select -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tipo_evento">Tipo del Evento</label>
                                <select class="form-control" id="tipo_evento" name="tipo_evento" required>
                                    <option value="">Seleccione un tipo</option>
                                    <option value="conferencia"
                                        {{ $evento->tipo_evento == 'conferencia' ? 'selected' : '' }}>Conferencia</option>
                                    <option value="taller" {{ $evento->tipo_evento == 'taller' ? 'selected' : '' }}>Taller
                                    </option>
                                    <option value="seminario" {{ $evento->tipo_evento == 'seminario' ? 'selected' : '' }}>
                                        Seminario</option>
                                    <option value="webinar" {{ $evento->tipo_evento == 'webinar' ? 'selected' : '' }}>
                                        Webinar</option>
                                    <option value="otro" {{ $evento->tipo_evento == 'otro' ? 'selected' : '' }}>Otro
                                    </option>
                                </select>
                            </div>
                            @error('tipo_evento')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Aqui termina es el input select -->
                        {{-- INICIO: Nuevo campo INPUT para Fecha del Evento --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="fecha_evento">Fecha del Evento</label>
                                <input type="date" class="form-control" id="fecha_evento" name="fecha_evento" required
                                    value="{{ $evento->fecha_evento }}">
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
                                    value="{{ $evento->ubicacion }}" required>
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
                                    placeholder="Ingrese el precio (ej. 10.50)" step="0.01" min="0" required
                                    value="{{ $evento->precio }}"">
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
                                <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required
                                    value="{{ old('hora_inicio', \Carbon\Carbon::parse($evento->hora_inicio)->format('H:i')) }}">
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
                                    value="{{ old('hora_fin', \Carbon\Carbon::parse($evento->hora_fin)->format('H:i')) }}">
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
