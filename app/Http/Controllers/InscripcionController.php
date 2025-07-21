<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Evento;
use App\Models\Participante;
use App\Models\Pago;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InscripcionController extends Controller
{
    /**
     * Almacena una nueva inscripción en la base de datos.
     */
    public function store(Request $request)
    {
        // 1. Validar los datos de entrada
        $request->validate([
            'id_participante' => 'required|exists:participantes,id_participante',
            'id_evento' => 'required|exists:eventos,id_evento',
            'metodo_pago' => 'required|string',
            'fecha_pago' => 'required|date',
        ]);

        // Iniciar la transacción
        try {
            DB::beginTransaction();

            // 2. Obtener el precio del evento
            $evento = Evento::findOrFail($request->id_evento);

            // 3. Crear el registro del Pago
            $pago = Pago::create([
                'monto' => $evento->precio, // El monto viene del evento
                'fecha_pago' => Carbon::now(),
                'metodo_pago' => $request->metodo_pago,
            ]);

            // Debug: para ver si tiene el ID
            if (!$pago->id_pago) {
                throw new \Exception('No se creó el pago correctamente, id_pago es null');
            }

            // 4. Crear la Inscripción y enlazar todo
            $inscripcion = Inscripcion::create([
                'fecha_inscripcion' => Carbon::now(),
                'id_participante' => $request->id_participante,
                'id_evento' => $request->id_evento,
                'id_pago' => $pago->id_pago, // Usamos el ID del pago recién creado
            ]);

            // Si todo salió bien, confirmamos la transacción
            DB::commit();

            // 5. Devolver una respuesta exitosa
            // Puedes cargar las relaciones para devolver una respuesta más completa
            $inscripcion->load('participante', 'evento', 'pago');

            /*return response()->json([
                'message' => '¡Inscripción realizada con éxito!',
                'data' => $inscripcion
            ], 201);*/
            return redirect()->route('eventos.index')
            ->with('mensaje', 'Inscripción realizada con éxito')
            ->with('icono', 'success');

        } catch (\Exception $e) {
            // Si algo falla, revertimos la transacción
            DB::rollBack();

            // Devolvemos un error
            return response()->json([
                'message' => 'Error al procesar la inscripción.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
