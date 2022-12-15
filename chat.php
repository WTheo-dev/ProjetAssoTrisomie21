<?php 
$bdd = new PDO("mysql:host=localhost;dbname=sae", 'root', '');
if(isset($_POST['nom']) AND isset($_POST['message']) AND !empty($_POST[ 'nom' ])
AND !empty ($_POST['message']))
{
    $nom = htmlspecialchars($_POST['nom']);
    
    $message = htmlspecialchars($_POST['message']);
    
    $insertmsg = $bdd->prepare('INSERT INTO chat(nom, message) VALUES(?, ?)');
    
    $insertmsg->execute(array($nom, $message) );  
}
?>
<html>
    <head>
        <title>TUTO PHP</title>
        <meta charset="utf-8">
    </head>
    <body>
        <form method="post" action="">
            <input type="text" name="nom" placeholder="NOM" /><br />
            <textarea type="text" name="message" placeholder="MESSAGE"></textarea><br/>
    <input type="submit" value="Envoyer" />
        </form>
        <?php
        $allmsg = $bdd->query('SELECT * FROM chat ORDER BY id DESC');
        while($msg = $allmsg->fetch())
        {
        ?>
        <b><?php echo $msg['nom']; ?> : 
        </b><?php echo $msg['message']; ?><br/>
        <?php
        }
        ?>
    </body>
</html>