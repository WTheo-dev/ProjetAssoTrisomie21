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
      <?php
        $allmsg = $bdd->query('SELECT * FROM chat ORDER BY id DESC');
        while($msg = $allmsg->fetch())
        {
          ?>
        <div class="affichage">
        <b><?php echo $msg['nom']; ?> : 
        </b><?php echo $msg['message']; ?><br/>
        </div>
        
      <?php
        }
        ?>
        <form method="post" action="">
            <input type="text" name="nom" placeholder="NOM" /><br />
            <textarea type="text" name="message" placeholder="MESSAGE" cols="30"rows="10"></textarea><br/>
    <button type="submit" value="Envoyer" />Envoyer</button>
        </form>
    </body>
</html>
<style> 


input[type="text"],
textarea {
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 8px;
  font-size: 16px;
  width: 80%;
  box-sizing: border-box;
 }

button[type="submit"] {
  background-color: lightblue;
  border: none;
  border-radius: 5px;
  padding: 8px 16px;
  font-size: 16px;
  color: white;
  cursor: pointer;
}
b {
  color: blue;
  font-size: 16px;
}
.affichage {
  background-color: #eee;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px;
  /* margin-bottom: 10px; */
}

</style>