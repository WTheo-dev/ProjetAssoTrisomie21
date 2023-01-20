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
		<title>Modification Objectif</title>
	</head>
	<body>

		<form action="modifRecompense.php" method="POST">

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
							  $req = $linkpdo->prepare("SELECT Intitulé, descriptif FROM recompense;");
							  
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
								  //$_SESSION['Nom'] = $data[0];
								//$_SESSION['Prenom'] = $data[1];
							  }
						  ?>
					</ul>
				  </li>
				  <li class="deroulant"><a href="#">Liste Gestion &ensp;</a>
					<ul class="sous">
					<li><a href="http://localhost/SAE/Code/Mioche/Modifier_Ajouter_Supprimer%20Enfant/AjoutEnfantPage.php">Gestion enfants</a></li>
		  <li><a href="http://localhost/SAE/Code/User%20Story%20D%c3%a9poserRetirer%20Jeton_Points/Modifier_Ajouter_Supprimer%20Objectif/modifierObjectifPage.php">Gestion Jetons/Objectifs</a></li>
		  <li><a href="#">À VENIR !</a></li>
					</ul>
				  </li>
				  <li><a href="http://localhost/SAE/Code/Recompense/AjoutRecompensePage.php">Ajouter</a></li>
			  	  <li><a href="http://localhost/SAE/Code/Recompense/supprimerRecompensePage.php">Supprimer</a></li>
				</ul>
			  </nav>
	
	
	
	

				
	
	
				<h1 class="aChanger">Modifer récompense : </h1>
					<div class="Groupe">
						<input type="Intitule" placeholder="Intitulé de la récompense à modifier" name="intitule_modif" />
						<input type="Intitule" placeholder="Modifier l'intitulé" name="intitule" />
						<input type="Descriptif" placeholder="Modifier le descriptif" name="descriptif">
						<input type="Lien" placeholder="Modifier le lien image" name="lienImage" />
					<div\>

					<div align="center">
						<button type="submit"><input type="submit" value="Modifier l'intitulé" name="submit_intitule" class="submit"></button>
						<button type="submit"><input type="submit" value="Modifier le descriptif" name="submit_des" class="submit"></button>
						<button type="submit"><input type="submit" value="Lien image" name="submit_img" class="submit"></button>
					</div>
				
			</form>
		</body>
	</body>
</html>