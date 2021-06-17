<?php
    class Conexion{
        static public function cBD(){
            try{
                $bd = new PDO("mysql:host=us-cdbr-east-04.cleardb.com;dbname=heroku_c375f","b3d5f8c447532e","e1ccb828");
                return $bd;
            }catch(PDOException $e){
                echo "Error ".$e->getMessage();
            }
        }
    }
?>