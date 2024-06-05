<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script>
    window.confirmarEliminacion = function(url) {
    if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
        window.location.href = url;
    }
    };
    </script>

    <title>Usuarios</title>
</head>
<body>
    @stack('scripts-bottom')
    @include('Administrador/navbar')
    <div class="container">
        <section class="section">
          <h1>Registro de Usuario</h1>
          <form action="{{ url('/registrar') }}" method="post">
            @csrf
            <label for="nombre">Nombre</label><br>
            <input type="text" id="nombre" name="Nombre" value="{{ old('Nombre') }}" placeholder="Nombre de usuario"><br>
            <label for="correo">Correo</label><br>
            <input type="email" id="correo" name="Correo" value="{{ old('Correo') }}" placeholder="Correo electrónico"><br>
            <label for="clave">Contraseña</label><br>
            <input type="password" id="clave" name="Clave" placeholder="Contraseña"><br>
            <label for="confirmar-clave">Confirmar Contraseña</label><br>
            <input type="password" id="confirmar-clave" name="Clave_confirmation" placeholder="Confirmar contraseña"><br>
            <button type="submit">Registrarse</button>
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
          @if (session('status'))
            <div class="alert alert-danger">{{ session('status') }}</div>
          @endif
        </section>

        <!-- Lista de Usuarios Registrados -->

        <section class="section">
            <h2>Usuarios Registrados</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->Nombre }}</td>
                        <td>{{ $user->Correo }}</td>
                        <td>
                            <!-- Botón Modificar -->
                            <a class="option" href="{{ route('ModificarUsuario', ['id' => $user->ID_Usuario]) }}">Modificar</a>
                            <!-- Botón Eliminar -->
                            <button onclick="confirmarEliminacion('{{ route('EliminarUsuario', ['id' => $user->ID_Usuario]) }}')">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
  color: #973232;
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
  color: #bb3030;
  padding: 10px;
  border-radius: 5px;
  margin-bottom: 10px;
}


    .option:hover {
      background-color: rgba(150, 0, 0, 1);
    }   table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #912323;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #ce2929;
    }

    .option {
        text-decoration: none;
        color: blue;
        margin-right: 10px;
    }

    button {
        background-color: #f44336;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        padding: 6px 10px;
    }

    button:hover {
        background-color: #d32f2f;
    }
</style>
