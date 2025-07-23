<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Evento;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actividades = Actividad::all();
        return view('admin.actividades.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     */
     // ... otros métodos ...

    /**
     * Show the form for creating a new resource, optionally for a specific event.
     * @param Request $request
     * @param int|null $id_evento El ID del evento, si se pasa como parámetro de ruta.
     */
    public function create(Request $request, $id_evento = null)
    {
        // Si el ID del evento viene como parámetro de ruta (ej. /create/2)
        $id_evento_seleccionado = $id_evento;

        // Si el ID del evento viene como parámetro de consulta (ej. /create?id_evento=2)
        // Esto es un fallback si decides usar el query parameter en algún otro lugar.
        if (!$id_evento_seleccionado && $request->has('id_evento')) {
            $id_evento_seleccionado = $request->query('id_evento');
        }

        $evento_seleccionado = null;
        if ($id_evento_seleccionado) {
            $evento_seleccionado = Evento::find($id_evento_seleccionado);
        }

        // Pasa ambas variables a la vista
        return view('admin.actividades.create', compact('id_evento_seleccionado', 'evento_seleccionado'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_actividad' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'tipo_actividad' => 'required|string|max:100',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
            'id_evento_debug' => 'required|exists:eventos,id_evento', // Este es el campo del input hidden
        ]);

        $actividad = new Actividad();
        $actividad->nombre_actividad = $request->nombre_actividad;
        $actividad->descripcion = $request->descripcion;
        $actividad->tipo_actividad = $request->tipo_actividad;
        $actividad->hora_inicio = $request->hora_inicio;
        $actividad->hora_fin = $request->hora_fin;
        $actividad->id_evento = $request->id_evento_debug; // ¡CORREGIDO! Debe ser $request->id_evento, no id_evento_debug

        $actividad->save();

        // ¡CORREGIDO! Redirige usando $request->id_evento, no id_evento_debug
        return redirect()->route('eventos.showAct', ['id_evento' => $request->id_evento_debug])
            ->with('mensaje', 'Actividad creada exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_actividad)
    {
        //return view('admin.expositores.create');
        //echo "$id";
        $actividad = Actividad::findOrFail($id_actividad);
        //return response()->json($expositor);
        return view('admin.actividades.show', compact('actividad'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Aquí puedes implementar la lógica para editar una actividad específica.
        // Por ejemplo, buscar la actividad por ID y pasarla a una vista de edición.
        $actividad = Actividad::findOrFail($id);
        return view('admin.actividades.edit', compact('actividad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_actividad' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'tipo_actividad' => 'required|string|max:100',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
        ]);

        $actividad = Actividad::findOrFail($id);
        $actividad->nombre_actividad = $request->nombre_actividad;
        $actividad->descripcion = $request->descripcion;
        $actividad->tipo_actividad = $request->tipo_actividad;
        $actividad->hora_inicio = $request->hora_inicio;
        $actividad->hora_fin = $request->hora_fin;
        //$actividad->id_evento = $request->id_evento_debug; // ¡CORREGIDO! Debe ser $request->id_evento, no id_evento_debug

        $actividad->save();

        return redirect()->route('actividades.index')
            ->with('mensaje', 'Actividad actualizada exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $actividad = Actividad::findOrFail($id);
        $actividad->delete();

        return redirect()->route('actividades.index')
            ->with('mensaje', 'Actividad eliminada exitosamente')
            ->with('icono', 'success');
    }
}
