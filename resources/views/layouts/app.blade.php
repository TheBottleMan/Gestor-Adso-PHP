<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>@yield('title', 'Gestor ADSO')</title>


    <style>

        body {
            max-width: 1100px;
            margin: 24px auto;
            padding: 0 16px;
            font-family: Arial, sans-serif;
            color: #222;
        }

        nav {
            margin-bottom: 24px;
        }

        nav a,
        a {
            color: #006b3c;
        }

        .flash {
            background: #e8f7ee;
            border: 1px solid #9bd3ae;
            padding: 10px;
            margin: 12px 0;
        }

        .danger {
            background: #fff0f0;
            border: 1px solid #e0aaaa;
            padding: 10px;
            margin: 12px 0;
            color: #8b0000;
        }

        .field {
            margin-bottom: 14px;
        }

        .field label {
            display: block;
            font-weight: bold;
            margin-bottom: 4px;
        }

        input {
            box-sizing: border-box;
            padding: 8px;
            min-width: 280px;
            max-width: 100%;
        }

        .field input {
            width: 100%;
        }

        .field-error {
            display: block;
            margin-top: 5px;
            color: #a40000;
            font-size: 14px;
        }

        button,
        .button {
            display: inline-block;
            padding: 8px 12px;
            cursor: pointer;
        }

        .toolbar {
            display: flex;
            gap: 16px;
            align-items: center;
            justify-content: space-between;
            margin: 16px 0;
            flex-wrap: wrap;
        }

        .search-form {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-form input {
            min-width: 260px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
        }

        th,
        td {
            border: 1px solid #d7d7d7;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #f3f3f3;
        }

        .actions {
            white-space: nowrap;
        }

        .actions form {
            display: inline;
            margin-left: 8px;
        }

        .danger-button {
            color: #8b0000;
        }

        .pagination {
            margin-top: 18px;
        }

        .pagination svg,
        nav[role="navigation"] svg {
            width: 18px;
            height: 18px;
        }

        @media (max-width: 700px) {

            body {
                margin: 16px auto;
            }

            table {
                font-size: 12px;
            }

            th,
            td {
                padding: 5px;
            }

            .toolbar {
                align-items: flex-start;
            }

        }

    </style>

</head>


<body>


    <nav>

        <a href="{{ route('aprendices.index') }}">
            Aprendices
        </a>

    </nav>


    @if (session('ok'))

        <div class="flash">

            {{ session('ok') }}

        </div>

    @endif


    @yield('content')


</body>

</html>