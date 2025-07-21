<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;
use App\Models\Administrador;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;


class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return view('admin.eventos.index', compact('eventos'));
    }

    public function showAct($id_evento)
    {
        // 1. Encuentra el evento específico por su ID.
        $evento = Evento::findOrFail($id_evento);

        // 2. Accede a las actividades relacionadas.
        $actividades = $evento->actividades;

        // 3. Pasa tanto el evento como su colección de actividades a la vista.
        return view('admin.actividades.showin', compact('evento', 'actividades'));
    }

    public function create()
    {
        return view('admin.eventos.create');
    }

    //para guardar en las bases de datos
    public function store(Request $request)
    {

        //return response()->json(request()->all());
        $request->validate([
            'nombre_evento' => 'required|string|max:255',
            'descripcion' => 'required|string|max:300',
            'tipo_evento' => 'required|string|max:100',
            'fecha_evento' => 'required|date',
            'ubicacion' => 'required|string|max:255',
            'precio' => 'required|numeric|min:1',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
        ]);

        $evento = new Evento();
        $evento->nombre_evento = $request->nombre_evento;
        $evento->descripcion = $request->descripcion;
        $evento->tipo_evento = $request->tipo_evento;
        $evento->fecha_evento = $request->fecha_evento;
        $evento->ubicacion = $request->ubicacion;
        $evento->precio = $request->precio;
        $evento->hora_inicio = $request->hora_inicio;
        $evento->hora_fin = $request->hora_fin;
        $evento->id_administrador = Auth::user()->id; // Asignar el ID del administrador autenticado
        $evento->save();

        return redirect()->route('eventos.index')
            ->with('mensaje', 'Evento creado exitosamente')
            ->with('icono', 'success');
    }

    public function show($id_evento)
    {
        //return view('admin.expositores.create');
        //echo "$id";
        $evento = Evento::findOrFail($id_evento);
        //return response()->json($expositor);
        return view('admin.eventos.show', compact('evento'));
    }

    public function edit($id_evento)
    {
        //echo $id;
        $evento = Evento::findOrFail($id_evento);
        return view('admin.eventos.edit', compact('evento'));
    }

    public function update(Request $request, $id)
    {
        //return response()->json(request()->all());
        $request->validate([
            'nombre_evento' => 'required|string|max:255',
            'descripcion' => 'required|string|max:300',
            'tipo_evento' => 'required|string|max:100',
            'fecha_evento' => 'required|date',
            'ubicacion' => 'required|string|max:255',
            'precio' => 'required|numeric|min:1',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
        ]);

        $evento = Evento::findOrFail($id);
        $evento->nombre_evento = $request->nombre_evento;
        $evento->descripcion = $request->descripcion;
        $evento->tipo_evento = $request->tipo_evento;
        $evento->fecha_evento = $request->fecha_evento;
        $evento->ubicacion = $request->ubicacion;
        $evento->precio = $request->precio;
        $evento->hora_inicio = $request->hora_inicio;
        $evento->hora_fin = $request->hora_fin;
        //$evento->id_administrador = Auth::user()->id; // Asignar el ID del administrador autenticado
        $evento->save();

        return redirect()->route('eventos.index')
            ->with('mensaje', 'Datos actualizados exitosamente')
            ->with('icono', 'success');
    }

    public function destroy($id_evento)
    {
        $evento = Evento::findOrFail($id_evento);
        $evento->delete();
        return redirect()->route('eventos.index')
            ->with('mensaje', 'Evento eliminado exitosamente')
            ->with('icono', 'success');
    }
}
