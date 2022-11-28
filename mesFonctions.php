<?php
    function afficherTable ($laTable)
    {
        $nbColonne = 0;
        $req = NULL; 
        $req2 = NULL; 
        $maRequete = '';
        $retour = '';

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
    
        $req2 = $req->execute(array('maTable' => $laTable));
    
        if ($req2 == false) {
            $req2->DebugDumpParams();
            die ('Error execute 1');
        }
    
        $nbColonne = $req->fetch();

        switch($laTable){
            case 'membre':
                $maRequete = 'SELECT * FROM membre';
                break;
            case 'enfant':
                $maRequete = 'SELECT * FROM enfant';
                break;
            case 'lier':
                $maRequete = 'SELECT * FROM lier';
                break;
            case 'message':
                $maRequete = 'SELECT * FROM message';
                break;
            case 'objectif':
                $maRequete = 'SELECT * FROM objectif';
                break;
            case 'placer_jeton':
                $maRequete = 'SELECT * FROM placer_jeton';
                break;
            case 'recompense':
                $maRequete = 'SELECT * FROM recompense';
                break;
            case 'suivre':
                $maRequete = 'SELECT * FROM suivre';
                break;
            default:
                $maRequete = NULL;
        }

        $req = $linkpdo->prepare($maRequete);

        if ($req == false) {
            die ('Error query');
        }
    
        $req2 = $req->execute(array('choixTable' => $laTable));
    
        if ($req2 == false) {
            $req->DebugDumpParams();
            die ('Error execute 2');
        }

        while($data = $req->fetch()) {
            for($i = 1; $i < $nbColonne[0]; $i++) {
                $retour .= 'Colonne ' . $i . ' : '. $data[$i] . ';<br/>'; 
                //echo 'Nom(s) :' . $data['nom'] . '<br/>' . 'Prénom(s) :' . $data['prénom'] . '<br/>' . 'Né le :' . $data['date_naissance'];
            }
            $retour .= '<br/>';
        }

        return $retour;
    }
?>
