<?php
	include 'C:\wamp64\www\SAE\Code\mesFonctions.php';

	$wesh = array('idObj' => $_POST['idObj']);
	$maReq = '';

	try {
 		$linkpdo = new PDO("mysql:host=localhost;dbname=projetphp", 'root', '');
 	}
 	catch (Exception $e) {
 		die('Error : ' . $e->getMessage());
 	}

	/*switch($_POST) {
		case isset($_POST["intitule"]):
			$maReq .= 'UPDATE objectif SET Intitule=:intitule WHERE id_objectif = :idObj;';
			array_merge($wesh, array('intitule' => $_POST["intitule"]));
			break;
		case isset($_POST["duree"]):
			$maReq .= 'UPDATE objectif SET Durée=:duree WHERE id_objectif = :idObj;';
			array_merge($wesh, array('duree' => $_POST["duree"]));
			break;
		case isset($_POST["lien"]):
			$maReq .= 'UPDATE objectif SET Lien=:lien WHERE id_objectif = :idObj;';
			array_merge($wesh, array('lien' => $_POST["lien"]));
			break;
		case isset($_POST["priorite"]):
			$maReq .= 'UPDATE objectif SET Priorité=:priorite WHERE id_objectif = :idObj;';
			array_merge($wesh, array('priorite' => $_POST["priorite"]));
			break;
		case isset($_POST["travaille"]):
			$maReq .= 'UPDATE objectif SET Travaillé=:travail WHERE id_objectif = :idObj;';
			array_merge($wesh, array('travail' =>  $_POST["travaille"]));
			break;
		default:
			
	}*/

	echo 'Avant modification de la table objectif : ' . '<br>' . '<br>' .  afficherTable('objectif');

	switch($_POST) {
		case isset($_POST["submit_intitule"]):
			$maReq = 'UPDATE objectif SET Intitule=:intitule WHERE id_objectif = :idObj;';
			$wesh = array('idObj' => $_POST['idObj'], 'intitule' => $_POST["intitule"]);
			prepare_and_execute($maReq, $wesh);
			break;
		case isset($_POST["submit_duree"]):
			$maReq = 'UPDATE objectif SET Durée=:duree WHERE id_objectif = :idObj;';
			$wesh = array('idObj' => $_POST['idObj'], 'duree' => $_POST["duree"]);
			prepare_and_execute($maReq, $wesh);
			break;
		case isset($_POST["submit_lien"]):
			$maReq = 'UPDATE objectif SET Lien_Image=:lien WHERE id_objectif = :idObj;';
			$wesh = array('idObj' => $_POST['idObj'], 'lien' => $_POST["lien"]);
			prepare_and_execute($maReq, $wesh);
			break;
		case isset($_POST["submit_priorite"]):
			$maReq = 'UPDATE objectif SET Priorité=:priorite WHERE id_objectif = :idObj;';
			$wesh = array('idObj' => $_POST['idObj'], 'priorite' => $_POST["priorite"]);
			prepare_and_execute($maReq, $wesh);
			break;
		case isset($_POST["submit_travaille"]):
			$maReq = 'UPDATE objectif SET Travaillé=:travail WHERE id_objectif = :idObj;';
			$wesh = array('idObj' => $_POST['idObj'], 'travail' =>  $_POST["travaille"]);
			prepare_and_execute($maReq, $wesh);
			break;
		default:
			
	}

	echo 'Après modification de la table objectif : ' . '<br>' . '<br>' .  afficherTable('objectif');

 	/*$req = $linkpdo->prepare($maReq);

 	if ($req == false) {
 		die ('Error preparation');
 	}

 	$req2 = $req->execute($wesh);

 	if ($req2 == false) {
 		$req->DebugDumpParams();
 		die ('Error execute');
 	}*/
?>

