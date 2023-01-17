<?php
	try {
 		$linkpdo = new PDO("mysql:host=localhost;dbname=projetphp", 'root', '');
 	}
 	catch (Exception $e) {
 		die('Error : ' . $e->getMessage());
 	}

 	$req = $linkpdo->prepare('INSERT INTO objectif VALUES ("", :intituler, :nb_jeton, :duree, :lien, :priorite, :travaille, 5, 5)');

 	if ($req == false) {
 		die ('Error preparation');
 	}

 	$req2 = $req->execute(array('intituler' => $_POST["intitule"],
 						'nb_jeton' => $_POST["nb_jeton"],
						'duree' => $_POST["duree"],
						'lien' => $_POST["lien"],
						'priorite' =>  $_POST["priorite"],
						'travaille' => $_POST["travaille"]));

 	if ($req2 == false) {
 		$req->DebugDumpParams();
 		die ('Error execute');
 	}
?>