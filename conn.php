<?php
    $base = new PDO("mysql:host=localhost;dbname=imanipelerinage","root","");
    class Base{
        private $server = "localhost";
        private $database = "imanipelerinage";
        private $user = "root";
        private $password = "";
        public function connection(){
            try{
                $base = new PDO("mysql:host=$this->server;dbname=$this->database","$this->user","$this->password");
                $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $base;
            }catch(PDOException $th){
                die("Erreur : ".$th->getMessage());
            }
        }
    }

    $base = new Base();
    $base->connection();
?>