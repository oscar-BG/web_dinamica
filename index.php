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
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Twice</a></li>
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
                Informacion
    ################################# -->
    <div class="divImg">
        <img src="vista/imagenes/k1.png">
    </div>
    <div class="divConten">
        <p>
            El k-pop 1​ (abreviación de Korean popular music, en inglés o música popular coreana en español) 
            es un género musical que incluye diversos estilos como el pop, hip hop, EDM, rock o R&B, y que 
            se refiere específicamente a la música popular de Corea del Sur 
        </p>
        <p>
            "K-pop" es una abreviación de Korean popular music, en inglés o música popular coreana 
            en español, es un género musical que incluye diversos estilos como la música dance 
            electrónica, hip hop, rock, R&B, etc, y que se refiere específicamente a la música 
            popular de Corea del Sur, debido a que prácticamente no hay una industria de música 
            popular con influencia occidental en Corea del Norte
        </p>
        <hr size="3px" color="#EAEDED" width="92%">
        <h2>Orígenes de la música popular coreana</h2>
        <hr size="3px" color="#EAEDED" width="92%">
        <p>
            La historia de la música popular coreana se puede remontar alrededor de 1885, cuando un 
            misionero norteamericano, Henry Appenzeller, comenzó a enseñar canciones populares 
            estadounidenses y británicos en una escuela. Estas canciones fueron llamados changga 
            en coreano, y se basan típicamente en una música popular occidental, pero cantados con 
            letras en coreano. Durante la ocupación japonesa de Corea (1910-1945), la popularidad de 
            las canciones changga aumentó con los coreanos para expresar sus sentimientos en contra de 
            la opresión japonesa a través de la música. Una de las canciones más populares de la jornada 
            fue Huimangga (en hangul, 희망가; literalmente, La Canción de la Esperanza). Sin embargo, los 
            aponeses tomaron las colecciones de changga existentes y publicaron sus propios libros con 
            letras.54​ El primer disco de pop coreano conocido era Yi Pungjin Sewol (Este tiempo tumultuoso), 
            de Park Chae Seon Lee y Ryu Saek de 1925, que contenía canciones populares traducidos del japonés. La primera canción pop escrita por un compositor coreano es Nakhwayusu.
        </p>
    </div>

    <section class="sectionT">
        <div class="divTablero">
            <div class="divInfo1">
                <p>
                    El K-pop es un producto cultural que caracteriza valores, identidades y significados 
                    que van más allá del valor estrictamente comercial.29​ Se caracteriza por una mezcla de 
                    sonidos occidentales con la visión asiática del rendimiento. Se ha observado que hay una 
                    «visión de modernización» inherente en la cultura pop coreana.30​ Para algunos, los valores 
                    del K-pop transnacionales son los responsables de su éxito.
                </p>
           </div>
           <div class="divInfo2">
               <iframe width="560" height="315" src="https://www.youtube.com/embed/i0p1bmr0EmE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
           </div>
        </div>
        <div class="divTablero">
            <div class="divInfo3">
                <img src="vista/imagenes/twice2.jpg" width="560" height="315">
            </div>
            <div class="divInfo4">
                <p> El K-pop tiene una influencia significativa en la moda en Asia, donde las 
                    tendencias iniciadas por los ídolos son seguidas por los jóvenes. Algunos 
                    artistas se han establecido como iconos de la moda como G-Dragon46​ y CL quién 
                    repetidamente ha trabajado con el estilista Jeremy Scott que se identifica como 
                    su musa.
                </p>
            </div>
        </div>
    </section>
    <br>

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