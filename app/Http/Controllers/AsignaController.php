<?php

namespace App\Http\Controllers;

use App\Models\Asigna;
use Illuminate\Http\Request;

class AsignaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_administrador' => 'required|exists:administradores,id_administrador',
            'id_evento' => 'required|exists:eventos,id_evento',
            'id_expositor' => 'required|exists:expositores,id_expositor',
        ]);

        // Verificamos si ya está asignado este expositor al evento por este admin
        $existe = Asigna::where('id_evento', $request->id_evento)
            ->where('id_expositor', $request->id_expositor)
            ->where('id_administrador', $request->id_administrador)
            ->first();

        if ($existe) {
            return redirect()->back()->with('error', 'Este expositor ya fue asignado a este evento por el administrador.');
        }

        // Guardamos la asignación
        Asigna::create([
            'id_administrador' => $request->id_administrador,
            'id_evento' => $request->id_evento,
            'id_expositor' => $request->id_expositor,
        ]);

        return redirect()->back()
            ->with('mensaje', 'Expositor asignado exitosamente')
            ->with('icono', 'success');
    }
}
