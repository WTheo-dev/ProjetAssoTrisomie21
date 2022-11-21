<?php
    try {
        $linkpdo = new PDO("mysql:host=localhost;dbname=sae", 'root', '');
    }
    catch (Exception $e) {
        die('Error : ' . $e->getMessage());
    }

    $req = $linkpdo->prepare('SELECT count(*) as No_of_Column FROM information_schema.columns WHERE table_name = :maTable');

    if ($req == false) {
        die ('Error query');
    }

    $req2 = $req->execute(array('maTable' => $_POST['laTable']));

    if ($req2 == false) {
        die ('Error execute 1');
        $req2->DebugDumpParams();
    }

    $nbColonne = $req->fetch();

    $req = $linkpdo->prepare('SELECT * FROM :choixTable');

    if ($req == false) {
        die ('Error query');
    }

    $req2 = $req->execute(array('choixTable' => $_POST['laTable']));

    if ($req2 == false) {
        $req2->DebugDumpParams();
        die ('Error execute 2');
    }

    while($data = $req->fetch()) {
        for($i = 1; $i < $nbColonne[0]; $i++) {
            echo 'Colonne ' . $i . ' : '. $data[$i] . ';<br/>'; 
            //echo 'Nom(s) :' . $data['nom'] . '<br/>' . 'Prénom(s) :' . $data['prénom'] . '<br/>' . 'Né le :' . $data['date_naissance'];
        }
        echo '<br/>';
    }
?>

    