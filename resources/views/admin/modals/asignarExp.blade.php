<!-- Modal -->
<div class="modal fade" id="asignarExpositorModal" tabindex="-1" aria-labelledby="asignarExpositorLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="asignarExpositorLabel">Asignar Expositor</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <table id="tablaExpositores" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Especialidad</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            @foreach($expositores as $expositor)
              <tr>
                <td>{{ $expositor->nombre }}</td>
                <td>{{ $expositor->especialidad }}</td>
                <td>
                  <form method="POST" action="{{ route('asignar.expositor') }}">
                    @csrf
                    <input type="hidden" name="id_evento" value="{{ $evento->id_evento }}">
                    <input type="hidden" name="id_expositor" value="{{ $expositor->id_expositor }}">
                    <input type="hidden" name="id_administrador" value="{{ auth()->user()->id }}">
                    <button type="submit" class="btn btn-sm btn-success">Asignar</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
