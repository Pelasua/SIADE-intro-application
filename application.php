<?php
session_start();
if (isset($_SESSION['name'])) {
    $timeNow = new DateTime(date('y-m-d h:i:s'));
    $res = $_SESSION['time']->diff($timeNow);
    $res = $res->format('%I');
    if ($res >= 1) {
        session_destroy();
        header("Location: login.php");        
    }
}else{
header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Siade</title>
    <link rel="shorcut icon" href="IMAGES/logo-siade.png">
    <link rel="stylesheet" type="text/css" href="FONT-AWESOME/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:300">
    <!--########################## - CSS - ##########################-->
    <!--CSS de Bootstrap-->
    <link rel="stylesheet" type="text/css" href="BOOTSTRAP/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/stylesApp.css">
    <!--#############################################################-->
</head>

<body>
    <section id="aplicacion" class="row content">
        <nav id="elemIzq" class="plegado">
            <ul id="listaDerecha">
                <li><a href="#"><span id="menu" class="sinclick glyphicon glyphicon-chevron-right"></span></a></li>
            </ul>
            <ul id="listaIzquierda">
                <li id="logo"> <img id="logo-SIADE" src="IMAGES/logo-siade.png" alt="SIADE - SaaS"> </li>
                <li id="options">
                    <ul id="opciones" class="opcionesOcultas">
                        <li class="opcion"> <a href="javascript:void(0)" id="mapas" class="seleccionado">Visor de mapas</a> </li>
                        <li class="opcion"> <a href="javascript:void(0)" id="graficos">Gráficos</a> </li>
                        <li class="opcion"> <a href="javascript:void(0)" id="meteo">Meteorología</a> </li>
                    </ul>
                </li>
                <li id="error"><a id="problem" href="javascript:void(0)" onclick='window.open("informarError.php", "Reportar un problema", "fullscreen=yes")'>Informar de un problema</a></li>
                <li id="exit"><a id="out" href="cerrarSesion.php">Cerrar sesión <span class="glyphicon glyphicon-log-out"></span></a></li>
            </ul>
        </nav>
        <section id="elementoVisor">
            <iframe id="visor" src="http://gis/siade_emtusa"></iframe>
        </section>
        <section id="elementoD3" class="oculto fondoInvisible">
            <article class="contenidoDef">
                <h3>Gráficos</h3>
                <p>Representación con múltiples gráficos para todo tipo de información.</p>
                <p>EN DESARROLLO</p>
                <!--<button class="botonAbrir" onclick='window.open("visor.html", "Diseño Web", "fullscreen=yes")'>
                    Abrir
                    </button>-->
            </article>
        </section>
        <section id="elementoMeteo" class="oculto fondoInvisible">
            <article class="contenidoDef">
                <h3>Meteorología</h3>
                <p>Seguimiento de las condiciones meteorológicas de la zona.</p>
                <p>EN DESARROLLO</p>
                <!--<button class="botonAbrir" onclick='window.open("visor.html", "Diseño Web", "fullscreen=yes")'>
                    Abrir
                    </button>-->
            </article>
        </section>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#menu").click(function () {
                $("#elemIzq").toggleClass("desplegado");
                $("#menu").toggleClass("clickado");
                $('#opciones').toggleClass("opcionesVisibles");
                $('#elemIzq').hover(function () {}, function () {
                     if ($("#elemIzq").position().left == 0) {
                    $("#elemIzq").removeClass("desplegado");
                     }
                });
            });
            $("#mapas").click(function () {
                $("#mapas").addClass("seleccionado");
                $("#graficos").removeClass("seleccionado");
                $("#meteo").removeClass("seleccionado");
                $("#elementoD3").addClass("oculto");
                $("#elementoMeteo").addClass("oculto");
                $("#elementoVisor").removeClass("oculto");
            });
            $("#graficos").click(function () {
                $("#mapas").removeClass("seleccionado");
                $("#graficos").addClass("seleccionado");
                $("#meteo").removeClass("seleccionado");
                $("#elementoVisor").addClass("oculto");
                $("#elementoMeteo").addClass("oculto");
                $("#elementoD3").removeClass("oculto");
            });
            $("#meteo").click(function () {
                $("#mapas").removeClass("seleccionado");
                $("#graficos").removeClass("seleccionado");
                $("#meteo").addClass("seleccionado");
                $("#elementoVisor").addClass("oculto");
                $("#elementoD3").addClass("oculto");
                $("#elementoMeteo").removeClass("oculto");
            });
        });
    </script>
</body>

</html>