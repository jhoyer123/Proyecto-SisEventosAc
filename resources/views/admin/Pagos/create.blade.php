@extends('adminlte::page')

@section('title', 'Registrar Pago')

@section('content_header')
    <h1>Registrar Pago</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Formulario de Pago</h3>
        </div>

        <form action="{{ route('inscripciones.store') }}" method="POST">
            @csrf

            <input type="hidden" name="id_evento" value="{{ $evento->id_evento }}">

            <input type="hidden" name="id_participante" value="{{ Auth::user()->id }}">

            <div class="card-body">

                <div class="form-group">
                    <label for="monto">Monto</label>
                    <input type="number" step="0.01" class="form-control" id="monto" name="monto"
                        value="{{ $monto }}" readonly>
                </div>

                <div class="form-group">
                    <label for="metodo_pago">Método de Pago</label>
                    <select class="form-control" id="metodo_pago" name="metodo_pago" required>
                        <option value="">Seleccione un método</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                        <option value="QR">QR</option>
                        <option value="Tarjeta de Débito/Crédito">Tarjeta de Débito/Crédito</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fecha_pago">Fecha de Pago</label>
                    <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" value="{{ date('Y-m-d') }}"
                        required readonly>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-money-bill-wave"></i> Registrar Pago
                </button>

                <a href="{{ url('/admin/Eventos') }}" class="btn btn-secondary ml-2">
                    <i class="fas fa-times-circle"></i> Cancelar
                </a>
            </div>
        </form>
    </div>

@stop
