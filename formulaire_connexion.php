<?php
	try {
	 	$linkpdo = new PDO("mysql:host=NOM_DU_HOST_ICI;dbname=NOM_DE_LA_BDD_ICI", 'root', '');
	}
	catch (Exception $e) {
	 	die('Error : ' . $e->getMessage());
	}

	//Il faudra sûrement changer l'ordre de la requête en fonction des colonnes que vous avez fait dans la BDD.
	$req = $linkpdo->prepare('SELECT * FROM NOM_DE_LA_BDD WHERE Adresse = :adresse AND Mot_de_passe = :mdp;');

	if ($req == false) {
	 	die ('Error query');
	}

	$req2 = $req->execute(array('adresse' => $_POST["adresse"],
								'mdp' => $_POST["mdp"]));

 	if ($req->fetch() != false) {
 		// REDIRIGER VERS LA PAGE ACCUEIL DE L'UTILISATEUR.
 	}
 	else {
 		// SIGNALER QU'IL Y A UN PROBLEME SOIT AVEC L'ADRESSE SOIT AVEC LE MOT DE PASSE.
 	}

	if ($req2 == false) {
	 	die ('Error execute');
	 	$req->DebugDumpParams();
	}
?>