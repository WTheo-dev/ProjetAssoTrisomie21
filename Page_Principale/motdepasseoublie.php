<?php
if(isset($_POST['submit'])){
    $to = $_POST['email'];
    $subject = "Réinitialisation de mot de passe";
    $message = "Cliquez sur ce lien pour réinitialiser votre mot de passe : http://votresite.com/reset_password.php?email=".$to;
    $headers = "From: no-reply@votresite.com" . "\r\n";
    if(mail($to,$subject,$message,$headers)){
        echo "Un email de réinitialisation de mot de passe a été envoyé à l'adresse email indiquée.";
    }
    else{
        echo "Une erreur s'est produite. Veuillez réessayer.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mot de Passe Oublié</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="POST">
        <img src="t21complet.png" alt="Logo Trisomie 21" height="150px" width="400px" />
        <h1>Mot de passe Oublié</h1>
        <div class="inputs">
            <input type="email" required placeholder="Email" name="email" />
        </div>
        <div align="center">
            <button type="submit" name="submit">Envoyer un mail</button>
        </div>
    </form>
</body>
</html>