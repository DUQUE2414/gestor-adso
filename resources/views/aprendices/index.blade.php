@extends('layouts.app')

@section('title', 'Lista de Aprendices')

@section('content')
<div style="max-width: 1100px; margin: 40px auto; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color: #1e293b;">
    
    <!-- Encabezado Principal -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; background: #0f172a; padding: 25px 30px; border-radius: 8px; color: white;">
        <div>
            <h1 style="margin: 0; font-size: 26px; font-weight: 600;">Gestión de Aprendices</h1>
            <p style="margin: 6px 0 0 0; color: #94a3b8; font-size: 14px;">Módulo de control y seguimiento ADSO</p>
        </div>
        <a href="{{ route('aprendices.create') }}" style="background: #2563eb; color: white; padding: 10px 18px; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 14px;">
            Nuevo Aprendiz
        </a>
    </div>

    <!-- Alerta de éxito -->
    @if(session('ok'))
        <div style="background: #f0fdf4; color: #166534; padding: 14px 18px; margin-bottom: 24px; border-radius: 6px; border: 1px solid #bbf7d0; font-size: 14px;">
            {{ session('ok') }}
        </div>
    @endif

    <!-- Tarjeta Contenedora Principal -->
    <div style="background: #ffffff; padding: 28px; border-radius: 8px; border: 1px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);">

        <!-- Formulario de Búsqueda -->
        <form method="GET" action="{{ route('aprendices.index') }}" style="margin-bottom: 24px; display: flex; gap: 12px;">
            <div style="flex: 1;">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Buscar por nombre, documento o correo electrónico..." 
                    style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; outline: none; box-sizing: border-box; background: #f8fafc;"
                    onfocus="this.style.borderColor='#2563eb'; this.style.background='#fff';"
                    onblur="this.style.borderColor='#cbd5e1'; this.style.background='#f8fafc';">
            </div>
            
            <button type="submit" style="background: #0f172a; color: white; border: none; padding: 0 20px; border-radius: 6px; font-weight: 600; font-size: 14px; cursor: pointer;">
                Buscar
            </button>

            @if(isset($search) && $search != '')
                <a href="{{ route('aprendices.index') }}" style="background: #f1f5f9; color: #475569; padding: 0 16px; text-decoration: none; border-radius: 6px; font-weight: 600; font-size: 14px; display: flex; align-items: center; justify-content: center; border: 1px solid #cbd5e1;">
                    Limpiar
                </a>
            @endif
        </form>

        <!-- Tabla de Datos -->
        @if($aprendices->count() > 0)
            <div style="overflow-x: auto; border-radius: 6px; border: 1px solid #e2e8f0;">
                <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                    <thead>
                        <tr style="background: #f8fafc; color: #475569; border-bottom: 2px solid #e2e8f0;">
                            <th style="padding: 12px 16px; font-weight: 600;">Nombre Completo</th>
                            <th style="padding: 12px 16px; font-weight: 600;">Documento</th>
                            <th style="padding: 12px 16px; font-weight: 600;">Correo Electrónico</th>
                            <th style="padding: 12px 16px; font-weight: 600; text-align: center;">Ficha</th>
                            <th style="padding: 12px 16px; font-weight: 600; text-align: center;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($aprendices as $a)
                        <tr style="border-bottom: 1px solid #f1f5f9;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 14px 16px; color: #1e293b; font-weight: 500;">
                                {{ $a->nombre }}
                            </td>
                            <td style="padding: 14px 16px; color: #64748b; font-family: monospace; font-size: 13px;">{{ $a->documento }}</td>
                            <td style="padding: 14px 16px; color: #64748b;">{{ $a->correo }}</td>
                            <td style="padding: 14px 16px; text-align: center;">
                                @if($a->ficha_id)
                                    <span style="background: #e0f2fe; color: #0369a1; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">
                                        {{ $a->ficha_id }}
                                    </span>
                                @else
                                    <span style="color: #cbd5e1;">—</span>
                                @endif
                            </td>
                            <td style="padding: 14px 16px; text-align: center; color: #94a3b8; font-size: 13px;">
                                —
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Contenedor de Paginación -->
            <div class="paginacion-contenedor" style="margin-top: 20px; display: flex; justify-content: center;">
                {{ $aprendices->links() }}
            </div>
        @else
            <!-- Estado Vacío -->
            <div style="text-align: center; padding: 40px 20px; color: #64748b;">
                <p style="font-size: 15px; font-weight: 500; color: #334155; margin-bottom: 4px;">No se encontraron registros</p>
                <p style="font-size: 13px; color: #94a3b8;">No hay aprendices disponibles con los criterios de búsqueda actuales.</p>
            </div>
        @endif

    </div>
</div>
@endsection