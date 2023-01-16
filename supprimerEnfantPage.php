<?php
	include 'C:\wamp64\www\SAE\Code\mesFonctions.php';

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
		<title>Suppression enfant</title>
		<link rel="stylesheet" href="style_enfant.css">
	</head>
	<body>

		



















		<form action="supprimerEnfant.php" method="POST">

		<img
			src="t21complet.png"
			alt="Logo Trisomie 21"
			height="150px"
			width="500px" />

		<nav>
			<ul>
			  <li class="deroulant"><a href="#">Récemment consulté &ensp;</a>
				<ul class="sous">
				<?php
						  $req = $linkpdo->prepare("SELECT Nom, Prénom FROM enfant;");
						  
						  if ($req == false) {
							  die ('Error query');
						  
						  }
						  $req2 = $req->execute();
		  
						  if ($req2 == false) {
							  $req->DebugDumpParams();
							  die ('Error execute 2');
						  }
		  
						  while($data = $req->fetch()) {
					  ?>
					  <li><a href="#">Nom : <?php echo $data[0] . "<br>" . "Prénom : " . $data[1];?></a></li>
					  <?php
						  }
					  ?>
				</ul>
			  </li>
			  <li class="deroulant"><a href="#">Liste complète &ensp;</a>
				<ul class="sous">
				  <li><a href="#">À VENIR !</a></li>
				  <li><a href="#">À VENIR !</a></li>
				  <li><a href="#">À VENIR !</a></li>
				</ul>
			  </li>
			  <li><a href="#">À VENIR !</a></li>
			  <li><a href="#">À VENIR !</a></li>
			</ul>
		  </nav>







			
			


			<h1>Quel enfant voulez-vous supprimer ?</h1>

			<div class="Groupe">
				<input type="nom" required placeholder="Nom*" name="Nom" />
				<input type="prenom" required placeholder="Prenom*" name="Prenom" />
			</div>

			<div align="center">
				<button type="submit">Supprimer</button>
				<button><a href="formulaire_connexion.html">Annuler</a></button>
			</div>
			
		</form>
	</body>
</html>
