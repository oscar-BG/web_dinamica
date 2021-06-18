<?php
    class Conexion{
        static public function cBD(){
            try{
                $bd = new PDO("mysql:host=nombre-del-host;dbname=nombre-de-la-base-de-datos","usuario","contraseña");
                return $bd;
            }catch(PDOException $e){
                echo "Error ".$e->getMessage();
            }
        }
    }
?>