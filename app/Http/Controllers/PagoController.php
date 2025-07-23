<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pago;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagoController extends Controller
{


    public function index()
    {
        // Aquí puedes implementar la lógica para mostrar los pagos
        // Por ejemplo, obtener todos los pagos y pasarlos a una vista
        $pagos = Pago::all();

        return view('admin.pagos.index', compact('pagos'));
    }

    public function create($id_evento)
    {
        //$idEstudiante = Auth::id();

        $evento = Evento::findOrFail($id_evento);

        /*// Validar si ya está inscrito
        $yaInscrito = DB::select("SELECT verificar_inscripcion(?, ?) AS existe", [$idEstudiante, $id_evento])[0]->existe;

        if ($yaInscrito) {
            return back()->with('error', 'El estudiante ya está inscrito en este evento.');
        }
*/
        // Validar cupos disponibles antes de mostrar el formulario de pago
        if ($evento->cupo_disponible <= 0) {
            // Redirigir a la página anterior o a donde quieras con mensaje de error
            return redirect()->route('eventos.show', $evento->id_evento)
                ->with('error', 'Lo sentimos, no hay cupos disponibles para este evento.');
        }

        // El monto será el precio del evento
        $monto = $evento->precio;

        return view('admin.pagos.create', [
            'monto' => $monto,
            'evento' => $evento
        ]);
    }
}
