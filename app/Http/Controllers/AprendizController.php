<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aprendiz;

class AprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Capturamos el término de búsqueda si existe en la URL (?search=...)
        $search = $request->get('search');

        // Consultamos filtrando por nombre, documento o correo
        $aprendices = Aprendiz::when($search, function ($query, $search) {
                return $query->where('nombre', 'like', "%{$search}%")
                             ->orWhere('documento', 'like', "%{$search}%")
                             ->orWhere('correo', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString(); // Mantiene el término de búsqueda durante la paginación

        return view('aprendices.index', compact('aprendices', 'search'));
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
        // Validación de datos
        $data = $request->validate([
           'nombre'    => ['required', 'string', 'max:120'],
           'documento' => ['required', 'string', 'max:40', 'unique:aprendizs,documento'],
           'correo'    => ['required', 'email', 'max:120', 'unique:aprendizs,correo'],
           'ficha_id'  => ['nullable', 'integer']
        ]);

        Aprendiz::create($data);

        return redirect()->route('aprendices.index')
            ->with('ok', 'Aprendiz guardado con éxito');
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