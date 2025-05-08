<?php
    require "conn.php";
    
    if(isset($_POST)){
        extract($_POST);
        $base = new Base();
        $insert = $base->connection()->prepare("INSERT INTO demande_preinscription(nom,prenom,nationalite,numero_passeport,compte,mot_de_passe,e_mail,num_tel,voyage_souhait)
        VALUES(?,?,?,?,?,?,?,?,?)");
        $mot_de_passe = password_hash($password,PASSWORD_DEFAULT);
        $insert->execute([$nom,$prenom,$nationalite,$numPasseport,$compte,$mot_de_passe,$email,$numTel,$type_voyage]);
        $insertUser = $base->connection()->prepare("INSERT INTO user(compte,mot_de_passe)
        VALUES(?,?)");
        $insertUser->execute([$compte,$mot_de_passe]);
        header("location:index.php");
    }
?>