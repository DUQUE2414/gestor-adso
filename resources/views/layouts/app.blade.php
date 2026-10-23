<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Gestor ADSO')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            max-width: 980px;
            margin: 24px auto;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #1e293b;
            background: #f8fafc;
            padding: 0 20px;
        }

        nav.app-header {
            background: #0f172a;
            padding: 16px 24px;
            border-radius: 8px;
            margin-bottom: 24px;
        }

        nav.app-header a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            margin-right: 16px;
        }

        nav.app-header a:hover {
            color: #38bdf8;
        }

        .flash {
            background: #f0fdf4;
            color: #166534;
            padding: 12px 16px;
            border-radius: 6px;
            border: 1px solid #bbf7d0;
            margin-bottom: 20px;
            font-size: 14px;
        }

        /* --- ESTILOS DE PAGINACIÓN CORREGIDOS Y FORZADOS --- */
        .paginacion-contenedor nav {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
        }

        /* Ocultar bloque responsive superior */
        .paginacion-contenedor nav > div:first-child {
            display: none !important;
        }

        /* Contenedor inferior */
        .paginacion-contenedor nav > div:last-child {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            gap: 10px !important;
            width: 100% !important;
        }

        /* Texto de resultados */
        .paginacion-contenedor nav p {
            font-size: 13px !important;
            color: #64748b !important;
            margin: 0 !important;
        }

        .paginacion-contenedor nav p span {
            border: none !important;
            padding: 0 !important;
            background: transparent !important;
            font-weight: 600 !important;
            color: #334155 !important;
            box-shadow: none !important;
        }

        /* Lista horizontal */
        .paginacion-contenedor ul {
            display: flex !important;
            list-style: none !important;
            padding: 0 !important;
            margin: 0 !important;
            gap: 6px !important;
            align-items: center !important;
        }

        .paginacion-contenedor li {
            list-style: none !important;
        }

        /* Botones generales (números y flechas) */
        .paginacion-contenedor ul a, 
        .paginacion-contenedor ul span {
            padding: 8px 12px !important;
            border: 1px solid #cbd5e1 !important;
            background: #ffffff !important;
            color: #334155 !important;
            border-radius: 6px !important;
            text-decoration: none !important;
            font-size: 14px !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            min-width: 36px;
            box-sizing: border-box;
        }

        /* Iconos SVG */
        .paginacion-contenedor ul svg {
            width: 14px !important;
            height: 14px !important;
            fill: currentColor;
        }

        /* PÁGINA ACTIVA FORZADA */
        .paginacion-contenedor ul [aria-current="page"] {
            background-color: #0f172a !important;
            color: #ffffff !important;
            border-color: #0f172a !important;
            font-weight: 700 !important;
        }

        /* Hover */
        .paginacion-contenedor ul a:hover {
            background: #f1f5f9 !important;
            color: #0f172a !important;
            border-color: #94a3b8 !important;
        }

        /* Desactivados */
        .paginacion-contenedor ul [aria-disabled="true"] {
            background: #f8fafc !important;
            color: #cbd5e1 !important;
            border-color: #e2e8f0 !important;
        }
    </style>
</head>

<body>
    <nav class="app-header">
        <a href="{{ route('aprendices.index') }}">Gestor ADSO</a>
    </nav>
    
    @if(session('ok'))
        <div class="flash">{{ session('ok') }}</div>
    @endif
    
    @yield('content')
</body>

</html>