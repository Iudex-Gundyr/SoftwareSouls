<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SoftwareSouls</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/SSLS.css') }}" rel="stylesheet">
</head>
<link rel="icon" href="{{ asset('img/Mascot-Logo16.png') }}" />


  
<body>

    @include('Principal/navbar')
    <section id="Inicio"></section>
    <div class="center-div">
      <div class="izquierda">
        <img class="imgP" src="{{ asset('img/BrayanM.jpg') }}" alt="imgP"/>
      </div>

        <div class="derecha">
            <h1>Brayan Roberto Monroy Contreras</h1>
            <br>
            <p>Profesional titulado en Ingeniería en Informática.</p>
            <ul>
                <li>Certificado en Microsoft: Azure Fundamentals</li>
                <li>Experiencia en desarrollo de software.</li>
                <li>Experiencia en soporte a usuarios.</li>
                <li>Conocimiento para el desarrollo y resolución de problemas en la nube.</li>
            </ul>
        </div>
    </div>
    <section id="experiencia"></section>
    <div class="center-div">
        <div class="izquierda">
            <img class="imgP7" src="{{ asset('img/Conocimientos.jpg') }}" alt="imgP"/>
        </div>
    
        <div class="derecha">
            <h1>Experiencia</h1>
            <br>
            <p>Programación:</p>
            <ul>
                <li>2023 nov - 2024 mar | Desarrollo de herramienta con intranet para empresa dedicada al rubro de Electricidad industrial y automatización.</li>
                <li>2024 ene - 2024 mar | Desarrollo de intranet para manejo de inventariado en empresa dedicada a la tornería.</li>
                <li>2024 ene - actualidad | Desarrollo de página web en general.</li>
            </ul>
    
            <p>Soporte:</p>
            <ul>
                <li>2023 feb - 2023 sept | Soporte a usuarios. | Albemarle.</li>
                <li>2023 nov - 2024 mar | Encargado de redes y soporte a usuarios. | Volta Ingeniería.</li>
            </ul>
        </div>
    
        <div class="derecha">
            <h1>Herramientas</h1>
            <br>
            <p>Lenguajes de programación:</p>
            <ul>
                <li>Laravel | MySQL, PHP, Java, CSS, Ajax.</li>
                <li>.NET | C#, SQL</li>
                <li>Django | Python, MariaDB</li>
            </ul>
            <p>Soporte a usuarios y redes:</p>
            <ul>
                <li>Albemarle | ServiceNow, Active Directory, Microsoft Teams.</li>
                <li>Volta Ingeniería | TeamViewer, Active Directory, Microsoft Server.</li>
            </ul>
        </div>
    </div>

    <section id="proyectos"></section>
    <div class="center-div3 moviles">
        <div class="Moviles"><h1>Para ver nuestros proyectos visita nuestro sitio web, desde un computador.</h1></div>
        <div class="arriba nomovil">
            <h1>Proyectos</h1>
        </div>
        <div class="arriba nomovil"><h4>Filtrar por nombre,descripción o herramienta</h4></div>
        <div class="nomovil">
            (Solo se buscaran los 5 proyectos que mas coincidan con tu busqueda.)
            <input class="nomovil form-control" type="text" v-model="filtro" placeholder="Escribe aquí" id="filtroProyecto">
        </div>
        <table class="nomovil">
            <thead>
                <tr>
                    <th>Nombre del Proyecto</th>
                    <th>Descripción</th>
                    <th>Examinar</th>
                </tr>
            </thead>
            <tbody id="contenidoProyectos">
                <!-- Los proyectos se cargarán aquí -->
            </tbody>
        </table>
    </div>
    <section id="contactos"></section>
    <div class="center-div2">
        <div class="izquierda">
            <h1>Contacto</h1>
            <br>
            <h2>Información de contacto</h2>
            Email: brayan.monroy@softwaresouls.cl<br>
            Teléfono: +56 9 5649 1016
            <h2>Redes Sociales:</h2>
            <a href="https://www.linkedin.com/in/brayan-monroy-c/" target="_blank">
                <img class="imgP4" src="{{ asset('img/linkedin.png') }}" alt="imgP4"/>
            </a>
            <a href="https://github.com/Iudex-Gundyr" target="_blank">
                <img class="imgP4" src="{{ asset('img/github.png') }}" alt="imgP4"/>
            </a>
        </div>
        <div class="derecha">
            <div class="nomovil Moviles divmovil">
                <h1>Contacto:</h1><br>
            </div>
            <div class="nomovil Moviles divmovil">
                Email: brayan.monroy@softwaresouls.cl<br>
                Teléfono: +56 9 5649 1016<br>
            </div>
            <div class="nomovil Moviles divmovil">
                <a href="https://www.linkedin.com/in/brayan-monroy-c/" target="_blank">
                    <img class="imgP4" src="{{ asset('img/linkedin.png') }}" alt="imgP4"/>
                </a>

                <a href="https://github.com/Iudex-Gundyr" target="_blank">
                    <img class="imgP4" src="{{ asset('img/github.png') }}" alt="imgP4"/>
                </a>
            </div>
            <h1>Deja tu mensaje</h1>
            <form class="contact-form" id="formEnviar">
                @csrf
                <div class="form-group">
                    <input v-model="nombre" type="text" placeholder="Nombre" class="form-control" name="nombre" required>
                </div>
                <div class="form-group">
                    <input v-model="correo" type="email" placeholder="Correo electrónico" class="form-control" name="correo" required>
                </div>
                <div class="form-group">
                    <textarea v-model="mensaje" placeholder="Mensaje" class="form-control" name="mensaje" required></textarea>
                </div>
                <h1><button type="submit" class="bttn2">Enviar</button></h1>
            </form>
            <div id="sendEmail" class="sendEmail"><h4>Su mensaje fue enviado con éxito, alguien se pondrá en contacto contigo</h4></div>
        </div>
    </div>
    <footer>
        <div id="pie">
            <pie></pie>
        </div>
    </footer>
