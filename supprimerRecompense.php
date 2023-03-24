<?php
    try {
        $linkpdo = new PDO("mysql:host=localhost;dbname=sae", 'root', '');
    }
    catch (Exception $e) {
        die('Error : ' . $e->getMessage());
    }

    $req = $linkpdo->prepare('DELETE FROM récompense WHERE intitulé = :intit');

    if ($req == false) {
        die ('Error query');
    }

    $req2 = $req->execute(array('intit' => $_POST['intitule']));

    if ($req2 == false) {
        //$req2->DebugDumpParams();
        die ('Error execute 1');
    }

    header("Location: supprimerRecompensePage.php");
 
	exit;
?>

    