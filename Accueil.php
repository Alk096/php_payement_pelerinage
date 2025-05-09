<?php
require 'conn.php';
$base = new Base();
$nPelerins = $base->connection()->query("SELECT COUNT(*) AS nombre_pelerin
    FROM pelerin");
$nPelerins = $nPelerins->fetch();
$nPelerins = $nPelerins['nombre_pelerin'];
$nHadj = $base->connection()->query("SELECT COUNT(*) AS nombre_voyageurs
    FROM demande_preinscription
    WHERE voyage_souhait = 'Hadj'; ");
$nHadj = $nHadj->fetch();
$nHadj = $nHadj['nombre_voyageurs'];
$nOumra = $base->connection()->query("SELECT COUNT(*) AS nombre_voyageurs
    FROM demande_preinscription
    WHERE voyage_souhait = 'Oumra'; ");
$nOumra = $nOumra->fetch();
$nOumra = $nOumra['nombre_voyageurs'];
$nPartenaire = 1;

$pelerins = $base->connection()->query("SELECT p.id AS id,p.nom AS nom,
p.prenom AS prenom,p.numero_passeport AS numero_passeport,p.nationalite AS nationalite,
p.num_tel AS num_tel,v.montant as montant
FROM pelerin AS p LEFT JOIN versement AS v 
ON p.id = v.id_pelerin");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#" class="glyphicon glyphicon-home">Home</a>
                    </li>
                    <li class="glyphicon">
                        <a href="#" class="glyphicon-plane">Voyages</a>
                    </li>
                    <li class="glyphicon">
                        <a href="#" class="glyphicon glyphicon-user">Profile utilisateur</a>
                    </li>
                </ul>

                <br>

                <div class="bg-primary well">
                    <div class="container-fluid">
                        <button class="btn btn-default" data-toggle="modal" data-target="#AjoutPelerin">+ Nouveau pèlerin</button>
                        <div class="pull-right">
                            <input type="text" placeholder="Rechercher" class="form-control input-sm" style="display:inline-block; width: 200px;">
                            <button class="btn btn-default btn-sm"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
                        </div>
                    </div>
                </div>

                <!-- Modal nouveau pelerin -->
                <div class="modal fade" id="AjoutPelerin" tabindex="-1" role="dialog" aria-labelledby="newtache" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p>Nouveau pelerin</p>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="ajoutPelerin.php">
                                    <div class="form-group">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" name="nom" class="form-control" placeholder="Entrer le mom" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom" class="form-label">Prenom</label>
                                        <input type="text" name="prenom" class="form-control" placeholder="Entrer le prenom" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nationalite" class="form-label">Nationalite</label>
                                        <input type="text" name="nationalite" class="form-control" placeholder="Entrer la nationalite" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="numPasseport" class="form-label">Numero du passeport</label>
                                        <input type="text" name="numPasseport" class="form-control" placeholder="Entrer le numero du passeport" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-label">Compte</label>
                                        <input type="text" name="compte" class="form-control" placeholder="Compte utilisateur" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="form-label">Mot de passe</label>
                                        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="numTel" class="form-label">Telephone</label>
                                        <input type="number" name="numTel" class="form-control" placeholder="Numero de telephone" required>
                                    </div>
                                    <button type="submit" name="action" value="1" class="btn btn-info btn-block glyphicon glyphicon-pencil">&nbsp;Connexion </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 sidebar">
                        <ul class="list-group">
                            <li class="list-group-item active">
                                <span class="glyphicon glyphicon-th-list"></span>
                            </li>
                            <li class="list-group-item">
                                <span class="glyphicon glyphicon-user"></span> Les pèlerins <span class="badge"><?= $nPelerins ?></span>
                            </li>
                            <li class="list-group-item">
                                <span class="glyphicon glyphicon-plane"></span> Hadj <span class="badge"><?= $nHadj ?></span>
                            </li>
                            <li class="list-group-item">
                                <span class="glyphicon glyphicon-plane"></span> Oumra <span class="badge"><?= $nOumra ?></span>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="text-decoration-none" data-toggle="modal" data-target="#paramVoyages">
                                    <span class="glyphicon glyphicon-cog"></span> Paramètres voyages
                                </a>
                            </li>
                            <li class="list-group-item">
                                <span class="glyphicon glyphicon-user"></span> Partenaires <span class="badge"><?= $nPartenaire ?></span>
                            </li>
                            <li class="list-group-item">
                                <span class="glyphicon glyphicon-log-out"></span> Déconnexion
                            </li>
                        </ul>
                    </div>
                    <!-- modal parametre voyages -->
                    <div class="modal fade" id="paramVoyages" tabindex="-1" role="dialog" aria-labelledby="newtache" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="">Parametre du voyage</p>
                                </div>
                                <div class="modal-body">
                                    <form action="">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="panel">
                                                        <p>Le voyage</p>
                                                    </td>
                                                    <td>
                                                        <select name="voyage" id="voyage" class="form-control">
                                                            <option value="Hadj">Hadj</option>
                                                            <option value="Oumra">Oumra</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="panel">
                                                        <p>Annee</p>
                                                    </td>
                                                    <td>
                                                        <select name="voyage" id="voyage" class="form-control">
                                                            <option value="" disabled selected>Selectionner l'annee</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="panel">
                                                        <p>Montant</p>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" placeholder="Entrer le montant du voyage">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="panel">
                                                        <button class="btn btn-primary btn-sm">Enregistrer</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Pèlerin</th>
                                    <th>Voyage</th>
                                    <th>Versement(%)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($pelerinTab = $pelerins->fetch()) { ?>
                                    <tr>
                                        <td><?=$pelerinTab['id'] ?></td>
                                        <td><img src="" class="photo-thumbnail" alt="photo"></td>
                                        <td><?=$pelerinTab['nom'].' '.$pelerinTab['prenom'] ?></td>
                                        <td>Hadj 2025</td>
                                        <?php $pourcentage = ($pelerinTab['montant']/1117647)*100 ?>
                                        <td><?=($pelerinTab['montant'] ? $pelerinTab['montant'] : 0 ).'('.number_format($pourcentage, 2).'%)'?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown">
                                                    <span class="glyphicon glyphicon-cog"></span> Menu <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" data-toggle="modal" data-target="#versement<?=$pelerinTab['id']?>">Versement</a></li>
                                                    <li><a href="#">Imprimer le reçu</a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#detail<?=$pelerinTab['id']?>">Détails</a></li>
                                                    <li><a href="#">Modification</a></li>
                                                    <li><a href="#">Supprimer</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- modal versement -->
                                    <div class="modal fade" id="versement<?=$pelerinTab['id']?>" tabindex="-1" role="dialog" aria-labelledby="newtache" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p class="glyphicon glyphicon-arrow-down">Versement</p>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="versement.php" method="post">
                                                        <input type="hidden" name="id_pelerin" value="<?=$pelerinTab['id']?>">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label for="">Montant a verser</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <input type="number" name="montant" class="form-control" placeholder="Entrer le montant a verser">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary btn-sm">Enregistrer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal details -->
                                    <div class="modal fade" id="detail<?=$pelerinTab['id']?>" tabindex="-1" role="dialog" aria-labelledby="newtache" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p class="glyphicon glyphicon-th-list">&nbsp;Details</p>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            <img src="" alt="img" class="photo-thumbnail">
                                                        </li>
                                                        <li class="list-group-item">
                                                            Nom : <?=$pelerinTab['nom']?>
                                                        </li>
                                                        <li class="list-group-item">
                                                            Prenom : <?=$pelerinTab['prenom']?>
                                                        </li>
                                                        <li class="list-group-item">
                                                            Date de naissance : 1960-01-01
                                                        </li>
                                                        <li class="list-group-item">
                                                            Lieu de naissance : Maradi
                                                        </li>
                                                        <li class="list-group-item">
                                                            Passeport :<?=$pelerinTab['numero_passeport']?>
                                                        </li>
                                                        <li class="list-group-item">
                                                            Nationalite : <?=$pelerinTab['nationalite']?>
                                                        </li>
                                                        <li class="list-group-item">
                                                            Telephone : <?=$pelerinTab['num_tel']?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>