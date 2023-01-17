<?php
    try {
        $linkpdo = new PDO("mysql:host=localhost;dbname=sae", 'root', '');
    }
    catch (Exception $e) {
        die('Error : ' . $e->getMessage());
    }

    $req = $linkpdo->prepare('DELETE FROM objectif WHERE id_objectif = :idObj');

    if ($req == false) {
        die ('Error query');
    }

    $req2 = $req->execute(array('idObj' => $_POST['idObj']));

    if ($req2 == false) {
        $req2->DebugDumpParams();
        die ('Error execute 1');
    }

    header("Location: http://localhost/SAE/Code/User%20Story%20D%c3%a9poserRetirer%20Jeton_Points/Modifier_Ajouter_Supprimer%20Objectif/supprimerObjectifPage.php");
 
    exit;
?>

    