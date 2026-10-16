<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('aprendices.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aprendices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación mínima (simulación de guardado)
        $data = $request->validate([
           'nombre' => ['required', 'string', 'max:120'],
           'documento' => ['required', 'string', 'max:40'],
           'correo' => ['required', 'email', 'max:120'],
        ]);

        return redirect()->route('aprendices.index')
            ->with('ok', 'Aprendiz recibido (simulado)');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404); // No usado en S2
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort(404); // No usado en S2
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        abort(404); // No usado en S2
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort(404); // No usado en S2
    }
}