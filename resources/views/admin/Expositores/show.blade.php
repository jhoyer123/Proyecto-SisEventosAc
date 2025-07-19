@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/Expositores') }}">Expositores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ver Expositor</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="col-md-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos Del Expositor</h3>

                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre del expositor</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Ingrese el nombre del expositor" value="{{ $expositor->nombre }}" readonly>
                            </div>
                            @error('nombre')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="especialidad">Especialidad del expositor</label>
                                <input type="text" class="form-control" id="especialidad" name="especialidad"
                                    placeholder="Ingrese el nombre del expositor" value="{{ $expositor->especialidad }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="biografia">Biografía del expositor</label>
                                <textarea class="form-control" id="biografia" name="biografia" rows="5"
                                    placeholder="Ingrese la biografía del expositor" readonly>{{ $expositor->biografia }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/Expositores') }}" class="btn btn-secondary">Regresar</a>
                            </div>
                        </div>
                    </div>
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
