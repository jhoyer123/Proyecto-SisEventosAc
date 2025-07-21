@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/Expositores') }}">Usuarios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ver Usuario</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="col-md-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos del usuario</h3>

                <!-- /.card-tools -->
            </div>
            <div class="card-body" style="display: block;">


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Nombre del Usuario</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Ingrese el nombre del usuario" value="{{ $usuario->name }}" readonly>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Ingrese el correo electrónico" value="{{ $usuario->email }}" readonly>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select name="rol" id="rol" class="form-control" required>
                                <option value="administrador">Administrador</option>
                                <option value="control">Control</option>
                            </select>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="javascript:history.back()" class="btn btn-secondary">Regresar</a>
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
