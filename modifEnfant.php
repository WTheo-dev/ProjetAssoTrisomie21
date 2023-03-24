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
		case isset($_POST["Prenom"]):
			$maReq = 'UPDATE enfant SET Prénom=:prenom WHERE Nom = :nomSet AND Prénom = :prenomSet;';
			$wesh = array('prenomSet' => $_SESSION['Prenom'], 'nomSet' => $_SESSION['Nom'], 'prenom' => $_POST['Prenom']);
			prepare_and_execute($maReq, $wesh);
			break;
		case isset($_POST["Nom"]):
			$maReq = 'UPDATE enfant SET Nom=:nom WHERE Nom = :nomSet AND Prénom = :prenomSet;';
			$wesh = array('prenomSet' => $_SESSION['Prenom'], 'nomSet' => $_SESSION['Nom'], 'nom' => $_POST['Nom']);
			prepare_and_execute($maReq, $wesh);
			break;
		case isset($_POST["Lien"]):
			$maReq = 'UPDATE enfant SET Lien_Jeton=:lien WHERE Nom = :nomSet AND Prénom = :prenomSet;';
			$wesh = array('prenomSet' => $_SESSION['Prenom'], 'nomSet' => $_SESSION['Nom'], 'lien' => $_POST["Lien"]);
			prepare_and_execute($maReq, $wesh);
			break;
		case isset($_POST["DateNaissance"]):
			$maReq = 'UPDATE enfant SET Date_Naissance=:ddn WHERE Nom = :nomSet AND Prénom = :prenomSet;';
			$wesh = array('prenomSet' => $_SESSION['Prenom'], 'nomSet' => $_SESSION['Nom'], 'ddn' => $_POST["DateNaissance"]);
			prepare_and_execute($maReq, $wesh);
			break;
		default:
			
	}

	header("Location: AjoutEnfantPage.php");
 
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

