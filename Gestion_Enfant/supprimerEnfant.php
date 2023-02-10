<?php
/**
 * 
 */
    try {
        $linkpdo = new PDO("mysql:host=localhost;dbname=sae", 'root', '');
    }
    catch (Exception $e) {
        die('Error : ' . $e->getMessage());
    }

    $req = $linkpdo->prepare('DELETE FROM enfant WHERE Nom = :nom AND Prénom = :prenom');

    if ($req == false) {
        die ('Error query');
    }

    $req2 = $req->execute(array('nom' => $_POST['Nom'],
                            'prenom' => $_POST['Prenom']));

    if ($req2 == false) {
        $req2->DebugDumpParams();
        die ('Error execute 1');
    }

    header("Location: http://localhost/SAE/Code/Mioche/supprimerEnfantPage.php");
 
	exit;
?>

    