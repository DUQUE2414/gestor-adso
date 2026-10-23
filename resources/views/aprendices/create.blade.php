@extends('layouts.app')

@section('title', 'Nuevo Aprendiz')

@section('content')
<div style="max-width: 600px; margin: 30px auto; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); font-family: sans-serif;">
    <h1 style="margin-bottom: 20px; color: #333; font-size: 24px; border-bottom: 2px solid #f0f0f0; padding-bottom: 10px;">Registrar Nuevo Aprendiz</h1>

    <form action="{{ route('aprendices.store') }}" method="POST">
        @csrf

        <!-- Campo Nombre -->
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Nombre completo</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" required 
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            @error('nombre')
                <span style="color: #dc3545; font-size: 12px; display: block; margin-top: 4px;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Campo Documento -->
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Documento de Identidad</label>
            <input type="text" name="documento" value="{{ old('documento') }}" required 
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            @error('documento')
                <span style="color: #dc3545; font-size: 12px; display: block; margin-top: 4px;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Campo Correo -->
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Correo Electrónico</label>
            <input type="email" name="correo" value="{{ old('correo') }}" required 
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            @error('correo')
                <span style="color: #dc3545; font-size: 12px; display: block; margin-top: 4px;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Campo Ficha ID (Opcional) -->
        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold; color: #555;">Número de Ficha (Opcional)</label>
            <input type="number" name="ficha_id" value="{{ old('ficha_id') }}" 
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            @error('ficha_id')
                <span style="color: #dc3545; font-size: 12px; display: block; margin-top: 4px;">{{ $message }}</span>
            @enderror
        </div>

        <!-- Botones de Acción -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
            <a href="{{ route('aprendices.index') }}" style="color: #6c757d; text-decoration: none; font-size: 14px;">← Volver</a>
            <button type="submit" style="background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-weight: bold;">
                Guardar Aprendiz
            </button>
        </div>
    </form>
</div>
@endsection