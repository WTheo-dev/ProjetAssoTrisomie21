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















		
				
				<form action="calculJetons.php" method="POST" >

				<img
			src="t21complet.png"
			alt="Logo Trisomie 21"
			height="150px"
			width="500px" />

		<nav>
			<ul>
			  <li class="deroulant"><a href="#">Liste Objectif&ensp;</a>
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

		  <h1>Combien de jetons ajouter/retirer de l'objectif ?</h1>

			<div class="Groupe">
				<input type="Intitule" placeholder="Exemple : Être sage" name="inti" />
				<input type="Jeton" placeholder="5" name="jetons" />
			</div>

			<div align="center">
				<button type="submit" name="deposer"><input type="submit" name="deposer" value="+" class="button"/></button>
				<button type="submit" name="retirer"><input type="submit" name="retirer" value="-" class="button"/></button>
			</div>




















					<!--<p>Intitule de l'objectif : <input type="text" name="inti"><br>
						Gérer mes jetons : <input type="text" name="jetons"></p>
					<p><input type="submit" name="deposer" value="Déposer" class="submit">
					<input type="submit" name="retirer" value="Retirer" class="submit"></p>-->


					<h1 class="aChanger">Modifer objectif : </h1>
				<form action="modifObjectif.php" method="POST">
					<div class="Groupe">
						<input type="IdObj" placeholder="Choisir l'id de l'objectif" name="idObj">
						<input type="Intitule" placeholder="Modifier l'intitulé" name="intitule" />
						<input type="Durre" placeholder="Modifier la durée" name="duree" />
						<input type="Lien" placeholder="Modifier le lien" name="lien" />
						<input type="Priorite" placeholder="Modifier la priorité" name="priorite" />
						<input type="Travaille" placeholder="Modifier le travail" name="travaille" />
					<div\>

					<div align="center">
						<button type="submit"><input type="submit" value="Modifer libelle" name="submit_intitule" class="submit"></button>
						<button type="submit"><input type="submit" value="Modifer duree" name="submit_duree" class="submit"></button>
						<button type="submit"><input type="submit" value="Modifer lien" name="submit_lien" class="submit"></button>
						<button type="submit"><input type="submit" value="Modifer priorite" name="submit_priorite" class="submit"></button>
						<button type="submit"><input type="submit" value="Modifer travaille" name="submit_travaille" class="submit"></button>
					</div>



					<!--<p>Id de l'objectif à modifier : <input type="text" name="idObj">
					<p>libelle : <input type="text" name="intitule"><br>
						</p>
					<p>duree : <input type="text" name="duree"><br>
						</p>
					<p>lien : <input type="text" name="lien"><br>
						</p>
					<p>priorite : <input type="text" name="priorite"><br>
						</p>
					<p>travail : <input type="text" name="travaille"><br>
						</p>-->
				</form>
				</form>

	</body>
</html>