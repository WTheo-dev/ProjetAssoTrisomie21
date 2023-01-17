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
					  <li><a href="http://localhost/SAE/Code/Mioche/Modifier_Ajouter_Supprimer%20Enfant/modifierEnfantPage.php">Nom : <?php echo $data[0] . "<br>" . "Prénom : " . $data[1];?></a></li>
					  <?php
					  		$_SESSION['Nom'] = $data[0];
							$_SESSION['Prenom'] = $data[1];
						  }
					  ?>
				</ul>
			  </li>
			  <li class="deroulant"><a href="#">Liste complète &ensp;</a>
				<ul class="sous">
				<li><a href="http://localhost/SAE/Code/Mioche/Modifier_Ajouter_Supprimer%20Enfant/AjoutEnfantPage.php">Gestion enfants</a></li>
		  <li><a href="http://localhost/SAE/Code/User%20Story%20D%c3%a9poserRetirer%20Jeton_Points/Modifier_Ajouter_Supprimer%20Objectif/modifierObjectifPage.php">Gestion Jetons/Objectifs</a></li>
		  <li><a href="#">À VENIR !</a></li>
				</ul>
			  </li>
			  <li><a href="http://localhost/SAE/Code/Mioche/Modifier_Ajouter_Supprimer%20Enfant/AjoutEnfantPage.php">Ajouter</a></li>
			  <li><a href="http://localhost/SAE/Code/Mioche/supprimerEnfantPage.php">Supprimer</a></li>
			</ul>
		  </nav>







			
			


			<h1>Quel enfant voulez-vous retirer de la liste ?</h1>

			<div class="Groupe">
				<input type="nom" placeholder="Nom*" name="Nom" />
				<input type="prenom" placeholder="Prenom*" name="Prenom" />
			</div>

			<div align="center">
				<button type="submit">Supprimer</button>
				<button><a href="formulaire_connexion.html">Annuler</a></button>
			</div>
			
		</form>
	</body>
</html>