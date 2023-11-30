<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Librería</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .delete-button, .update-button {
            background-color: #dc3545;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }

        .delete-button:hover, .update-button:hover {
            background-color: #bd2130;
        }

        form {
            width: 50%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        select {
            width: 70%;
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
        }

        button:hover {
            background-color: #217dbb;
        }
    </style>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Item</th>
                <th>Titulo</th>
                <th>Year</th>
                <th>Autor</th>
                <th>Acciones</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libreria as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->titulo }}</td>
                <td>{{ $item->year }}</td>
                <td>{{ $item->nombre }}</td>
                <td>
                    <form action="{{ url('datos', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="delete-button">Eliminar</button>
                    </form>
                </td>
                <td>
                    <form action="{{url('Actualizarlibro', $item->id)}}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" class="update-button">Actualizar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{url('filtrar')}}" method="GET">
        @csrf
        <select name="datoFiltrado" id="">
            @foreach($autores as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <button type="submit">Filtrar</button>
    </form>
</body>
</html>
