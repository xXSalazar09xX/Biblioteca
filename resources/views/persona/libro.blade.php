<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión de Libro</title>
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
            color: #3498db; /* Nuevo color para destacar */
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input, select {
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
            margin-right: 8px;
        }

        .delete-button:hover, .update-button:hover {
            background-color: #bd2130;
        }
    </style>
</head>
<body>
    <form action="{{ url('libros') }}" method="post">
        @csrf
        <h1>Gestión de Libro</h1>
        <div>
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required>
            <label for="year">Año:</label>
            <input type="text" name="year" required>
            <label for="autor_id">Autor:</label>
            <select id="autor_id" name="autor_id">
                @foreach($autores as $autor)
                    <option value="{{$autor->id}}">{{$autor->nombre}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <button><a href="{{url('datos')}}">Libros</a></button>
            <button type="submit">Registrar</button>
        </div>
    </form>
</body>
</html>
