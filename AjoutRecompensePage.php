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
		<title>Ajout enfant</title>
	</head>
	<body>

		<form action="AjoutRecompense.php" method="POST">

			<img
				src="t21complet.png"
				alt="Logo Trisomie 21"
				height="150px"
				width="500px" />
	
			<nav>
				<ul>
				  <li class="deroulant"><a href="#">Liste récompenses &ensp;</a>
					<ul class="sous">
					<?php
							  $req = $linkpdo->prepare("SELECT Intitulé, descriptif FROM récompense;");
							  
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
						  <li><a href="modifierRecompensePage.php">Intitulé : <?php echo $data[0] . "<br>" . "Descriptif : " . $data[1];?></a></li>
						  <?php
								  //$_SESSION['Nom'] = $data[0];
								//$_SESSION['Prenom'] = $data[1];
							  }
						  ?>
					</ul>
				  </li>
				  <li class="deroulant"><a href="#">Liste Gestion &ensp;</a>
					<ul class="sous">
					<li><a href="modifierObjectifPage.php">Gestion Jetons/Objectifs</a></li>
		  <li><a href="AjoutRecompensePage.php">Gestion récompense</a></li>
					</ul>
				  </li>
				  <li><a href="AjoutRecompensePage.php">Ajouter</a></li>
			  	  <li><a href="supprimerRecompensePage.php">Supprimer</a></li>
				</ul>
			  </nav>
	
	
	
	
	
	
	
				
				
	
	
				<h1>Ajouter votre récompense ici</h1>
	
				<div class="Groupe">
					<input type="intitule" required placeholder="Intitule de la récompense" name="intitule" />
					<input type="descriptif" required placeholder="Descriptif de la récompense" name="descriptif" />
					<input type="Lien" required placeholder="Lien image" name="lien_jetons" />
				</div>
	
				<div align="center">
					<button type="submit">Ajouter</button>
					<button><a href="formulaire_connexion.html">Annuler</a></button>
				</div>
				
			</form>


	</body>
</html>