<?php
	session_start();


	include 'mesFonctions.php';

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
		<title>Ajout Objectif</title>
	</head>
	<body>





	<form action="AjoutObjectif.php" method="POST">

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
			  <li><a href="modifierObjectifPage.php">Id : <?php echo $data[0] . "<br>" . "Intitule : " . $data[1] . "<br>" . "Jetons : ". $data[2];?></a></li>
			  <?php
					  $_SESSION['Nom'] = $data[0];
					$_SESSION['Prenom'] = $data[1];
				  }
			  ?>
		</ul>
	  </li>
	  <li class="deroulant"><a href="#">Liste Gestion &ensp;</a>
		<ul class="sous">
		<li><a href="AjoutEnfantPage.php">Gestion enfants</a></li>
		  <li><a href="modifierObjectifPage.php">Gestion Jetons/Objectifs</a></li>
		  <li><a href="#">À VENIR !</a></li>
		</ul>
	  </li>
	  <li><a href="AjoutObjectifPage.php">Ajouter</a></li>
		<li><a href="supprimerObjectifPage.php">Supprimer</a></li>
	</ul>
  </nav>


  <h1>Ajouter votre objectif ici</h1>
	
				<div class="Groupe">
					<input type="nom" required placeholder="Entrer l'intitulé" name="intitule" />
					<input type="prenom" required placeholder="Entrer nombre de jetons" name="nb_jeton" />
					<input type="Duree" required placeholder="Entrer durée" name="duree" />
					<input type="Lien" placeholder="Entrer lien" name="lien" />
					<input type="nom" required placeholder="Entrer priorité" name="priorite" />
					<input type="prenom" required placeholder="Entrer travail" name="travaille" />
				</div>
	
				<div align="center">
					<button type="submit">Ajouter</button>
					<button><a href="formulaire_connexion.html">Annuler</a></button>
				</div>





















	</body>
</html>