<?php
session_start();
require_once 'controlador/comentarioC.php';
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
    <div class="divMenu">
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="#">blog</a></li>
            <li><a href="#">Articulos</a></li>
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
    <header>
        <h1>Titulo de la pagina</h1>
    </header>
    <section>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, nesciunt fugiat laborum sit quisquam perspiciatis sapiente minus fuga magni repellendus 
            eum, officia vitae ipsum aperiam a animi, deserunt officiis autem!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste praesentium at, exercitationem a distinctio dolores deserunt facere nulla totam numquam 
            voluptatem, laudantium iusto consequatur. Eaque ut laboriosam quae quam eius?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit voluptatibus fugiat consequatur repellat praesentium quibusdam ullam consectetur reiciendis 
            id eos velit accusamus est autem quos, voluptate temporibus minima officiis! Qui!
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos sed voluptas, nobis repudiandae eius ad reprehenderit soluta iste vitae eligendi nesciunt 
            minima voluptatibus quasi enim tempora. Repellat, consequatur architecto. Neque!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, explicabo officia! Numquam voluptatibus voluptatem quo, praesentium laudantium blanditiis ullam
            possimus minus repellat et laborum sit fugit. Veniam maiores distinctio placeat!
        </p>
    </section>

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