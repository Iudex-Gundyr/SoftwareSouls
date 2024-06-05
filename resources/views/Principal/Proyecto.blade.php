<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/proyecto.css') }}" rel="stylesheet">
    <title>Proyecto {{$proyecto->ID_Publicacion}}</title>
</head>
<link rel="icon" href="{{ asset('img/Mascot-Logo16.png') }}" />
<style>
    .image-list {
                margin-left: 5%;
    list-style-type: none; /* Esto quita los puntos */
    padding: 0; /* Esto quita el padding predeterminado */
}

.image-list li {
    display: inline-block; /* O puedes usar 'block' si prefieres que las imágenes estén una debajo de otra */
    margin-right: 10px; /* Ajusta el margen como prefieras */
}
    #zoomedImageContainer {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000; /* Asegúrate de que este valor sea mayor que el de otros elementos en la página */
}

#zoomedImage {
    max-width: 80%;
    max-height: 80%;
}
           h1{
            text-align: center;
        }
        /* Estilos para el scrollbar en WebKit (Chrome, Safari) */
        ::-webkit-scrollbar {
          width: 12px; /* Ancho del scrollbar */
        }

        ::-webkit-scrollbar-thumb {
          background-color: rgba(36, 10, 10, 0.87); /* Color del thumb (la parte que puedes arrastrar) */
          border-radius: 6px; /* Bordes redondeados del thumb */
        }

        ::-webkit-scrollbar-track {
          background-color: #1e1e1e; /* Color del fondo del scrollbar (track) */
        }

        /* Estilos para el scrollbar en Firefox */
        body {
          scrollbar-color: rgba(36, 10, 10, 0.87) #1e1e1e; /* Color del thumb y track */
          scrollbar-width: thin; /* Ancho del scrollbar */
        }
        .center-div {
            display: block; /* Cambiado de 'flex' a 'block' para que el div sea un bloque en línea */
            position: relative; /* Cambiado de 'block' a 'relative' para mantener la posición relativa */
            margin: auto;
            margin-top: 100px;
            margin-bottom: 5%;
            width: 1200px;
            max-width: 90%; /* Cambiado a porcentaje para establecer un máximo de ancho */
            height: auto; /* Cambiado a 'auto' para permitir altura dinámica según contenido */
            background-color: rgba(36, 10, 10, 0.871);
            border-radius: 3px;
            padding: 10px; /* Agregado para espacio interior */
            overflow-wrap: break-word; /* Hace que el texto haga un salto de línea si excede el ancho del contenedor */
        }

        .bttn2 {
        
      background-color: rgba(128, 0, 0, 0.87);
      color: #fff;
      border: none;
      border-radius: 20px;
      padding: 10px 20px;
      cursor: pointer;
            margin-left: 41.5%;
      transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
        }

    .bttn2:hover {

      background-color: rgba(150, 0, 0, 1);
      box-shadow: 0 0 10px rgba(229, 255, 0, 0.8);
      transform: scale(1.1); /* Aumenta el tamaño al pasar el mouse */
    }
    h2{
        margin-left: 4%;
        text-align: left;
    }
    .text {
        font-family: 'Roboto', sans-serif; /* Utiliza la fuente Roboto */
        font-size: 14px; /* Tamaño de letra de 14px */
        word-wrap: break-word; /* Opcional: overflow-wrap: break-word; */
        max-width: 90%;
        text-align: left;
        margin-bottom: 1%;

    }
    .imgP {
            width: 500px; /* Tamaño estándar */
            height: auto; /* Altura automática para mantener la proporción */
            transition: transform 0.3s; /* Agrega una transición suave al efecto */
        }

        /* Efecto de agrandamiento al pasar el mouse */
        .imgP:hover {
            transform: scale(1.1); /* Aumenta la escala al 110% al pasar el mouse */
        }
        .imgP2 {
            width: 50px; /* Tamaño estándar */
            height: auto; /* Altura automática para mantener la proporción */
            transition: transform 0.3s; /* Agrega una transición suave al efecto */
        }

        /* Efecto de agrandamiento al pasar el mouse */
        .imgP2:hover {
            transform: scale(1.1); /* Aumenta la escala al 110% al pasar el mouse */
        }
        /* Estilos para la tabla */
        .custom-table {
            border-collapse: collapse;
            width: 90%; /* Ancho inicial de la tabla */
            margin: 0 auto; /* Centra la tabla horizontalmente */
        }

        .custom-table th, .custom-table td {
            border: 1px solid #000000;
            padding: 8px;
            text-align: left;
        }
        

        /* Estilos para las celdas al hacer hover */
        .custom-table td:hover {
            transform: scale(1.1); /* Aumenta el tamaño al hacer hover */
            transition: transform 0.2s ease; /* Agrega una transición suave */
        }

</style>



<body>
    @include('Principal/navbar')
    <div id="loader">
        <loader></loader>
    </div>
    <div class="center-div">
        <div class="arriba">
            <h1>Proyecto: {{$proyecto->NombreP}} </h1>
        </div>
        <h2>Descripción<h2>
            <div class="text"> {{$proyecto->DescripcionP}} </div>
            <div class="text"> Las herramientas que se utilizaron son:</div>
            <div class="text">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Nombre de la Herramienta</th>
                        <th>Descripcion</th>
                        <th>Logo Herramienta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyecto->herramientaPublicaciones as $herramientaPublicacion)
                        <tr>
                            <td>{{$herramientaPublicacion->Herramientas->NombreHerramienta}}</td>
                            <td>{{$herramientaPublicacion->Herramientas->DescripcionH}}</td>
                            <td><img class="imgP2" src="data:image/png;base64,{{ base64_encode($herramientaPublicacion->Herramientas->Fotografia) }}" alt="Fotografia"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        <div class="abajo">
            <a href="{{$proyecto->Enlace_P}}"><button type="" class="bttn2">Ver Proyecto</button></a>
        </div>
    </div>
    <div class="center-div">
        <div class="arriba">
            <h1>Fotos del Proyecto:</h1>
        </div>
        <div class="abajo">
            @if ($proyecto->fotosProyecto->isNotEmpty())
            <ul class="image-list">
                @foreach ($proyecto->fotosProyecto as $foto)
                    <li>
                        <img class="imgP" src="data:image/png;base64,{{ base64_encode($foto->Fotografia) }}" alt="Fotografia" onclick="zoomImage(this)">
                    </li>
                @endforeach
            </ul>
            <div id="zoomedImageContainer" onclick="closeZoomedImage()" style="display:none;">
                <img id="zoomedImage" src="" alt="Imagen ampliada">
            </div>
        @else
            <p>No hay fotos disponibles para este proyecto.</p>
        @endif
        </div>
    </div>



    <footer>
        <div id="pie">
            <pie></pie>
        </div>
    </footer>


</html>
<script>
    function zoomImage(imageElement) {
    var container = document.getElementById('zoomedImageContainer');
    var zoomedImage = document.getElementById('zoomedImage');
    zoomedImage.src = imageElement.src; // Establece la fuente de la imagen en la imagen clickeada
    container.style.display = 'flex'; // Muestra el contenedor
}

function closeZoomedImage() {
    var container = document.getElementById('zoomedImageContainer');
    container.style.display = 'none'; // Oculta el contenedor
}

</script>
