<?php
	session_start();

	include 'C:\wamp64\www\SAE\Code\mesFonctions.php';

	$wesh = array();
	$maReq = '';

	try {
 		$linkpdo = new PDO("mysql:host=localhost;dbname=sae", 'root', '');
 	}
 	catch (Exception $e) {
 		die('Error : ' . $e->getMessage());
 	}

	/*switch($_POST) {
		case isset($_POST["Prénom"]):
			$maReq .= 'UPDATE enfant SET Prénom=:Prénom WHERE Nom = :nom AND Prénom = :prenom;';
			array_merge($wesh, array('Prénom' => $_POST["Prénom"]));
			break;
		case isset($_POST["nom"]):
			$maReq .= 'UPDATE enfant SET Durée=:nom WHERE Nom = :nom AND Prénom = :prenom;';
			array_merge($wesh, array('nom' => $_POST["nom"]));
			break;
		case isset($_POST["lien"]):
			$maReq .= 'UPDATE enfant SET Lien=:lien WHERE Nom = :nom AND Prénom = :prenom;';
			array_merge($wesh, array('lien' => $_POST["lien"]));
			break;
		case isset($_POST["ddn"]):
			$maReq .= 'UPDATE enfant SET Priorité=:ddn WHERE Nom = :nom AND Prénom = :prenom;';
			array_merge($wesh, array('ddn' => $_POST["ddn"]));
			break;
		case isset($_POST["travaille"]):
			$maReq .= 'UPDATE enfant SET Travaillé=:travail WHERE Nom = :nom AND Prénom = :prenom;';
			array_merge($wesh, array('travail' =>  $_POST["travaille"]));
			break;
		default:
			
	}*/

	switch($_POST) {
		case isset($_POST["submit_intitule"]):
			$maReq = 'UPDATE recompense SET Intitulé=:intitule WHERE Intitulé = :intitule_modif;';
			$wesh = array('intitule_modif' => $_POST['intitule_modif'], 'intitule' => $_POST["intitule"]);
			prepare_and_execute($maReq, $wesh);
			break;
		case isset($_POST["submit_des"]):
			$maReq = 'UPDATE recompense SET Descriptif=:descriptif WHERE id_objectif = :intitule_modif;';
			$wesh = array('intitule_modif' => $_POST['intitule_modif'], 'descriptif' => $_POST["descriptif"]);
			prepare_and_execute($maReq, $wesh);
			break;
		case isset($_POST["submit_img"]):
			$maReq = 'UPDATE recompense SET Lien_Image=:lien WHERE id_objectif = :intitule_modif;';
			$wesh = array('intitule_modif' => $_POST['intitule_modif'], 'lien' => $_POST["lienImage"]);
			prepare_and_execute($maReq, $wesh);
			break;
		default:
			
	}

	header("Location: http://localhost/SAE/Code/Recompense/modifierRecompensePage.php");
 
	exit;

	echo 'Après modification de la table enfant : ' . '<br>' . '<br>' .  afficherTable('enfant');

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

