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
      <div id="chatHeader">
        <p >CHAT</h1>
      </div>
      <div id="sentMsg">
        <?php
          $allmsg = $bdd->query('SELECT * FROM chat ORDER BY id DESC');
          while($msg = $allmsg->fetch())
          {
            ?>
          <div class="affichage">
            <div id="sender"><?php echo $msg['nom']; ?> :</div>
            <div id="msg"><?php echo $msg['message']; ?></div>
          </div>
          
        <?php
          }
          ?>
      </div>
      <form id="formText" method="post" action="">
          <input type="text" name="nom" placeholder="NOM" /><br />
          <textarea type="text" name="message" placeholder="MESSAGE" cols="30"rows="10"></textarea><br/>
          <button type="submit" value="Envoyer">Envoyer</button>
      </form>
    </body>
</html>
<style> 

@font-face {
  font-family: Franchise;
  src: url(Franchise-Free-Bold.otf);
}

body{
  width:90%;
  margin: auto;
  padding-top : 20px;
  display : flex;
  flex-direction : column;
  background: #34568B;
}

#chatHeader{
  height: 10%;
  width: 100%;
  background: #92A8D1;  
  text-align:center;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  font-family: Franchise, Arial;
  font-size: 30px;
  padding-bottom:10px;
  color:black;
  border-top: 2px solid black;
  border-left: 2px solid black;
  border-right: 2px solid black;
  border-bottom: 2px solid black;
}

#sentMsg{
  height: 80%;
  width: 100%;
  background: white;
  border-left: 2px solid black;
  border-right: 2px solid black;
  list-style-type:none;
	overflow: auto;
}

#formText{
  height: 10%;
  width: 100%;
  display:flex;
  flex-direction:row;
  border:2px solid black;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

#formText input{
  width:10%;
  height:100%
}

input[type="text"],
textarea {
  border: 1px solid black;
  padding: 8px;
  font-size: 16px;
  width:80%;
  height:100%
  box-sizing: border-box;
  resize:none;
 }


button[type="submit"] {
  background-color: #4CAF50;
  border: none;
  padding: 8px 16px;
  font-size: 16px;
  color: white;
  cursor: pointer;
  width:10%;
  height:100%;
}

.affichage {

  background-color: #6fbced;
  padding: 10px; /* Ajoutez un peu de marge à l'intérieur de chaque container */
  min-width: 50px; /* Il faut une taille minimale pour le container */
  display: flex;
  flex-direction:column;
  width:fit-content;
  border-radius : 5px;
  margin : 5px;
  font-family: Roboto,Open Sans,Arial;
  color:white;
}

#sender{
  font-size:15px;
  font-weight: bold;
}

</style>