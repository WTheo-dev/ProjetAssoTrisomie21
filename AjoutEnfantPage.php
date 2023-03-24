<?php
	session_start();


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
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style_ajout_enfant.css">
		<title>Ajout enfant</title>
	</head>
	<body>

		<form action="AjoutEnfant.php" method="POST">

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
						  <li><a href="modifierEnfantPage.php">Nom : <?php echo $data[0] . "<br>" . "Prénom : " . $data[1];?></a></li>
						  <?php
								  $_SESSION['Nom'] = $data[0];
								$_SESSION['Prenom'] = $data[1];
							  }
						  ?>
					</ul>
				  </li>
				  <li class="deroulant"><a href="AjoutEnfantPage.php"> Gestion enfant </a>
					<ul class="sous">
					<!-- <li><a href="AjoutEnfantPage.php">Gestion enfants</a></li>
		  <li><a href="http://localhost/SAE/Code/User%20Story%20D%c3%a9poserRetirer%20Jeton_Points/Modifier_Ajouter_Supprimer%20Objectif/modifierObjectifPage.php">Gestion Jetons/Objectifs</a></li>
		  <li><a href="#">À VENIR !</a></li> -->
					</ul>
				  </li>
				  <li><a href="AjoutEnfantPage.php">Ajouter</a></li>
			  	  <li><a href="supprimerEnfantPage.php">Supprimer</a></li>
				</ul>
			  </nav>
	
	
	
	
	
	
	
				
				
	
	
				<h1>Ajouter votre enfant ici</h1>
	
				<div class="Groupe">
					<input type="nom" required placeholder="Nom*" name="Nom" />
					<input type="prenom" required placeholder="Prenom*" name="Prenom" />
					<input type="date" required placeholder="Date de naissance*" name="DateNaissance" />
					<input type="Lien" placeholder="Lien vers jetons" name="Lien" />
				</div>
	
				<div align="center">
					<button type="submit">Ajouter</button>
					<button><a href="formulaire_connexion.html">Annuler</a></button>
				</div>
				
			</form>


	</body>
</html>