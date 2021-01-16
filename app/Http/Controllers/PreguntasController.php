<?php

namespace App\Http\Controllers;

use App\Models\preguntas;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    public function create_preguntas(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'requerida' => 'required|in:1,0'
        ]);

        $pregunta = new preguntas;
            $pregunta->descripcion = $request->descripcion;
            $pregunta->requerida = $request->requerida;

        if($pregunta->save())
        {
            return response()->json([
                'message' => 'pregunta creada con éxito!'
            ], 201);
        }
        else
        {
            return response()->json([
                'message' => 'Error al crear la pregunta'
            ], 404);
        }

    }

    public function create()
    {

        $title = 'Crear preguntas';

        return view('preguntas.crear_preguntas', compact('title'));
    }
}
