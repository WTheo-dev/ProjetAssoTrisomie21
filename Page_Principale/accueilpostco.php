<?php
session_start();

try {
    $linkpdo = new PDO("mysql:host=localhost;dbname=sae", 'root');
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

// Vérification de la connexion de l'utilisateur
if (!isset($_SESSION['logged_in'])) {
    header('Location:formulaire_connexion.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Page D'accueil</title>
</head>

<body>
    <header>
        <div class="section_1">

        </div>
        <div class="section_2">

        </div>
        <div class="section_3">
            <div class="section_3_partion_1">
                <div class="partition_1_head">
                    <div class="logo_container">
                        <div class="logo">

                        </div>
                    </div>
                    <nav>
                        <ul>
							
                            <li><a href="page_accueil.html">Accueil</a></li>
                            <li><a href="formulaire_connexion.html">Déconnexion</a></li>
                            <li><a href="page_contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <h1 class="welcome_message">Bienvenue</h1>
            </div>
            <div class="section_3_partion_2">
                <div class="carts_container">
                    <div class="cart cart_1">
                        <div class="cart_image cart_image_1"><a href="branche guillaume\test.html"><img src="icon.png" width="120%"></a>

                        </div>
                    </div>
                    <div class="cart cart_1">
                        <div class="cart_image cart_image_1"><a href="branche guillaume\user.html"><img src="branche guillaume\icon_user.png" width="120%"></a>
                        </div>
                    </div>
                    <div class="cart cart_1">
                        <div class="cart_image cart_image_1"><a href="formulaire_connexion.html"><img src="icon.png" width="120%"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

	<footer>

	</footer>
</body>

</html>