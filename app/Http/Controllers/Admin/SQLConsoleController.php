<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SQLConsoleController extends Controller
{
    /*public function __construct()
    {
        // Solo usuarios con rol admin pueden acceder (ajusta esto según tu sistema de roles)
        $this->middleware('can:admin');
    }*/

    /**
     * Muestra la interfaz para escribir consultas SQL
     */
    public function index()
    {
        return view('admin.index');
    }

    public function execute(Request $request)
    {
        $request->validate([
            'query' => 'required|string'
        ]);

        $query = trim($request->input('query'));

        try {
            // Detectar si la consulta es SELECT o no
            if (str_starts_with(strtolower($query), 'select')) {

                $results = DB::select($query);

                if (empty($results)) {
                    return view('admin.index', [
                        'results' => [],
                        'message' => 'Consulta SELECT ejecutada correctamente, pero no se encontraron registros.'
                    ]);
                }

                return view('admin.index', [
                    'results' => $results
                ]);
            } else {
                // Para INSERT, UPDATE, DELETE, etc.
                DB::statement($query);

                return view('admin.index', [
                    'message' => '✅ Consulta ejecutada correctamente (INSERT, UPDATE o DELETE).'
                ]);
            }
        } catch (\Exception $e) {
            return view('admin.index', [
                'error' => '⚠️ Error al ejecutar la consulta: ' . $e->getMessage()
            ]);
        }
    }


    /**
     * Ejecuta la consulta SQL enviada desde el formulario
     */
    /*public function execute(Request $request)
    {
        $request->validate([
            'query' => 'required|string'
        ]);

        $query = trim($request->input('query'));
/*
        // Seguridad básica: permitir solo SELECT
        if (!str_starts_with(strtolower($query), 'select')) {
            return view('admin.index', [
                'error' => '❌ Solo se permiten consultas SELECT por seguridad.'
            ]);
        }

        try {
            $results = DB::select($query);

            // Si no hay resultados, avisar al usuario
            if (empty($results)) {
                return view('admin.index', [
                    'results' => [],
                    'message' => 'Consulta ejecutada correctamente, pero no se encontraron registros.'
                ]);
            }

            return view('admin.index', [
                'results' => $results
            ]);
        } catch (\Exception $e) {
            return view('admin.index    ', [
                //'error' => '⚠️ Error al ejecutar la consulta: ' . $e->getMessage()
            ]);
        }
    }*/
}
