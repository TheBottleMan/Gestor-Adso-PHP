<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Listado de Aprendices</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 16px;
            color: #222;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #f2f2f2;
        }

        .success {
            padding: 12px;
            background: #e5f7e9;
            margin: 15px 0;
        }

        .button {
            display: inline-block;
            padding: 10px 14px;
            background: #e8eefc;
            text-decoration: none;
            color: #173f8a;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <h1>Listado de Aprendices</h1>

    <a href="{{ route('aprendices.create') }}" class="button">
        Registrar aprendiz
    </a>

    @if (session('ok'))
        <div class="success">
            {{ session('ok') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Correo</th>
                <th>Ficha</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($aprendices as $aprendiz)
                <tr>
                    <td>{{ $aprendiz->id }}</td>
                    <td>{{ $aprendiz->nombre }}</td>
                    <td>{{ $aprendiz->documento }}</td>
                    <td>{{ $aprendiz->correo }}</td>
                    <td>
                        {{ $aprendiz->ficha_id ?? 'Sin asignar' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        No hay aprendices registrados.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{ $aprendices->links() }}
    </div>

</body>
</html>