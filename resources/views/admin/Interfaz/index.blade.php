<!-- resources/views/admin/sql_console.blade.php -->

<form action="{{ route('admin.sql_console.execute') }}" method="POST">
    @csrf
    <label for="query">Escriba su consulta SQL:</label>
    <textarea name="query" rows="5" class="form-control" placeholder="Ej: SELECT * FROM usuarios"></textarea>

    <button type="submit" class="btn btn-primary mt-2">Ejecutar</button>
</form>

@if(isset($results))
    <h3>Resultados:</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                @foreach(array_keys((array)$results[0]) as $column)
                    <th>{{ $column }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($results as $row)
                <tr>
                    @foreach((array)$row as $value)
                        <td>{{ $value }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if(isset($error))
    <div class="alert alert-danger mt-2">
        {{ $error }}
    </div>
@endif
