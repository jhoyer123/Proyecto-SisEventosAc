@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/Users') }}">Usuarios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de Usuarios</li>
        </ol>
    </nav>
@stop

@section('content')

    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Usuarios Registrados En El Sistema</h3>

                <div class="card-tools">
                    <a class="btn btn-primary" href="{{ url('/admin/Users/create') }}">Agregar nuevo</a>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Fecha Registro</th>
                            <th style="text-align: center"  >Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td>{{ $usuario->user->name}}</td>
                                <td>{{ $usuario->user->email }}</td>
                                <td>{{ $usuario->user->created_at }}</td>
                                <td style="text-align: center">
                                    <!-- botones de acción aquí -->
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/admin/Users/' . $usuario->user->id) }}"
                                            class="btn btn-info"><i class="fas fa-eye"> Ver</i></a>
                                        <a href="{{ url('/admin/Expositores/' . $usuario->id_expositor) . '/edit' }}"
                                            class="btn btn-success"><i class="fas fa-pencil-alt"> Editar</i></a>
                                        <form action="{{ url('/admin/Expositores/' . $usuario->id_expositor) }}"
                                            id="miformulario{{ $usuario->id_expositor }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="preguntar{{ $usuario->id_expositor }}(event)">
                                                <i class="fas fa-trash-alt"></i>Eliminar</button>
                                        </form>
                                        <script>
                                            function preguntar{{ $usuario->id_expositor }}(event) {
                                                event.preventDefault(); // Evita que se envíe el formulario inmediatamente
                                                Swal.fire({
                                                    title: "¿Desea Eliminar este Registro?",
                                                    text: "",
                                                    icon: "question",
                                                    showCancelButton: true,
                                                    confirmButtonColor: "#3085d6",
                                                    cancelButtonColor: "#d33",
                                                    confirmButtonText: "Si, Eliminar!",
                                                    denyButtonText: "No, Cancelar"
                                                }).then((result) => {
                                                    if (result.isConfirmed) {

                                                        document.getElementById('miformulario{{ $usuario->id_expositor }}').submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
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
        /*$(function (){
                                        $("#example1").DataTable({
                                            "responsive":true,
                                            "lengthChange": false,
                                            "autoWidth": false,
                                            "bottons":["copy","cvs","excel","pdf","print","colvis"],
                                            "language":{
                                                "url": "{{ asset('plugins/datatables/lang/es.json') }}"
                                            }
                                        }).bottons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
                                    });*/
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
                buttons: [{
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
                ]
            }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
        });
    </script>
@stop
