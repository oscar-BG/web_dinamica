<?php
session_start();
require_once 'controlador/comentarioC.php';
require_once 'controlador/estadistica.php';
    if(!isset($_SESSION["usuario"])){
        $anonimo = "anonimo@gmail.com";
        $estadistica = new EstadisticaC();
        $estadistica -> contarVistasC($anonimo);
    }else{
        $estadistica = new EstadisticaC();
        $estadistica -> contarVistasC($_SESSION['correo']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vista/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <!--############################## 
            Menu
     ################################-->
    <div class="divMenu">
        <ul>
            <li><a href="index.php?menu=inicio">Inicio</a></li>
            <li><a href="index.php?menu=twice">Twice</a></li>
            <li><a href="#">BTS</a></li>
            <li><a href="#">Black PINK</a></li>
            <?php
                if(isset($_SESSION['usuario'])){
                    echo '<li><a>Bienvenido  '.$_SESSION['usuario'].'</a></li>';
                    echo '<li><a href="controlador/usuarioC.php?op=session">Salir</a></li>';
                }else{
                    echo '<li><a href="vista/login.html">Suscribete</a></li>';
                }
            ?>
        </ul>
    </div>
    <!-- ############################
            Contenido de la pagina
    ################################# -->

    <?php
        if(isset($_GET["menu"])){
            $opcion = $_GET["menu"];
            switch ($opcion) {
                case 'inicio':
                    include_once "vista/inicio.html";
                    break;
                case 'twice':
                    include_once "vista/twice.html";
                    break;
                default:
                    include_once "vista/inicio.html";
                    break;
            }
        }else{
            include_once "vista/inicio.html";
        } 
    ?>
    <!--##############################
            COMENDARIOS
    ##################################-->
    <section>
        <div class="viewcomment">
            <?php
                $view_comment = new ComentarioC();
                $view_comment -> comentario();
            ?>
        </div>
        <div class="comentarios">
            <h2>Dejamos un comentario</h2>
            
            <textarea  id="comendarios" name="comendarios" rows="3" cols="30"></textarea>
            <?php
                if(isset($_SESSION['usuario'])){
                    echo '<input type="submit" id="enviar_comment" name="enviar_comment" value="Comentar">';
                }else{
                    echo '<input type="submit" id="enviar_comment" name="enviar_comment" value="Comentar" disabled="true">';
                } 
            ?>
        </div>
    </section>
    <script src="vista/lib/jquery/jquery.js"></script>
    <script src="index.js"></script>
</body>
</html>