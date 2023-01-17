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
		<link rel="stylesheet" href="style_modif.css">
		<title>Modification Objectif</title>
	</head>
	<body>

		<form action="modifEnfant.php" method="POST">

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
					<li><a href="http://localhost/SAE/Code/Mioche/Modifier_Ajouter_Supprimer%20Enfant/AjoutEnfantPage.php">Gestion enfants</a></li>
		  <li><a href="http://localhost/SAE/Code/User%20Story%20D%c3%a9poserRetirer%20Jeton_Points/Modifier_Ajouter_Supprimer%20Objectif/modifierObjectifPage.php">Gestion Jetons/Objectifs</a></li>
		  <li><a href="#">À VENIR !</a></li>
					</ul>
				  </li>
				  <li><a href="http://localhost/SAE/Code/Mioche/Modifier_Ajouter_Supprimer%20Enfant/AjoutEnfantPage.php">Ajouter</a></li>
			  	  <li><a href="http://localhost/SAE/Code/Mioche/supprimerEnfantPage.php">Supprimer</a></li>
				</ul>
			  </nav>
	
	
	
	
	
	
	
				<?php 
					$req = $linkpdo->prepare("SELECT Nom, Prénom, Date_Naissance, Lien_Jeton FROM enfant WHERE Nom = :nom AND Prénom = :prenom;");
							  
					if ($req == false) {
						die ('Error query');		  
					}
					$req2 = $req->execute(array('nom' => $_SESSION['Nom'],
										'prenom' => $_SESSION['Prenom']));
			  
					if ($req2 == false) {
						$req->DebugDumpParams();
						die ('Error execute 2');
					}

					$data = $req->fetch();
				?>
				
	
	
				<h1>Information sur l'enfant :  <?php echo $_SESSION['Nom'] . " " . $_SESSION['Prenom'];?></h1>
	
				<div class="Groupe">
					<input type="nom" placeholder="<?php echo $data[0];?>" name="Nom" />
					<input type="prenom" placeholder="<?php echo $data[1];?>" name="Prenom" />
					<input type="date" placeholder="<?php echo $data[2];?>" name="DateNaissance" />
					<input type="lien" placeholder="<?php echo $data[3];?>" name="Lien" />
				</div>
	
				<div align="center">
					<button type="submit">Modifier</button>
					<button><a href="formulaire_connexion.html">Annuler</a></button>
				</div>
				
			</form>
		</body>
























				<h1>Modifer enfant : </h1>
				<form action="modifEnfant.php" method="POST">
					<p>Nom de l'enfant à modifier : <input type="text" name="nomSet">
						Prénom de l'enfant à modifier : <input type="text" name="prenomSet">
					<p>Nouveau nom : <input type="text" name="nom"><br>
						<input type="submit" value="Modifer nom" name="submit_nom" class="submit"></p>
					<p>Nouveau prénom : <input type="text" name="prenom"><br>
						<input type="submit" value="Modifer prénom" name="submit_Prenom" class="submit"></p>
					<p>Nouvelle date de naissance : <input type="text" name="ddn"><br>
						<input type="submit" value="Modifer date de naissance" name="submit_ddn" class="submit"></p>
					<p>Nouveau lien vers les jetons : <input type="text" name="lien"><br>
						<input type="submit" value="Modifer lien" name="submit_lien" class="submit"></p>
				</form>

	</body>
</html>