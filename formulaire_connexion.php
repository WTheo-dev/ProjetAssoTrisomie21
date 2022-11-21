<?php
	try {
	 	$linkpdo = new PDO("mysql:host=localhost;dbname=sae", 'root', '');
	}
	catch (Exception $e) {
	 	die('Error : ' . $e->getMessage());
	}

	//Il faudra sûrement changer l'ordre de la requête en fonction des colonnes que vous avez fait dans la BDD.
	$req = $linkpdo->prepare('SELECT * FROM membre WHERE Courriel = :email AND mdp = :mdp;');

	if ($req == false) {
	 	die ('Error query');
	}

	$req2 = $req->execute(array('email' => $_POST["courriel"],
					'mdp' => $_POST["mdp"]));

	//rowCount()
 	if ($req->rowCount() > 0) {
 		echo "Bienvenu sur la page d'accueil !";
 	}
 	else {
 		echo "Je ne vous connais pas, désolé.";
 	}

	if ($req2 == false) {
	 	die ('Error execute');
	 	$req->DebugDumpParams();
	}
?>