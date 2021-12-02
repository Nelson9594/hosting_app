<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="../style.css" rel="stylesheet">
	

	<?php
		require('config.php');

		if (isset($_REQUEST['nom'],
					$_REQUEST['prenom'],
					$_REQUEST['motif'],
					$_REQUEST['societe'],
					$_REQUEST['email'],
					$_REQUEST['password'],
					$_REQUEST['username'])){

			// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
			$nom = stripslashes($_REQUEST['nom']);
			$nom = mysqli_real_escape_string($conn, $nom);

			// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
			$prenom = stripslashes($_REQUEST['prenom']);
			$prenom = mysqli_real_escape_string($conn, $prenom);

			// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
			$motif = stripslashes($_REQUEST['motif']);
			$motif = mysqli_real_escape_string($conn, $motif);

			// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
			$societe = stripslashes($_REQUEST['societe']);
			$societe = mysqli_real_escape_string($conn, $societe);

			// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
			$email = stripslashes($_REQUEST['email']);
			$email = mysqli_real_escape_string($conn, $email);

			// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
			$password = stripslashes($_REQUEST['password']);
			$password = mysqli_real_escape_string($conn, $password);

			$username = stripslashes($_REQUEST['username']);
			$username = mysqli_real_escape_string($conn, $username);
			
			$query = "INSERT into `users` (nom, prenom, motif, societe, email, password, username)
						VALUES ('$nom', '$prenom', '$motif', '$societe','$email', '$password', '$username')";

			$res = mysqli_query($conn, $query);

			if($res){
			echo "<div class='sucess'>
					<h3>Vous êtes inscrit avec succès.</h3>
					<p>Cliquez ici pour vous <a href='connexion.php'>connecter</a></p>
					</div>";
			}
		}else{
	?>
	
    <title>Formulaire d'inscription</title>
  </head>
  <body>	
	
		<form class="row g-3" action="" method="POST">
		
		  <div class="col-md-6">
			<input type="text" class="form-control" id="inputEmail4" name="nom" placeholder="Nom">
		  </div>
		  
		  <div class="col-md-6">
			<input type="text" class="form-control" id="inputPassword4" name="prenom" placeholder="Prénom">
		  </div>
		  
		  <div class="input-group mb-1">
			  <button class="btn btn-outline-secondary" type="button">Je suis la </button>
			  <select class="form-select" id="inputGroupSelect03" name="motif" aria-label="Example select with button addon">
				<option selected>pour ...</option>
				<option value="1">visité ton site web seulement pour m'inspiré un peu</option>
				<option value="2">en connaitre un peu plus sur toi pour un recrutement</option>
				<option value="3">avoir accés à mes projets secrets</option>
			  </select>
			</div>
		
		  <div class="col-12">
			<input type="text" class="form-control" id="inputAddress" name="societe" placeholder="Société">
		  </div>
		  
		  <div class="col-12">
			<input type="text" class="form-control" id="inputAddress" name="email" placeholder="E-mail" required>
		  </div>
		  
		  <div class="col-md-6">
			<input type="password" class="form-control" id="Mots de passe" name="password" placeholder="Mots de passe">
		  </div>

		  <div class="col-md-6">
			<input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur">
		  </div>
		  
		  <center>
			  <div class="col-12">
				<button type="submit" class="btn btn-primary">M'inscrire</button>
			  </div>
			</center>
			
		</form>

		<?php } ?>
		
		<br>
		
		<center>
			<a href="connexion.php">
				Déja inscrit ?
			</a>
		</center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="index.js"></script>
  </body>
</html>