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
		session_start();

		if (isset($_POST['username'])){
			$username = stripslashes($_REQUEST['username']);
			$username = mysqli_real_escape_string($conn, $username);
			$_SESSION['username'] = $username;
			$password = stripslashes($_REQUEST['password']);
			$password = mysqli_real_escape_string($conn, $password);
			$query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
			$result = mysqli_query($conn,$query) or die(mysql_error());
			
			if (mysqli_num_rows($result) == 1) {
				$user = mysqli_fetch_assoc($result);
				// vérifier si l'utilisateur est un administrateur ou un utilisateur
				if ($user['type'] == 'admin') {
					header('location: admin/home.php');		  
				}else{
					header('location: index.php');
				}
			}else{
				$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
			}
		}
	?>
	
	
    <title>Connecte toi </title>
  </head>
  <body>	
	
		<form class="row g-3" action="" method="POST" name="login">
		
		  <div class="col-md-6">
			<input type="text" class="form-control" id="inputEmail4" name="username" placeholder="Nom d'utilisateur" required>
		  </div>
		  
		  <div class="col-md-6">
			<input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Mots de Passe">
		  </div>
		  
			<center>
				<div class="col-12">
					<button type="submit" class="btn btn-primary">C'est partis</button>
				</div>
			</center>
			
		</form>
		
		<br>

		<?php if (! empty($message)) { ?>
			<p class="errorMessage"><?php echo $message; ?></p>
		<?php } ?>

		
		<center>
			<a href="inscription.php">
				Pas encore inscrit ?
			</a>
		</center>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="index.js"></script>
  </body>
</html>