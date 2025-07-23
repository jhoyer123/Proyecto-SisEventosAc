<?php

namespace App\Http\Controllers;

use App\Models\Expositor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpositorController extends Controller
{
    public function index()
    {
        $expositores = Expositor::all();
        return view('admin.expositores.index', compact('expositores'));
    }

    public function showExp()
    {
        $expositores = Expositor::all();
        return view('admin.modals.asignarExp', compact('expositores'));
    }

    public function create()
    {
        return view('admin.expositores.create');
    }

    //para guardar en las bases de datos
    public function store(Request $request)
    {
        //return response()->json(request()->all());
        $request->validate([
            'nombre' => 'required|string|max:255',
            'biografia' => 'required|string|max:1000',
            'especialidad' => 'required|string|max:255',
        ]);

        $expositor = new Expositor();
        $expositor->nombre = $request->nombre;
        $expositor->especialidad = $request->especialidad;
        $expositor->biografia = $request->biografia;
        $expositor->save();

        return redirect()->route('expositores.index')
            ->with('mensaje', 'Expositor creado exitosamente')
            ->with('icono', 'success');
    }

    public function show($id)
    {
        //return view('admin.expositores.create');
        //echo "$id";
        $expositor = Expositor::findOrFail($id);
        //return response()->json($expositor);
        return view('admin.expositores.show', compact('expositor'));
    }

    public function edit($id)
    {
        //echo $id;
        $expositor = Expositor::findOrFail($id);
        return view('admin.expositores.edit', compact('expositor'));
    }

    public function update(Request $request, $id)
    {
        //return response()->json(request()->all());
        $request->validate([
            'nombre' => 'required|string|max:255',
            'biografia' => 'required|string|max:255',
            'especialidad' => 'required|string|max:1000',
        ]);

        $expositor = Expositor::findOrFail($id);
        $expositor->nombre = $request->nombre;
        $expositor->especialidad = $request->especialidad;
        $expositor->biografia = $request->biografia;
        $expositor->save();

        return redirect()->route('expositores.index')
            ->with('mensaje', 'Datos actualizados exitosamente')
            ->with('icono', 'success');
    }

    public function destroy($id)
    {
        $expositor = Expositor::findOrFail($id);
        $expositor->delete();
        return redirect()->route('expositores.index')
            ->with('mensaje', 'Expositor eliminado exitosamente')
            ->with('icono', 'success');
    }
}
