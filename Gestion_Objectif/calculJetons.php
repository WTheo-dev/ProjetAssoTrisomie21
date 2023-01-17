<?php
	include 'C:\wamp64\www\SAE\Code\mesFonctions.php';

	$wesh = array('idObj' => $_POST['idObj']);
	$maReq = '';

	try {
 		$linkpdo = new PDO("mysql:host=localhost;dbname=sae", 'root', '');
 	}
 	catch (Exception $e) {
 		die('Error : ' . $e->getMessage());
 	}

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




	//OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOW

	 $req = $linkpdo->prepare('SELECT * FROM objectif');

	 if ($req == false) {
		 die ('Error query');
	 }
 
	 $req2 = $req->execute();
 
	 if ($req2 == false) {
		 $req2->DebugDumpParams();
		 die ('Error execute 1');
	 }

	echo 'Avant modification du stock de jetons : ' . '<br>' . '<br>' .  afficherTable('objectif');

	if (isset($_POST['deposer'])) {
		$req = $linkpdo->prepare('UPDATE objectif SET Nb_Jetons = Nb_Jetons + :deposer WHERE intitule = :intitule');

		if ($req == false) {
			die ('Error query');
		}

		$req2 = $req->execute(array('deposer' => $_POST['jetons'], 'intitule' => $_POST['inti']));

		if ($req2 == false) {
			$req2->DebugDumpParams();
			die ('Error execute 1');
		}
	}
	elseif (isset($_POST['retirer'])) {
		$req = $linkpdo->prepare('UPDATE objectif SET Nb_Jetons = Nb_Jetons - :retirer WHERE intitule = :intitule');

		if ($req == false) {
			die ('Error query');
		}

		$req2 = $req->execute(array('retirer' => $_POST['jetons'], 'intitule' => $_POST['inti']));

		if ($req2 == false) {
			$req2->DebugDumpParams();
			die ('Error execute 1');
		}
	}

	$req = $linkpdo->prepare('SELECT * FROM objectif');

	 if ($req == false) {
		 die ('Error query');
	 }
 
	 $req2 = $req->execute();
 
	 if ($req2 == false) {
		 $req2->DebugDumpParams();
		 die ('Error execute 1');
	 }

	 header("Location: http://localhost/SAE/Code/User%20Story%20D%C3%A9poserRetirer%20Jeton_Points/Modifier_Ajouter_Supprimer%20Objectif/modifierObjectifPage.php");
 
	 exit;

	echo  'Après modification du stock de jetons : ' . '<br>' . '<br>' . afficherTable('objectif');

	echo 'TADAM !';
	
	//OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOW

	if(isset($_POST['wesh'])){
	}

?>

