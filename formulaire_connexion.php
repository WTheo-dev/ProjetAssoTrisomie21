<?php
	session_start();

	if (isset($_POST['courriel']) && isset($_POST['mdp'])) {
		$email = $_POST['courriel'];
		$password = $_POST['mdp'];

		try {
			$linkpdo = new PDO("mysql:host=localhost;dbname=sae", 'root', '');
			$linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// use prepared statements to prevent SQL injection
			$stmt = $linkpdo->prepare("SELECT mdp FROM membre WHERE courriel = :email");
			$stmt->bindParam(':email', $email);
			$stmt->execute();
			$password_hash_from_db = $stmt->fetchColumn();

			if (password_verify($password, $password_hash_from_db)) {
				// password is correct, log in the user
				// redirect to the home page
				header('Location: accueilpostco.html');
				exit;
			} else {
				// password is incorrect, display an error message
				echo "Email ou mot de passe incorrect";
			}
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
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
		<img src="t21complet.png" alt="Logo Trisomie 21" height="150px" width="400px" />
		<h1>Se connecter</h1>
		<div class="inputs">
			<input type="email" required placeholder="Email" name="courriel" />
			<input type="password" required placeholder="Mot de passe" name="mdp">
		</div>
		<div align="center">
			<p class="inscription"><a href="motdepasseoublie.html">Mot de passe oublié</a></p>
		</div>
		<div align="center">
			<button type="submit">Se connecter</button>
		</div>
	</form>
</body>
</html>
