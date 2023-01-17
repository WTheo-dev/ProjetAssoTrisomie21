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

 	$req2 = $req->execute(array('nom' => $_POST["Nom"],
 						'prenom' => $_POST["Prenom"],
						'ddn' => $_POST["DateNaissance"],
						'lien' => $_POST["Lien"]));

 	if ($req2 == false) {
 		$req->DebugDumpParams();
 		die ('Error execute');
 	}

	 header("Location: http://localhost/SAE/Code/Mioche/Modifier_Ajouter_Supprimer%20Enfant/AjoutEnfantPage.php");
 
	 exit;
?>