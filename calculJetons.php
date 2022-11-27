<?php
	try {
 		$linkpdo = new PDO("mysql:host=localhost;dbname=sae", 'root', '');
 	}
 	catch (Exception $e) {
 		die('Error : ' . $e->getMessage());
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

	while($data = $req->fetch()) {
        for($i = 1; $i < 7; $i++) {
            echo 'Colonne ' . $i . ' : '. $data[$i] . ';<br/>'; 
            //echo 'Nom(s) :' . $data['nom'] . '<br/>' . 'Prénom(s) :' . $data['prénom'] . '<br/>' . 'Né le :' . $data['date_naissance'];
        }
        echo '<br/>';
    }

	if (isset($_POST['deposer'])) {
		$req = $linkpdo->prepare('UPDATE objectif SET Nb_Jetons = Nb_Jetons + :deposer WHERE intitule = "hello world"');

		if ($req == false) {
			die ('Error query');
		}

		$req2 = $req->execute(array('deposer' => $_POST['jetons']));

		if ($req2 == false) {
			$req2->DebugDumpParams();
			die ('Error execute 1');
		}
	}
	elseif (isset($_POST['retirer'])) {
		$req = $linkpdo->prepare('UPDATE objectif SET Nb_Jetons = Nb_Jetons - :retirer WHERE intitule = "hello world"');

		if ($req == false) {
			die ('Error query');
		}

		$req2 = $req->execute(array('retirer' => $_POST['jetons']));

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

	while($data = $req->fetch()) {
        for($i = 1; $i < 7; $i++) {
            echo 'Colonne ' . $i . ' : '. $data[$i] . ';<br/>'; 
            //echo 'Nom(s) :' . $data['nom'] . '<br/>' . 'Prénom(s) :' . $data['prénom'] . '<br/>' . 'Né le :' . $data['date_naissance'];
        }
        echo '<br/>';
    }
	
	//OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOW

	if(isset($_POST['wesh'])){
	}

?>

