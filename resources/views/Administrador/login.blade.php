<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Inicio de sesión</title>
</head>
<body>

    @include('Principal/navbar')
    <div class="formulario">
        <form action="{{ url('/startsession') }}" method="post">
            @csrf
            <h1>Solo asociados</h1>
            <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}">
            <br>
            <input type="password" name="password" placeholder="Contraseña">
            <br>
            Recuérdame:<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <br>
            <button class="bttn2" type="submit">Iniciar sesión</button>
        </form>

        @if ($errors->any())
            @foreach ($errors ->all() as $error)
                <div class="error-message">{{$error}}</div>
            @endforeach
        @endif

        @if(session('status'))
            <div class="error-message">{{session('status')}}</div>
        @endif
    </div>
</html>

<style>
    .formulario {
        background-color: rgba(36, 10, 10, 0.871);
        padding: 20px;
        border-radius: 20px;
        width: 20%;
        margin: 0 auto;
        margin-top: 10%
    }

    .formulario form input[type="email"],
    .formulario form input[type="password"]{
        margin-bottom: 10px;
        padding: 8px;
        border-radius: 5px;
        border: none;
        width: 95%;
        font-size: 16px;
    }



    .formulario .error-message {
        color: white;
        background-color: rgba(36, 10, 10, 0.871);
        padding: 8px;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .bttn2 {
        width: 100%;
        position: relative;
        background-color: rgba(128, 0, 0, 0.87);
        color: #fff;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
    }

    .bttn2:hover {
        background-color: rgba(150, 0, 0, 1);
        box-shadow: 0 0 10px rgba(229, 255, 0, 0.8);
        transform: scale(1.1); /* Aumenta el tamaño al pasar el mouse */
    }
</style>

