<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class RegAsistController extends Controller
{
    /*public function index()
    {
        $expositores = Expositor::all();
        return view('admin.expositores.index', compact('expositores'));
    }*/

    public function control($id_evento)
    {
        // Llama al procedimiento almacenado con cursor
        $participantes = DB::select('CALL participantes_evento_cursor(?)', [$id_evento]);

        // Retorna los datos a la vista 'eventos.participantes'
        return view('admin.registros.index', [
            'participantes' => $participantes,
            'evento_id' => $id_evento
        ]);
    }

    public function asistencia(Request $request, $id_evento)
    {
        $asistencias = $request->input('asistencia');

        // ID del usuario que está registrando (rol de control)
        $id_control = Auth::user()->id; 

        // Registrar cada asistencia
        foreach ($asistencias as $id_participante => $estado) {
            DB::table('reg_asists')->insert([
                'id_evento'     => $id_evento,
                'id_participante' => $id_participante,
                'id_control'    => $id_control,
                'hora_ent'      => now(),
                'estado'        => $estado
            ]);
        }

        return redirect()->route('eventos.index')
            ->with('mensaje', 'Asistencias Registradas con Exito')
            ->with('icono', 'success');
    }
}
