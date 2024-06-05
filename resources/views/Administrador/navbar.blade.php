<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
  <div class="background-container"></div>
  <div class="nb">
<header class="head1">
<h1><a href="#"><img class="logo" img src="../../../img/Mascot-Logo.png" alt="Logo"/></a></h1>
        <ul class="custom-navbar js-custom-navbar2">
            <li>
                <a href="/logout" class="ripple-wave" @click="navigate('/logout')" :class="{ 'active': activeLink === '/logout' }">Cerrar Sesion</a>
            </li>
        </ul>
</header>

    <header class="head2">
      
        <ul class="custom-navbar js-custom-navbar">
          <li>
            <a href="/Proyectos" class="ripple-wave" @click="navigate('/Proyectos')" :class="{ 'active': activeLink === '/Proyectos' }">Proyectos</a>
          </li>
          <li>
            <a href="/Herramientas" class="ripple-wave" @click="navigate('/Herramientas')" :class="{ 'active': activeLink === '/Herramientas' }">Herramientas</a>
          </li>
          <li>
            <a href="/Usuarios" class="ripple-wave" @click="navigate('/Usuarios')" :class="{ 'active': activeLink === '/Usuarios' }">Usuarios</a>
          </li>


        </ul>
    </header>
</div>
</body>
</html>
<script>
export default {
  data() {
    return {
      activeLink: '',
      isHeaderFixed: false,
    };
  },
  methods: {
    navigate(route) {
      this.$router.push(route);
      this.activeLink = route;
    },
    toggleNavbar() {
      const navbar = document.querySelector('.js-custom-navbar');
      const menuIconClose = document.querySelector('.js-menu-icon span');

      navbar.classList.toggle("open");
      menuIconClose.classList.toggle("fa-times");
    },
    handleScroll() {
      this.isHeaderFixed = window.scrollY > 0;
    },
  },
  mounted() {
    const menuIcon = document.querySelector('.js-menu-icon');
    menuIcon.addEventListener('click', e => {
      e.preventDefault();
      this.toggleNavbar();
    });

    window.addEventListener('scroll', this.handleScroll);
  },
  beforeDestroy() {
    window.removeEventListener('scroll', this.handleScroll);
  },
};
</script>
<style lang="scss" scoped>
  @font-face {
    font-family: 'Optimus Princeps';
    src: url('resources/js/components/font/OptimusPrinceps.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
  }
  .nb{
    background-color:black;
    margin-bottom:5%;
  }
  .background-container {
  background-image: url('https://img.freepik.com/vector-gratis/fondo-techno-abstracto-diseno-particulas-que-fluyen_1048-14091.jpg?w=740&t=st=1706211287~exp=1706211887~hmac=36ccd613c1ef81150198a10e26f37f04655e6dec4bee38faff9a22d1c98e20f4');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  overflow: auto;
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: -1; /* Asegura que el contenedor de fondo esté detrás del contenido */
}

body {
  margin: 0;
  padding: 0;
}

  /* Puedes agregar estilos adicionales para el contenido si es necesario */
  div {
    color: white;
  }
</style>
  
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
  .fire-effect {
      height: 5%;
    background: radial-gradient(circle, #ff7f00, #ff0000);
    animation: fire 1s infinite alternate;
    opacity: 0.5;
    position: absolute;
    margin-top: 3vw;
    margin-left: 5%;
  }
  @keyframes fire {
    0% {
      box-shadow: 0 0 20px 10px #ff7f00;
    }
    100% {
      box-shadow: 0 0 40px 20px #ff0000;
    }
  }
</style>