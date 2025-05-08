<?php
    session_start();
    require "conn.php";
    
    if(isset($_POST)){
        extract($_POST);
        $base = new Base();
        $user = $base->connection()->prepare("SELECT * FROM user
        WHERE compte = ?");
        $user->execute([$compte]);
        
        if($accountTabs = $user->fetch()){
            if(password_verify($password,$accountTabs['mot_de_passe'])){
                header("location:accueil.php");
            }else{
                $_SESSION['error'] = 'Compte ou mot de passe incorrecte!';
                header("location:index.php");
            }
        }else{
            $_SESSION['error'] = 'Compte ou mot de passe incorrecte!';
            header("location:index.php");
        }
    }
?>