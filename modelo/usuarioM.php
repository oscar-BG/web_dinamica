<?php
require_once "conexionBD.php";
    class UsuarioM extends Conexion{

        public function get_login($usu_correo, $usu_pass){
            $pdo = Conexion::cBD()->prepare("select usu_correo, usu_pass from tm_usuario where usu_correo = :usu_correo and usu_pass = :usu_pass");
            $pdo -> bindParam("usu_correo", $usu_correo, PDO::PARAM_STR);
            $pdo -> bindParam("usu_pass", $usu_pass, PDO::PARAM_STR);

            $pdo -> execute();
            return $pdo ->fetchAll();
            $pdo -> close();
        }
        #Registrar usuario
        static public function insert_login($usu_nom, $usu_correo, $usu_pass){
            $pdo = Conexion::cBD()->prepare("call insert_tmusuario(:nombre, :correo, :pass)");
            $pdo -> bindParam("nombre", $usu_nom, PDO::PARAM_STR);
            $pdo -> bindParam("correo", $usu_correo, PDO::PARAM_STR);
            $pdo -> bindParam("pass", $usu_pass, PDO::PARAM_STR);

            $pdo -> execute();
            return $pdo ->fetchAll();
            $pdo -> close();
        }
        #Verificar si existe correo
        static public function get_email($usu_correo){
            $pdo = Conexion::cBD()->prepare("CALL get_email(:correo);");
            $pdo -> bindParam("correo", $usu_correo, PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo -> fetchAll();
        }
    }
?>