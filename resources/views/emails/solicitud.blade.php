<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo</title>
</head>
<body>
    Un usuario se puso en contacto contigo.
    @if(isset($data['nombre']) && !empty($data['nombre']))
        <p>Nombre: {{ $data['nombre'] }}</p>
    @endif

    @if(isset($data['correo']) && !empty($data['correo']))
        <p>Correo electrónico: {{ $data['correo'] }}</p>
    @endif

    @if(isset($data['mensaje']) && !empty($data['mensaje']))
        <p>Mensaje: {{ $data['mensaje'] }}</p>
    @endif


    Esto es un correo automatico enviado desde la pagína web, favor no responder devuelta.
</body>
</html>
<style>
    body {
        background-color: rgba(36, 10, 10, 0.871);
        color: white;
        font-family: Arial, sans-serif;
        padding: 20px;
    }

    h1 {
        color: white;
    }

    p {
        margin-bottom: 10px;
    }
</style>
