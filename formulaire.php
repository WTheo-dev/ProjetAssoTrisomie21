<?php
	try {
 		$linkpdo = new PDO("mysql:host=localhost;dbname=sae", 'root', '');
 	}
 	catch (Exception $e) {
 		die('Error : ' . $e->getMessage());
 	}


 	// ON VERIFIE QU'IL N'EXISTE PAS DEJA UN COMPTE SEMBLABLE.
 	$req = $linkpdo->prepare('SELECT * FROM membre WHERE Adresse = :adresse OR Mdp = :mdp;');

	if ($req == false) {
	 	die ('Error query');
	}

	$req2 = $req->execute(array('adresse' => $_POST["adresse"],
								'mdp' => $_POST["mdp"]));
	if ($req2 == false) {
		$req->DebugDumpParams();
		die ('Error execute');
	}

	// SI IL TROUVE DES COMPTE AVEC MEME MOT DE PASSE OU LOGIN :

	$req = $linkpdo->prepare('INSERT INTO membre VALUES (NULL, :nom, :prenom, :adresse, :code_postal, :ville, :courriel, :date_de_naissance, :mot_de_passe, NULL, NULL)');

	if ($req == false) {
	 	die ('Error preparation');
	}

	$req2 = $req->execute(array('nom' => $_POST["nom"],
	 					'prenom' => $_POST["prenom"],
						'adresse' => $_POST["adresse"],
						'code_postal' => $_POST["cp"],
						'ville' =>  $_POST["vil"],
						'courriel' => $_POST["adresseE"],
						'date_de_naissance' => $_POST["ddn"],
						'mot_de_passe' => $_POST["mdp"]));

	if ($req2 == false) {
		$req->DebugDumpParams();
	 	die ('Error execute 2');
	}
	header('Location:formulaire_connexion.php');


?>
