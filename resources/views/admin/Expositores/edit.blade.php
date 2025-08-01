@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/Expositores') }}">Expositores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar Expositor</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="col-md-5">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Llene los datos del Formulario</h3>

                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <form action="{{ url('/admin/Expositores/'.$expositor->id_expositor) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre del expositor</label>
                                <input type="text" value="{{ $expositor->nombre}}" class="form-control" id="nombre" name="nombre"
                                    placeholder="Ingrese el nombre del expositor" required>
                            </div>
                            @error('nombre')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="especialidad">Especialidad del expositor</label>
                                <input type="text" value="{{ $expositor->especialidad}}" class="form-control" id="especialidad" name="especialidad"
                                    placeholder="Ingrese el nombre del expositor" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="biografia">Biografía del expositor</label>
                                <textarea class="form-control" id="biografia" name="biografia" rows="5"
                                    placeholder="Ingrese la biografía del expositor" required>{{ $expositor->biografia }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/Expositores') }}" class="btn btn-secondary">Cancelar</a>
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
