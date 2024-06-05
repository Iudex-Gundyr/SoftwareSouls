<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Herramientas</title>
    <script>
        window.confirmarEliminacion = function(url) {
        if (confirm('¿Estás seguro de que deseas eliminar esta herramienta?')) {
            window.location.href = url;
        }
        };
    </script>
</head>
<body>
    @stack('scripts-bottom')
    @include('Administrador/navbar')
    <form action="{{url('/subirHerramienta')}}" method="post" enctype="multipart/form-data">
        @csrf
        <br>Nombre Herramienta<br>
        <input type="text" name="NombreHerramienta" value="{{old('NombreHerramienta')}}" placeholder="Nombre de la herramienta">
        <br>Descripcion de la herramienta<br>
        <input type="text" name="DescripcionH" value="{{old('DescripcionH')}}" placeholder="Descripcion de la herramienta">
        <br>Fotografía Herramienta <br>
        <input type="file" name="Fotografia" accept=".png, .jpg">
        <br>
        <button type="submit">Registrar</button>
        @if ($errors->any())
        @foreach ($errors ->all() as $error)
            {{$error}}
        @endforeach
    @endif

    @if(session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
    </form>



    <table>
        <thead>
            <tr>
                <th>Nombre de la Herramienta</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Herramientas as $Herramienta)
                <tr>
                    <td>{{ $Herramienta->NombreHerramienta }}</td>
                    <td>{{ $Herramienta->DescripcionH }}</td>
                    <td>
                        @if($Herramienta->Fotografia)
                            <img src="data:image/png;base64,{{ base64_encode($Herramienta->Fotografia) }}" alt="Fotografia" style="max-width: 100px;">
                        @else
                            <p>No hay imagen disponible</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('modificarHerramienta', ['id' => $Herramienta->ID_Herramientas]) }}">Modificar</a>
                        <button onclick="confirmarEliminacion('{{ route('eliminarHerramienta', ['id' => $Herramienta->ID_Herramientas]) }}')">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
<style>
    form {
        color: white;
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #4b1111;
        border-radius: 5px;
        background-color: rgba(36, 10, 10, 0.871);
    }

    form input[type="text"],
    form input[type="file"],
    form button {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    form button {
        background-color: #4b0c0c;
        color: rgb(255, 255, 255);
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    form button:hover {
        background-color: #792727cc;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        background-color: #3B0C0C; /* Rojo oscuro */
        color: #FFFFFF; /* Blanco */
    }

    th, td {
        border: 1px solid #8B0000; /* Burdeos oscuro */
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #8B0000; /* Burdeos oscuro */
    }

    tr:nth-child(even) {
        background-color: #4F0A0A; /* Rojo oscuro más claro */
    }

    img {
        max-width: 100px;
    }


    button {
        color: #FFFFFF; /* Blanco */
        background-color: #8B0000; /* Burdeos oscuro */
        border: 1px solid #8B0000; /* Burdeos oscuro */
        border-radius: 4px;
        padding: 2px 8px;
        cursor: pointer;
    }

    button:hover {
        background-color: #A52A2A; /* Rojo oscuro más claro */
    }

</style>
