<?php
require_once("cn.php");
if (isset($_POST['rech'])) {
    extract($_POST);
    if ($rech == "1") {
        $affFac = $con->prepare("SELECT * FROM facture WHERE paye=0 AND 
                numero=?");
        $affFac->execute([$recherche]);
    }
} else {
    $affFac = $con->query("SELECT * FROM facture WHERE paye=0 ");
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Facturation</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">
                            <img src="logo.png" class="img-rounded" width="45" height="45" alt="Logo">
                        </a>
                    </div>

                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i> Accueil
                            </a>
                        </li>
                        <li>
                            <form action="accueil.php" method="POST" class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input name="recherche" type="text" class="form-control" placeholder="N° de facture: 14567665G78">
                                </div>
                                <button type="submit" name="rech" value="1" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-search"></i> Rechercher
                                </button>
                            </form>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">
                                <i class="glyphicon glyphicon-log-out"></i> Déconnexion
                            </a>
                        </li>
                    </ul>
                </nav>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr class="info">
                            <th>Numéro de facture</th>
                            <th>Mois</th>
                            <th>Montant</th>
                            <th>Cocher</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($tabFact = $affFac->fetch()) { ?>
                            <tr>
                                <td><?php echo $tabFact['numero'] ?></td>
                                <td><?php echo $tabFact['mois'] ?></td>
                                <td><?php echo $tabFact['montant'] ?></td>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <button class="btn btn-default"
                                        data-target="#Ajoutnum<?php echo $tabFact['idfacture'] ?>" data-toggle="modal">

                                        <i class="glyphicon glyphicon-ok"></i>&nbsp; Payer</button>
                                </td>
                            </tr>
                            <!-- Modal pour ajouter une tache-->
                            <div class="modal fade" id="Ajoutnum<?php echo $tabFact['idfacture'] ?>" tabindex="-1" aria-hidden="true" aria-labelledby="newnum" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content content-md">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo $tabFact['numero'] ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="facturation.php" method="POST">
                                                <input type="hidden" value="<?php echo $tabFact['idfacture'] ?>" name="idfacture">
                                                <input type="hidden" value="<?php echo $tabFact['montant'] ?>" name="montant">
                                                <input type="number" class="form-control" name="tel" required placeholder="Entrez le numero du telephone"><br><br><br>
                                                <button type="reset" class="btn btn-default pull-right">Annuler</button>
                                                <button type="submit" class="btn btn-primary  pull-right" name="action" value="1">Enregistrer</button><br><br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fin de Modal pour ajouter une tache-->
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>