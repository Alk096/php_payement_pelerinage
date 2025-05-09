<?php
require 'conn.php';

if (isset($_POST)) {
    extract($_POST);

    if ($montant > 0) {
        $base = new Base();

        // Vérifier si un versement existe déjà pour ce pèlerin
        $check = $base->connection()->prepare("SELECT montant FROM versement WHERE id_pelerin = ?");
        $check->execute([$id_pelerin]);
        $existingVersement = $check->fetch();

        if ($existingVersement) {
            // Si un versement existe, mettre à jour le montant
            $nouveauMontant = $existingVersement['montant'] + $montant;
            $update = $base->connection()->prepare("UPDATE versement SET montant = ? WHERE id_pelerin = ?");
            $update->execute([$nouveauMontant, $id_pelerin]);
        } else {
            // Si aucun versement n'existe, insérer un nouveau versement
            $insert = $base->connection()->prepare("INSERT INTO versement(id_pelerin, montant) VALUES(?, ?)");
            $insert->execute([$id_pelerin, $montant]);
        }
    } else {
        // Si le montant est invalide, rediriger avec un message d'erreur
        header("location:accueil.php?error=Montant invalide");
        exit;
    }

    // Redirection après traitement
    header("location:accueil.php");
}
?>