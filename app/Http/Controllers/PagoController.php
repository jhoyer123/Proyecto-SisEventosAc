<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pago;
use App\Models\Evento;

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
        $evento = Evento::findOrFail($id_evento);

        // El monto será el precio del evento
        $monto = $evento->precio;

        return view('admin.pagos.create', [
            'monto' => $monto,
            'evento' => $evento
        ]);
    }
}
