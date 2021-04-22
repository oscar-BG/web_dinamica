<?php
    class USERNAME{
        public $user;
        public $key;

        public function __construct($p_Name, $p_Key){
            $user = $p_Name;
            $key = $p_Key;
        }

        public function welcome(){
            global $user, $key;
            echo 'Hola '.$user;
        }
    }

    $_user = new USERNAME($_POST["usuario"], $_POST['password']);
    $_user -> welcome();
?>