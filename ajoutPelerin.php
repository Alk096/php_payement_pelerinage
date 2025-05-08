<?php
    require 'conn.php';
    if(isset($_POST)){
        extract($_POST);
        $base = new Base();
        $insert = $base->connection()->prepare("INSERT INTO pelerin(nom,prenom,nationalite,numero_passeport,compte,mot_de_passe,e_mail,num_tel)
        VALUES(?,?,?,?,?,?,?,?)");
        $mot_de_passe = password_hash($password,PASSWORD_DEFAULT);
        $insert->execute([$nom,$prenom,$nationalite,$numPasseport,$compte,$mot_de_passe,$email,$numTel]);
        header("location:accueil.php");
    }

?>