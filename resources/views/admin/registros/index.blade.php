@extends('adminlte::page')

@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/admin/Eventos') }}">Eventos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Participantes inscritos</li>
    </ol>
</nav>
@stop

@section('content')

<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Control de Asistencia</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('RegAsist.asistencia', $evento_id) }}">
                @csrf
                <table id="example1" class="table table-striped table-bordered table-hover table-sm w-100">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Nombre Participante</th>
                            <th>Correo</th>
                            <th>Edad</th>
                            <th style="text-align: center;">Asistencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($participantes as $participante)
                        <tr>
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>{{ $participante->nombre }}</td>
                            <td>{{ $participante->email }}</td>
                            <td>{{ $participante->edad }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <select name="asistencia[{{ $participante->id }}]" class="form-control w-auto">
                                        <option value="Asistió">Asistió</option>
                                        <option value="Ausente" selected>Ausente</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Guardar Asistencias</button>
            </form>
        </div>
    </div>
    <!-- /.card -->
</div>
@stop

@section('css')
<style>
    /* Fondo transparente y sin borde en el contenedor */
    #example1_wrapper .dt-buttons {
        background-color: transparent;
        box-shadow: none;
        border: none;
        display: flex;
        justify-content: center;
        /* Centrar los botones */
        gap: 10px;
        /* Espaciado entre botones */
        margin-bottom: 15px;
        /* Separar botones de la tabla */
    }

    /* Estilo personalizado para los botones */
    #example1_wrapper .btn {
        color: #fff;
        /* Color del texto en blanco */
        border-radius: 4px;
        /* Bordes redondeados */
        padding: 5px 15px;
        /* Espaciado interno */
        font-size: 14px;
        /* TamaÃ±o de fuente */
    }

    /* Colores por tipo de botÃ³n */
    .btn-danger {
        background-color: #dc3545;
        border: none;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-info {
        background-color: #17a2b8;
        border: none;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #212529;
        border: none;
    }

    .btn-default {
        background-color: #6e7176;
        color: #212529;
        border: none;
    }
</style>
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 10,
            "language": {
                "emptyTable": "No hay informaciÃ³n",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Expositores",
                "infoEmpty": "Mostrando 0 a 0 de 0 Expositores",
                "infoFiltered": "(Filtrado de _MAX_ total Expositores)",
                "lengthMenu": "Mostrar _MENU_ Expositores",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ãšltimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            /*buttons: [{
                    text: '<i class="fas fa-copy"></i> COPIAR',
                    extend: 'copy',
                    className: 'btn btn-default'
                },
                {
                    text: '<i class="fas fa-file-pdf"></i> PDF',
                    extend: 'pdf',
                    className: 'btn btn-danger'
                },
                {
                    text: '<i class="fas fa-file-csv"></i> CSV',
                    extend: 'csv',
                    className: 'btn btn-info'
                },
                {
                    text: '<i class="fas fa-file-excel"></i> EXCEL',
                    extend: 'excel',
                    className: 'btn btn-success'
                },
                {
                    text: '<i class="fas fa-print"></i> IMPRIMIR',
                    extend: 'print',
                    className: 'btn btn-warning'
                }
            ]*/
        }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
    });
</script>
@stop