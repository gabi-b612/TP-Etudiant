<?php

require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricule = $_POST['matricule'];
    $nouveauNom = $_POST['nom'];
    $nouveauPrenom = $_POST['prenom'];
    $nouvelEmail = $_POST['email'];

    modifierEtudiant($matricule, $nouveauNom, $nouveauPrenom, $nouvelEmail);

    // Rediriger vers la page d'accueil
    header("Location: index.php");
    exit();
} else {
    // Si les données du formulaire n'ont pas été soumises, afficher un message d'erreur
    echo "Erreur: Les données du formulaire n'ont pas été soumises.";
}

