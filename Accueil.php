<?php
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
                        <button class="btn btn-default">+ Nouveau pèlerin</button>
                        <div class="pull-right">
                            <input type="text" placeholder="Rechercher" class="form-control input-sm" style="display:inline-block; width: 200px;">
                            <button class="btn btn-default btn-sm">Rechercher</button>
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
                                <a href="#" class="text-decoration-none">
                                    <span class="glyphicon glyphicon-user"></span> Les pèlerins <span class="badge">352</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="text-decoration-none">
                                    <span class="glyphicon glyphicon-plane"></span> Hadj <span class="badge">56</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="text-decoration-none">
                                    <span class="glyphicon glyphicon-plane"></span> Oumra <span class="badge">21</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="text-decoration-none">
                                    <span class="glyphicon glyphicon-cog"></span> Paramètres voyages
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="text-decoration-none">
                                    <span class="glyphicon glyphicon-user"></span> Partenaires <span class="badge">1</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="logout.php" class="text-decoration-none">
                                    <span class="glyphicon glyphicon-log-out"></span> Déconnexion
                                </a>
                            </li>
                        </ul>
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
                                <tr>
                                    <td>2541</td>
                                    <td><img src="" class="photo-thumbnail" alt="photo"></td>
                                    <td>Almou Bassirou</td>
                                    <td>Hadj 2018</td>
                                    <td>950000 (85%)</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown">
                                                <span class="glyphicon glyphicon-cog"></span> Menu <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Versement</a></li>
                                                <li><a href="#">Imprimer le reçu</a></li>
                                                <li><a href="#">Détails</a></li>
                                                <li><a href="#">Modification</a></li>
                                                <li><a href="#">Supprimer</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>