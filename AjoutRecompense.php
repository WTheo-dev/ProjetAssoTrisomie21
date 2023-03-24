<?php
	try {
 		$linkpdo = new PDO("mysql:host=localhost;dbname=sae", 'root', '');
 	}
 	catch (Exception $e) {
 		die('Error : ' . $e->getMessage());
 	}

 	$req = $linkpdo->prepare('INSERT INTO récompense VALUES ("", :intitule, :descriptif, :lien_jetons)');

 	if ($req == false) {
 		die ('Error preparation');
 	}

 	$req2 = $req->execute(array('intitule' => $_POST["intitule"],
 						'descriptif' => $_POST["descriptif"],
						'lien_jetons' => $_POST["lien_jetons"]));

 	if ($req2 == false) {
 		$req->DebugDumpParams();
 		die ('Error execute');
 	}

	/*$req = $linkpdo->prepare('SELECT Id_Récompense FROM récompense');

 	if ($req == false) {
 		die ('Error preparation');
 	}

 	$req2 = $req->execute();

 	if ($req2 == false) {
 		$req->DebugDumpParams();
 		die ('Error execute');
 	}

	while($data->fetch()){

	}*/

	 header("Location: AjoutrecompensePage.php");
 
	 exit;
?>