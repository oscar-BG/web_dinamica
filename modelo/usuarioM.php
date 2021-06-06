<?php
require_once "conexionBD.php";
    class UsuarioM extends Conexion{
        # funcion que consulta el correo electronico y contraseña
        public function get_login($usu_correo, $usu_pass){
            $pdo = Conexion::cBD()->prepare("select usu_correo, usu_pass, usu_nom, est from tm_usuario where usu_correo = :usu_correo and usu_pass = :usu_pass");
            $pdo -> bindParam("usu_correo", $usu_correo, PDO::PARAM_STR);
            $pdo -> bindParam("usu_pass", $usu_pass, PDO::PARAM_STR);

            $pdo -> execute();
            return $pdo ->fetch();
            $pdo -> close();
        }
        #funcion para obtener correo
        public function get_login_social($usu_correo){
            $pdo = Conexion::cBD()->prepare("select usu_correo, usu_nom from tm_usuario where usu_correo = :usu_correo");
            $pdo -> bindParam("usu_correo", $usu_correo, PDO::PARAM_STR);

            $pdo -> execute();
            return $pdo ->fetch();
            $pdo -> close();
        }
        #Registrar usuario
        static public function insert_login($usu_nom, $usu_correo, $usu_foto,$usu_pass){
            $pdo = Conexion::cBD()->prepare("call insert_tmusuario(:nombre, :correo, :foto, :pass)");
            $pdo -> bindParam("nombre", $usu_nom, PDO::PARAM_STR);
            $pdo -> bindParam("correo", $usu_correo, PDO::PARAM_STR);
            $pdo -> bindParam("foto", $usu_foto, PDO::PARAM_STR);
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
            $pdo -> close();
        }
        #Publicar un comentario
        public function create_comment($comendario, $usuario, $correo){
            $pdo = Conexion::cBD()->prepare("INSERT INTO comendarios (usuario, usu_correo, fecha, comendario) VALUES (:usu, :correo,  NOW(), :c);");
            $pdo -> bindParam("usu", $usuario, PDO::PARAM_STR);
            $pdo -> bindParam("correo", $correo, PDO::PARAM_STR);
            $pdo -> bindParam("c",$comendario, PDO::PARAM_STR);
            
            $pdo -> execute();
            return $pdo -> fetchAll();
            $pdo -> close();
        }
        #contar el numero de comendarios
        static public function count_comment(){
            $pdo = Conexion::cBD()->prepare('SELECT COUNT(comendario) as countC FROM comendarios;');
            $pdo -> execute();
            $result = $pdo -> fetch();
            return $result;
            $pdo -> close();
        }
        #Ver commentarios
        static public function viewComment(){
            $pdo = Conexion::cBD()->prepare("SELECT usuario, fecha, comendario, foto FROM comendarios INNER JOIN tm_usuario ON tm_usuario.usu_correo = comendarios.usu_correo ORDER BY fecha DESC;");
            $pdo -> execute();
            return $pdo -> fetchAll();
            $pdo -> close();
        }
    }
?>