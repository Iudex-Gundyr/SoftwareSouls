<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Modificando al usuario {{$usuario->Nombre}}</title>
</head>
<body>
    @include('Administrador/navbar')
    <div class="container">
        <section class="section">
          <h1>Actualizar Usuario</h1>
          <form action="{{ route('actualizar-usuario', ['id' => $usuario->ID_Usuario]) }}" method="post">
            @csrf
            @method('PUT')
            <label for="nombre">Nombre</label><br>
            <input type="text" id="nombre" name="Nombre" value="{{ $usuario->Nombre }}" placeholder="Nombre de usuario"><br>
            <label for="correo">Email</label><br>
            <input type="email" id="correo" name="Correo" value="{{ $usuario->Correo }}" placeholder="Correo electrónico"><br>
            <label for="clave">Contraseña (Deja en blanco para no modificar)</label><br>
            <input type="password" id="clave" name="Clave" placeholder="Contraseña (Deja en blanco para no modificar)"><br>
            <label for="confirmar-clave">Confirmar contraseña</label><br>
            <input type="password" id="confirmar-clave" name="Clave_confirmation" placeholder="Confirmar contraseña"><br>
            <button type="submit">Actualizar</button>
          </form>
        </section>

        <!-- Mensajes de Error -->
        <section class="section">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
        </section>
      </div>
</body>
</html>

<style>
    .container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
        background-color: rgba(36, 10, 10, 0.871);
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .section {
      margin-bottom: 40px;
    }

    label {
      color: #fff;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #555;
      border-radius: 5px;
      margin-bottom: 10px;
    }

    button {
      background-color: rgba(36, 10, 10, 0.871);
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
    }

    button:hover {
      background-color: rgba(150, 0, 0, 1);
    }

    .alert {
      background-color: rgba(128, 0, 0, 0.87);
      color: #fff;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 10px;
    }
    </style>
