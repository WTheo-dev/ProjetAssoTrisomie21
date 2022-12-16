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
        <title>Chat</title>
        <meta charset="utf-8">
    </head>
    <body>
        <form method="post" action="">
            <input type="text" name="nom" placeholder="NOM" /><br />
            <textarea type="text" name="message" placeholder="MESSAGE" cols="30"rows="10"></textarea><br/>
    <button type="submit" value="Envoyer" />Envoyer</button>
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
<style> 
input,textarea {
  padding: 12px 30px 10px 20px; */
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  /* resize: none; */
}
button{
    /* width:100%; */
    /* height:100%; */
}
</style>