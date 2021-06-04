<?php
require_once ("modelo/conexionBD.php");
require_once ("modelo/usuarioM.php");

    class ComentarioC{
        public function comentario(){
            $comment_count = UsuarioM::count_comment();
            $result = UsuarioM::viewComment();
            
            echo '<label>Comendarios:'.$comment_count["countC"].' </label>';
            foreach ($result as $key => $value) {
                echo '
                    <br>
                    <label> '.$value["usuario"].' </label>
                    <label>'."<span>publicada </span> ".''.$value["fecha"].'</label> 
                    <br>
                    <br>
                    <textarea id="public_comment" name="public_comment"  rows="3"  cols="30" readonly="true">'.$value["comendario"].'</textarea>
                    <br>
                    <br>
                    ';
            }
            
        }
    }
?>