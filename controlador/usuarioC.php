<?php
    require_once ("../modelo/conexionBD.php");
    require_once ("../modelo/usuarioM.php");
    $usuario = new UsuarioM();

    switch($_GET["op"]){
        case "acceso":
            $datos = $usuario->get_login($_POST["usu_correo"], $_POST["usu_pass"]);
            if(is_array($datos) == true and count($datos)>0){
                #echo json_encode($datos);
                echo json_encode("1");
            }else{
                echo json_encode("Error");
            }
        break;
        case "registro":

            $datos= $usuario->get_email($_POST["usu_correo"]);
            if(is_array($datos) == true and count($datos)>0){
                echo "1";
            }else{
                $usuario->insert_login($_POST["usu_nom"], $_POST["usu_correo"], $_POST["usu_pass"]);
                echo "0";
            } 
            
        break;
    }
?>