<?php
    require 'conn.php';
    if(isset($_POST)){
        extract($_POST);
        if($montant > 0){
            $base = new Base();
            $insert = $base->connection()->prepare("INSERT INTO versement(id_pelerin,montant)
            VALUES(?,?)");
            $insert->execute([$id_pelerin,$montant]);
        }
    }
?>