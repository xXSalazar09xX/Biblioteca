<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión de Autores</title>

    <!-- Agregar estilos CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 8px;
        }

        button:hover {
            background-color: #217dbb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .delete-button, .update-button {
            background-color: #e74c3c;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-button:hover, .update-button:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <form action="{{ url('autor') }}" method="post">
        @csrf
        <h1>Gestión de Autores</h1>
        <div>
            <label for="name">Nombre de autor:</label>
            <input type="text" name="nombre" required>
        </div>
        <div>
            <button type="submit">Registrar</button>
        </div>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Item</th>
                <th>Autor</th>
                <th>Acciones</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($autores as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nombre }}</td>
                <td>
                    <form action="{{ url('autor', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="delete-button">Eliminar</button>
                    </form>
                </td>
                <td>
                    <form action="{{url('autor', $item->id)}}" method="get">
                        @csrf
                        <button type="submit" class="update-button">Actualizar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
