<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificando la herramienta {{$herramienta->ID_Herramientas}}</title>

</head>
<body>
    @stack('scripts-bottom')
    @include('Administrador/navbar')
    <form action="{{ route('ActualizarHerramienta', ['id' => $herramienta->ID_Herramientas]) }}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <br>Nombre Herramienta<br>
        <input type="text" name="NombreHerramienta" value="{{$herramienta->NombreHerramienta}}" placeholder="Nombre del proyecto">
        <br>Descripcion de la herramienta<br>
        <input type="text" name="DescripcionH" value="{{$herramienta->DescripcionH}}" placeholder="Descripcion del proyecto">
        <br>Fotografía Herramienta <br>
        <input type="file" name="Fotografia"  accept=".png, .jpg">
        <br>
        <button type="submit">Actualizar</button>
    </form>
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
</body>
</html>
<style>
       /* Estilos para el formulario */
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
    </style>
