<?php
	try {
 		$linkpdo = new PDO("mysql:host=NOM_DU_HOST_ICI;dbname=NOM_DE_LA_BDD_ICI", 'root', '');
 	}
 	catch (Exception $e) {
 		die('Error : ' . $e->getMessage());
 	}


 	// ON VERIFIE QU'IL N'EXISTE PAS DEJA UN COMPTE SEMBLABLE.
 	$req = $linkpdo->prepare('SELECT * FROM NOM_DE_LA_BDD WHERE Adresse = :adresse OR Mot_de_passe = :mdp;');

	if ($req == false) {
	 	die ('Error query');
	}

	$req2 = $req->execute(array('adresse' => $_POST["adresse"],
					'mdp' => $_POST["mdp"]));
	if ($req2 == false) {
		die ('Error execute');
		$req->DebugDumpParams();
	}

	// SI IL TROUVE DES COMPTE AVEC MEME MOT DE PASSE OU LOGIN :
 	if ($req->fetch() != false) {
 		// DIRE QU'IL EXISTE DEJA UN COMPTE AVEC LE MEME LOGIN.
 	}
 	else {
 		// AUCUN PROBLEME.
 		//Il faudra sûrement changer l'ordre de la requête en fonction des colonnes que vous avez fait dans la BDD.
	 	$req = $linkpdo->prepare('INSERT INTO NOM_DE_LA_BDD VALUES (/*Les guillemets vide ici sont pour le id*/"", :nom, :prenom, :adresse, :mot_de_passe, :ville, :code_postal, :date_de_naissance)');

	 	if ($req == false) {
	 		die ('Error preparation');
	 	}

	 	$req2 = $req->execute(array('nom' => $_POST["nom"],
	 						'prenom' => $_POST["prenom"],
							'adresse' => $_POST["adresse"],
							'mot_de_passe' => $_POST["mdp"],
							'ville' =>  $_POST["vil"],
							'code_postal' => $_POST["cp"],
	 						'date_de_naissance' => $_POST["ddn"]));

	 	if ($req2 == false) {
	 		$req->DebugDumpParams();
	 		die ('Error execute');
	 	}
	}
?>
