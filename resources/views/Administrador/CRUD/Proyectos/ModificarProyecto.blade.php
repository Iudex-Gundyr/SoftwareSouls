<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script>
        window.confirmarEliminacion = function(url) {
        if (confirm('¿Estás seguro de que deseas eliminar esta foto del proyecto?')) {
            window.location.href = url;
        }
        };
    </script>
    <title>Modificando el proyecto {{$proyecto->ID_Publicacion}}</title>
</head>
<body>
    @stack('scripts-bottom')
    @include('Administrador/navbar')
    <div class="div0">
        <div class="div1">
            <h1>Proyecto</h1>
            <form action="{{ route('ActualizarProyecto', ['id' => $proyecto->ID_Publicacion]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Este campo indica que es una solicitud de actualización -->
                Nombre del Proyecto<br>
                <input type="text" name="NombreP" value="{{ $proyecto->NombreP }}" placeholder="Nombre del proyecto">
                <br>Descripcion del proyecto<br>
                <input type="text" name="DescripcionP" value="{{ $proyecto->DescripcionP }}" placeholder="Descripcion del proyecto">
                <br>Enlace del proyecto<br>
                <input type="text" name="Enlace_P" value="{{ $proyecto->Enlace_P }}" placeholder="Enlace">
                <br><br>
                <input type="file" name="portada" accept=".png, .jpg"><br><br>
                <button type="submit">Actualizar</button>
            </form>

            Portada <br>
            <img class="imgP"src="data:image/png;base64,{{ base64_encode($proyecto->Portada) }}" alt="Fotografía">
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

        </div>
        <div class="div2">
            <h1>Imagenes</h1>
            <form action="{{ route('subirimagen', ['id_publicacion' => $proyecto->ID_Publicacion]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="fotografia" accept=".png, .jpg">
                <button type="submit">Subir</button>
            </form>
            @if($fotografias->count() > 0)
            <ul>
                @foreach($fotografias as $fotografia)
                    <li>
                        <img class="imgP"src="data:image/png;base64,{{ base64_encode($fotografia->Fotografia) }}" alt="Fotografía">
                        <button onclick="confirmarEliminacion('{{ route('eliminarFoto', ['id' => $fotografia->ID_Fotoproyecto]) }}')">Eliminar</button>
                    </li>
                @endforeach
            </ul>
            @else
                <p>No hay fotografías adjuntas en este proyecto.</p>
            @endif
        </div>
        <div class="div3">
            <h1>Herramientas</h1>
            <form action="{{ route('subirHerramientaProyecto', ['id_publicacion' => $proyecto->ID_Publicacion]) }}" method="post">
                @csrf
                <label for="herramienta">Selecciona una opción:</label>
                <select name="herramienta" id="herramienta">
                    @if ($tools->isEmpty())
                        <option value="-" disabled selected>No existe ninguna herramienta</option>
                    @else
                        <option value="-" disabled hidden selected>-</option>
                        @foreach ($tools as $herramienta)
                            <option value="{{ $herramienta->ID_Herramientas }}">{{ $herramienta->NombreHerramienta }}</option>
                        @endforeach
                    @endif
                </select>
                <input type="submit" value="Enviar">
            </form>

            @if($herramientas->count() > 0)
            <ul>
                @foreach($herramientas as $herramienta)
                    <li>
                        {{($herramienta->Herramientas->NombreHerramienta) }} -
                        <button onclick="confirmarEliminacion('{{ route('eliminarHerramientaPublicacion', ['id' => $herramienta->ID_Herr_Pub]) }}')">Eliminar</button>
                    </li>
                @endforeach
            </ul>
            @else
                <p>No hay herramientas adjuntas en este proyecto.</p>
            @endif
        </div>
    <div>

</body>
</html>
<style>
    .div0 {
        display: flex;
        flex-wrap: wrap;
    }

    .div1,
    .div2,
    .div3 {
        width: calc(100% / 3); /* Establece el ancho de cada div al 33.33% */
        padding: 20px;
        box-sizing: border-box;
    }

    .div1 {
        background-color: rgba(170, 40, 40, 0.692); /* Color de fondo rojo */
    }

    .div2 {
        background-color: rgba(155, 45, 45, 0.562); /* Color de fondo verde */
    }

    .div3 {
        background-color: rgba(122, 26, 26, 0.308); /* Color de fondo azul */
    }

    /* Estilos para las listas */
    ul {
        list-style: none; /* Quita los estilos de viñetas */
        padding: 0; /* Elimina el padding predeterminado */
    }

    li {
        margin-bottom: 10px; /* Añade espacio entre elementos de la lista */
    }
    .imgP {
            width: 150px; /* Tamaño estándar */
            height: auto; /* Altura automática para mantener la proporción */
            transition: transform 0.3s; /* Agrega una transición suave al efecto */
        }
</style>
