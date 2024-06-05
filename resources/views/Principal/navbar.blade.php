<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SoftwareSouls</title>
</head>
  
  <style>
  
    .background-container {
    background-image: url('../../../img/background.jpg');
    background-color: rgba(241, 12, 12, 0.74); /* Color de filtro */
    background-blend-mode: multiply; /* Aplica el filtro de multiplicación */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    overflow: auto;
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    z-index: -1;
    }
  
  
  
  
      /* Puedes agregar estilos adicionales para el contenido si es necesario */
      div {
          color: white;
      }



    
    *{
      box-sizing: border-box;
    }
    body{
        font-family:'';
      margin: 0;
      padding: 0;
    }
    .head2 {
      /* Estilos originales del header */
      transition: background-color 0.3s ease-in-out;
    }
    
    .head2-fixed {
        position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Efecto de sombra, opcional */
    }
    header {
      display: flex;
      justify-content: space-between; // Cambiado a espacio entre elementos
      align-items: center;
      border: none; // Eliminado el borde
    }
    
    .custom-navbar {

      

    
      li {

        position: relative;
        display: inline-block;
        list-style-type: none;
        vertical-align: middle;
    
        a {
          display: block;
          font-size: 17px;
          color: #fff;
          text-align: center;
          text-decoration: none;
          padding: 10px 15px;
    
          /* Agregar transición para el tamaño del texto */
          transition: font-size 0.3s ease;
        }
    
        /* Agregar crecimiento del texto al hacer hover */
        &:hover {
          a {
            font-size: 20px; /* Tamaño aumentado al hacer hover */
          }
        }
      }
    }
    
    .menu-icon {
      display: none;
      background-color: rgba(63, 22, 22, 0.87);
      border:1px solid transparent;
      text-align: center;
      width: 45px;
      height: 45px;
      cursor: pointer;
      &:hover{
        background-color: lighten( rgba(0, 0, 0, 0.808), 10% );
      }
      &:focus{
        outline:none;
      }
      span{
        color: lighten( rgba(0, 0, 0, 0.808), 100% );
        font-size: $base-font-size + 4;
      }
    }
    
    // Ripple Animation
    .ripple-wave {
      position: relative;
      transition: background-color 0.6s ease;
      overflow: hidden;
    
      &:after {
        content: "";
        position: absolute;
        width: 0;
        height: 0;
        top: 50%;
        left: 50%;
        transform-style: flat;
        transform: translate3d(-50%, -50%, 0);
        background: rgba(white, 0.1);
        border-radius: 100%;
        transition: width 0.3s ease, height 0.3s ease;
      }
    
      &:focus,
      &:hover {
        &:after {
          font-weight: bold;
          width: 100%;
          height: 100%;
          display: flex;
          align-items: center;
          justify-content: center;
          color: white;
        }
      }
    
      &:active {
        &:after {
          width: 200px;
          height: 200px;
        }
      }
    }
    
    
    
    
    @media (max-width: 991px) {
      header {
        position: relative;
      }
      .custom-navbar {
        
        opacity: 0;
        position: fixed;
        z-index: 2;
        top:70px;
        right:-100%;
        width: 100%;
        height: 100%; // If you want to menu height should me 100%
        max-width: $navbar-width;
        width: 100%;
        background-color:rgba(0, 0, 0, 0.808);
        transition: all 1s ease;
        &.open {
          opacity: 1;
          right: 0;
        }
        li {
          display: block;
          a{
            text-align: left;
            border: 1px solid lighten( rgba(0, 0, 0, 0.808), 10% );
          }
        }
      }
      .menu-icon {
        display: block;
      }
    }
    .logo-container {
      position: relative;
      display: inline-block;

    }
    .logo {

      margin-left: 2%;
      height: 100px;
      display: flex;
      margin-top: 3vw;
      transition: filter 0.3s ease; /* Agrega una transición suave al cambio de filtro */
    }
</style>
<body>
    <div class="background-container">

    </div>
    <section id="inicio"></section>
    <div style="background-color: rgb(0, 0, 0)">
    <header class="head1" >
        
        <img class="logo " src="../../img/Mascot-Logo.png" alt="Logo"/>
        
        <ul class="custom-navbar js-custom-navbar2">
            <li>

            </li>
        </ul>
        
    </header>
    <header class="head1" >
        <ul class="custom-navbar js-custom-navbar">
          <li>
            <a href="/" class="ripple-wave">Inicio</a>
          </li>

          <li>
            <a href="#experiencia" class="ripple-wave">Experiencia</a>
          </li>
          <li>
            <a href="#proyectos" class="ripple-wave">Proyectos</a>
          </li>
          <li>
            <a href="#contactos" class="ripple-wave">Contactos</a>
          </li>
        </ul>
</header>
    </div>
</body>
</html>

<script>
  // Detectar cuando se hace scroll en la página
  window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.js-custom-navbar');
      if (window.scrollY > 0) {
          navbar.classList.add('hide');
      } else {
          navbar.classList.remove('hide');
      }
  });
</script>
