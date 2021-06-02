<?php
    session_start();
    require_once ("../modelo/conexionBD.php");
    require_once ("../modelo/usuarioM.php");
    $usuario = new UsuarioM();

    switch($_GET["op"]){
        #Verificar si existe el usuario y crear su session
        case "acceso":
            $datos = $usuario->get_login($_POST["usu_correo"], $_POST["usu_pass"]);
            if(count($datos)>0){
                $session = $datos['usu_nom'];
                $_SESSION['usuario'] = $session;
                #echo json_encode($datos);
                #echo json_encode("1");
                echo '1';
            }else{
                #echo json_encode("0");
                echo '0';
            }
        break;
        #Verificar si el usuario existe por el login de gmail
        case "accesosocial":
            $datos = $usuario->get_login_social($_POST["usu_correo"]);
            $e = $datos["usu_nom"];
            if(count($datos)>0){
                $session = $datos['usu_nom'];
                $_SESSION['usuario'] = $session;
                #echo json_encode($datos);
                echo json_encode("1");
            }else{
                echo json_encode("0");
            }
        break;
        case "registro":

            $datos= $usuario->get_email($_POST["usu_correo"]);
            if(is_array($datos) == true and count($datos)>0){
                echo "1";
            }else{
                $usuario->insert_login($_POST["usu_nom"], $_POST["usu_correo"], $_POST["usu_pass"]);
                $session = $_POST["usu_nom"];
                $_SESSION['usuario'] = $session;
                echo "0";
            } 
        break;
        # INSERTAR COMENTARIOS EN LA TABLA
        case "comentar":
            $datos = $usuario->create_comment($_POST["comendarios"], $_SESSION["usuario"]);
            if(is_array($datos) == true and count($datos)>0){
                echo "1";
            }
        break;
        #Cerrar session del usario (Salir)
        case 'session':
            session_destroy();
            echo "
                <script>
                    window.open('../index.php','_self');
                </script>
            ";
        break;
    }
?>