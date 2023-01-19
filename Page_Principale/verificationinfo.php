<?php
// récupération des informations du formulaire
$email = $_POST['courriel'];
$password_entered = $_POST['mdp'];

// récupération du mot de passe crypté de la base de données
$password_hash_query = "SELECT mdp FROM utilisateurs WHERE courriel = '$email'";
$result = mysqli_query($conn, $password_hash_query);
$password_hash_from_db = mysqli_fetch_assoc($result)['mdp'];

// vérification du mot de passe
if (password_verify($password_entered, $password_hash_from_db)) {
    // mot de passe correct, connectez l'utilisateur
    // redirection vers la page d'accueil
    header('Location: accueilpostco.html');
} else {
    // mot de passe incorrect, affichez un message d'erreur
    echo "Email ou mot de passe incorrect";
}
?>