</body>
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <p>SoftwareSouls</p>
            <p>&copy; 2024 Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
</html>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$('#contenidoProyectos').on('click', '.bttn2', function() {
    var idPublicacion = $(this).data('id');
    window.location.href = '/proyecto/' + idPublicacion;
});
$(document).ready(function() {
    function cargarProyectos(filtro) {
        $.ajax({
            url: '/obtener',
            type: 'GET',
            data: { filtro: filtro },
            success: function(response) {
                $('#contenidoProyectos').empty();
                if (response.length === 0) {
                    $('#contenidoProyectos').append('<tr><td colspan="3">No hay proyectos con tus especificaciones.</td></tr>');
                } else {
                    $.each(response, function(key, proyecto) {
                        $('#contenidoProyectos').append('<tr><td>' + proyecto.NombreP + '</td><td>' + proyecto.DescripcionP + '</td><td><button class="bttn2" data-id="' + proyecto.ID_Publicacion + '">Examinar</button></td></tr>');
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#contenidoProyectos').append('<tr><td colspan="3">Error al cargar los proyectos.</td></tr>');
            }
        });
    }

    cargarProyectos('');

    $('#filtroProyecto').keyup(function() {
        var filtro = $(this).val();
        cargarProyectos(filtro);
    });
});


document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('formEnviar');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Previene la recarga de la página

            // Recopilar los datos del formulario
            var nombre = document.querySelector('.contact-form input[name="nombre"]').value;
            var correo = document.querySelector('.contact-form input[name="correo"]').value;
            var mensaje = document.querySelector('.contact-form textarea[name="mensaje"]').value;

            // Crear un objeto FormData para enviar los datos del formulario
            var formData = new FormData();
            formData.append('nombre', nombre);
            formData.append('correo', correo);
            formData.append('mensaje', mensaje);

            // Verificar si el token CSRF está presente en el DOM
            var csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                console.error('CSRF token not found. Make sure you have a meta tag with name="csrf-token" in your head element.');
                return;
            }

            // Realizar la solicitud AJAX
            fetch('/sendEmail', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest', // Necesario para que Laravel identifique la solicitud AJAX
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content') // Token CSRF
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                // Oculta el formulario y muestra el mensaje de éxito
                document.querySelector('.contact-form').style.display = 'none';
                document.getElementById('sendEmail').style.display = 'block';
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    }
});



</script>
