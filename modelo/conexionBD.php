<?php
    class Conexion{
        static public function cBD(){
            try{
                $bd = new PDO("mysql:host=localhost;dbname=panel_control","root","");
                return $bd;
            }catch(PDOException $e){
                echo "Error ".$e->getMessage();
            }
        }
    }
?>