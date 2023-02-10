<?php

	session_start();

	if(isset($_POST['courriel']) && isset($_POST['mdp'])) {
    $email = $_POST['courriel'];
    $password = $_POST['mdp'];

	// récupération du mot de passe crypté de la base de données
	$password_hash_query = "SELECT mdp FROM utilisateurs WHERE courriel = '$email'";
	$result = mysqli_query($conn, $password_hash_query);
	$password_hash_from_db = mysqli_fetch_assoc($result)['mdp'];

	// vérification du mot de passe
	if (password_verify($password, $password_hash_from_db)) {
    	// mot de passe correct, connectez l'utilisateur
    	// redirection vers la page d'accueil
    header('Location: accueilpostco.html');
	} else {
    // mot de passe incorrect, affichez un message d'erreur
    echo "Email ou mot de passe incorrect";
	}

}

	try {
	 	$linkpdo = new PDO("mysql:host=localhost;dbname=sae", 'root', '');
	}
	catch (Exception $e) {
	 	die('Error : ' . $e->getMessage());
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulaire de connexion</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form action="formulaire_connexion.php" method="POST">
			
			<img
			src="t21complet.png"
			alt="Logo Trisomie 21"
			height="150px"
			width="400px" />

			<h1>Se connecter</h1>

			<div class="inputs">
			 	<input type="email" required placeholder="Email" name="courriel" />
				<input type="password" required placeholder="Mot de passe" name="mdp">
			</div>
			
				
			<div align="center">
			<p class="inscription"><a href="motdepasseoublie.html">Mot de passe oublié</a></p>	
			</div>
			<div align="center">
			  <button type="submit"><a href="accueilpostco.html">Se connecter</a></button>
			</div>
	</form>
</body>
</html>