<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrar Aprendiz</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 650px;
            margin: 30px auto;
            padding: 0 16px;
            color: #222;
        }

        label {
            display: block;
            margin-top: 16px;
            font-weight: bold;
        }

        input {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            margin-top: 6px;
        }

        button {
            margin-top: 20px;
            padding: 10px 16px;
            cursor: pointer;
        }

        .errors {
            background: #fde8e8;
            padding: 12px;
            margin-bottom: 20px;
        }

        .field-error {
            color: #a40000;
            display: block;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <h1>Registrar Aprendiz</h1>

    <a href="{{ route('aprendices.index') }}">
        Volver al listado
    </a>

    @if ($errors->any())
        <div class="errors">
            <strong>No se pudo registrar el aprendiz.</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('aprendices.store') }}"
        method="POST"
    >
        @csrf

        <label for="nombre">Nombre completo</label>

        <input
            type="text"
            id="nombre"
            name="nombre"
            maxlength="120"
            value="{{ old('nombre') }}"
            required
        >

        @error('nombre')
            <span class="field-error">{{ $message }}</span>
        @enderror

        <label for="documento">Documento</label>

        <input
            type="text"
            id="documento"
            name="documento"
            maxlength="40"
            value="{{ old('documento') }}"
            required
        >

        @error('documento')
            <span class="field-error">{{ $message }}</span>
        @enderror

        <label for="correo">Correo electrónico</label>

        <input
            type="email"
            id="correo"
            name="correo"
            maxlength="120"
            value="{{ old('correo') }}"
            required
        >

        @error('correo')
            <span class="field-error">{{ $message }}</span>
        @enderror

        <label for="ficha_id">Identificador de ficha (opcional)</label>

        <input
            type="number"
            id="ficha_id"
            name="ficha_id"
            min="1"
            value="{{ old('ficha_id') }}"
        >

        @error('ficha_id')
            <span class="field-error">{{ $message }}</span>
        @enderror

        <button type="submit">
            Guardar aprendiz
        </button>
    </form>

</body>
</html>