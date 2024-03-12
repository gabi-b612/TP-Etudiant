<?php
require_once 'database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les nouvelles informations de l'étudiant depuis les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $genre = $_POST['genre'];
    $email = $_POST['email'];

    ajouterEtudiant($nom, $prenom, $email, $genre);
    // Rediriger vers la page d'accueil ou afficher un message de confirmation
    header("Location: index.php");
    exit();
} else {
    // Si les données du formulaire n'ont pas été soumises, afficher un message d'erreur
    echo "Erreur: Les données du formulaire n'ont pas été soumises.";
}

