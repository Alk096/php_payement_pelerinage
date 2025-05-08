<?php
	session_start();
	// Définir la page active (par exemple, via une variable GET ou une logique serveur)
	$pageActive = isset($_GET['page']) ? $_GET['page'] : 'connexion';

	$navTabs = [
		'connexion' => 'Connexion',
		'preinscription' => 'Demande de pre-inscription'
	];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$pageActive ?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4 ">
				<br><br><br>
				<p class="text-center"><img src="logo_imani.png" class="img img-rounded" width="150" height="150"></p><br>
				<ul class="nav nav-tabs">
					<?php foreach($navTabs as $key => $label): ?>
						<li role="presentation" class="<?= $pageActive === $key ? 'active' : '' ?>">
							<a href="?page=<?= $key ?>"><?=$label ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
				<br><br>
				<?php if(isset($_SESSION['error'])): ?>
					<p class="text-danger">
						<?=$_SESSION['error'] ?>
						<?php unset($_SESSION['error']); ?>
					</p>
				<?php endif ;?>
				<?php if("connexion" === $pageActive):?>
					<form method="POST" action="connexion.php">
						<div class="form-group">
							<label for="email" class="form-label">Compte</label>
							<input type="text" name="compte" class="form-control" placeholder="Compte utilisateur" required>
						</div>
						<div class="form-group">
							<label for="password" class="form-label">Mot de passe</label>
							<input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
						</div>
						<div class="checkbox">
                        	<label><input type="checkbox" value="admin"> Administrateur ?</label>
                    	</div>
						<button type="submit" name="action" value="1" class="btn btn-info btn-block glyphicon glyphicon-log-in">&nbsp;Connexion </button>
					</form>
				<?php else: ?>
					<form method="POST" action="preinscription.php">
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
						<div class="form-group">
							<label>Je souhaite effectuer:</label>
							<label class="radio-inline">
								<input type="radio" name="type_voyage" value="Hadj"> Hadj
							</label>
							<label class="radio-inline">
								<input type="radio" name="type_voyage" value="Oumra"> Oumra
							</label>
						</div>
						<button type="submit" name="action" value="1" class="btn btn-info btn-block glyphicon glyphicon-pencil">&nbsp;Connexion </button>
					</form>
				<?php endif; ?>
			</div>
		</div>
	</div> 
</body>
</html>