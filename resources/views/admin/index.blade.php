@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <!-- resources/views/admin/sql_console.blade.php -->

    <form action="{{ route('admin.sql_console.execute') }}" method="POST">
        @csrf
        <label for="query">Escriba su consulta SQL:</label>
        <textarea name="query" rows="8" class="form-control" placeholder="Ej: SELECT * FROM usuarios" style="resize: none;"></textarea>

        <button type="submit" class="btn btn-primary mt-2">Ejecutar</button>
    </form>

    @if (isset($results))
        <h3>Resultados:</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    @foreach (array_keys((array) $results[0]) as $column)
                        <th>{{ $column }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $row)
                    <tr>
                        @foreach ((array) $row as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    @if (isset($error))
        <div class="alert alert-danger mt-2">
            {{ $error }}
        </div>
    @endif

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
