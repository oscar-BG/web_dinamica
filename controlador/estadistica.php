<?php
    class EstadisticaC{
        public function contarVistasC($_usuario){
            $respuesta = UsuarioM::contarVistasM($_usuario);
        }
    }
?>