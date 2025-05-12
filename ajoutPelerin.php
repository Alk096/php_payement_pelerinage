<?php
require "conn.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    extract($_POST);
    $base = new Base();
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/'; // Dossier où les images seront stockées
        $uploadFile = $uploadDir . basename($_FILES['img']['name']);

        // Vérifiez si le dossier existe, sinon créez-le
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Déplacer le fichier uploadé dans le dossier
        if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
            // Enregistrer le chemin dans la base de données
            $insert = $base->connection()->prepare("
            INSERT INTO pelerin (nom, prenom, img, nationalite, numero_passeport, compte, mot_de_passe, e_mail,voyage_souhait ,num_tel)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)
        ");
            $mot_de_passe = password_hash($password, PASSWORD_DEFAULT);
            $insert->execute([$nom, $prenom, $uploadFile, $nationalite, $numPasseport, $compte, $mot_de_passe, $email,$voyageSouhait ,$numTel]);
            header("location:accueil.php");
        } else {
            echo "Erreur lors du déplacement du fichier.";
        }
    }
}
