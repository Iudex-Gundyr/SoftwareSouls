<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script>
        window.confirmarEliminacion = function(url) {
        if (confirm('¿Estás seguro de que deseas eliminar este proyecto?')) {
            window.location.href = url;
        }
        };
    </script>
    <title>Proyectos</title>
</head>
<body>
    @stack('scripts-bottom')
    @include('Administrador/navbar')
    <div class="container">
        <section class="section">
          <h1>Crear Proyecto</h1>
          <form action="{{ url('/crearProyecto') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="nombre">Nombre del Proyecto</label><br>
            <input type="text" id="nombre" name="NombreP" value="{{ old('NombreP') }}" placeholder="Nombre del proyecto"><br>
            <label for="descripcion">Descripción del Proyecto</label><br>
            <input type="text" id="descripcion" name="DescripcionP" value="{{ old('DescripcionP') }}" placeholder="Descripción del proyecto"><br>
            <label for="enlace">Enlace del Proyecto</label><br>
            <input type="text" id="enlace" name="Enlace_P" value="{{ old('Enlace_P') }}" placeholder="Enlace"><br>
            <label for="enlace" hidden>Portada del proyecto</label><br>
            <input type="file" name="portada" accept=".png, .jpg" value="{{ old('portada') }}"  hidden><br><br>
            <button type="submit">Registrar</button>
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
          @if(session('status'))
            <div class="alert alert-danger">
              {{ session('status') }}
            </div>
          @endif
        </section>

        <!-- Lista de Proyectos -->
        <section class="section">
            <h2>Lista de Proyectos</h2>
            <table>
              <thead>
                <tr>
                  <th>Nombre del Proyecto</th>
                  <th>Descripción</th>
                  <th>Enlace</th>
                  <th>Fecha de Creación</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($proyectos as $proyecto)
                  <tr>
                    <td>{{ $proyecto->NombreP }}</td>
                    <td>{{ $proyecto->DescripcionP }}</td>
                    <td>{{ $proyecto->Enlace_P }}</td>
                    <td>{{ $proyecto->created_at->format('d-m-Y') }}</td>
                    <td>
                      <!-- Botón Modificar -->
                      <a class="option" href="{{ route('ModificarProyecto', ['id' => $proyecto->ID_Publicacion]) }}">Examinar</a>
                      <!-- Botón Eliminar -->
                      <button onclick="confirmarEliminacion('{{ route('eliminarProyecto', ['id' => $proyecto->ID_Publicacion]) }}')">Eliminar</button>
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
  table {
    width: 100%;
    border-collapse: collapse;
  }
  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    max-width: 250px; /* Ajusta el ancho máximo según tu preferencia */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
    .container {

        max-width: 1000px;
        margin: auto;
        padding: 20px;
        background-color: rgba(36, 10, 10, 0.871);
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }


    .section {
      margin-bottom: 40px;
      width: 80%;
    }

    label {
      color: #fff;
    }

    input[type="text"] {
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

    ul {
      list-style-type: none;
      padding: 0;
    }

    ul li {
      margin-bottom: 10px;
    }


    .option:hover {
      background-color: rgba(150, 0, 0, 1);
    }

    </style>
