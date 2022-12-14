<?php
	try {
 		$linkpdo = new PDO("mysql:host=localhost;dbname=sae", 'root', '');
 	}
 	catch (Exception $e) {
 		die('Error : ' . $e->getMessage());
 	}

 	$req = $linkpdo->prepare('INSERT INTO enfant VALUES ("", :nom, :prenom, :ddn, :lien)');

 	if ($req == false) {
 		die ('Error preparation');
 	}

 	$req2 = $req->execute(array('nom' => $_POST["nom"],
 						'prenom' => $_POST["prenom"],
						'ddn' => $_POST["ddn"],
						'lien' => $_POST["lien"]));

 	if ($req2 == false) {
 		$req->DebugDumpParams();
 		die ('Error execute');
 	}
?>