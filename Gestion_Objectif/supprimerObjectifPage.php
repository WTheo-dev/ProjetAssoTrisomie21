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
		<link rel="stylesheet" href="style.css">
		<title>Supprimer Objectif</title>
	</head>
	<body>






		<form action="supprimerObjectif.php" method="POST">
		<img
	src="t21complet.png"
	alt="Logo Trisomie 21"
	height="150px"
	width="500px" />

<nav>
	<ul>
	  <li class="deroulant"><a href="#">Liste Objectif &ensp;</a>
		<ul class="sous">
		<?php
				  $req = $linkpdo->prepare("SELECT Id_Objectif, Intitule, Nb_Jetons FROM objectif;");
				  
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
			  <li><a href="Gestion_Objectif\modifierObjectifPage.php">Id : <?php echo $data[0] . "<br>" . "Intitule : " . $data[1] . "<br>" . "Jetons : ". $data[2];?></a></li>
			  <?php
					  $_SESSION['Nom'] = $data[0];
					$_SESSION['Prenom'] = $data[1];
				  }
			  ?>
		</ul>
	  </li>
	  <li class="deroulant"><a href="#">Liste Gestion &ensp;</a>
		<ul class="sous">
		<li><a href="Gestion_Enfant\Modifier_Ajouter_Supprimer Enfant\AjoutEnfantPage.php">Gestion enfants</a></li>
		  <li><a href="Gestion_Objectif\modifierObjectifPage.php">Gestion Jetons/Objectifs</a></li>
		  <li><a href="#">À VENIR !</a></li>
		</ul>
	  </li>
	  <li><a href="Gestion_Objectif\AjoutObjectifPage.php">Ajouter</a></li>
		<li><a href="Gestion_Objectif\supprimerObjectifPage.php">Supprimer</a></li>
	</ul>
  </nav>

  <h1>Quel objectif voulez-vous supprimer ?</h1>

  <div class="Groupe">
					<input type="IdObj" placeholder="Entrer l'Id" name="idObj" />
	</div>
	
	<div align="center">
					<button type="submit">Supprimer</button>
					<button><a href="formulaire_connexion.html">Retour</a></button>
	</div>
		</form>
	</body>
</html>