<?php

require_once 'database.php';

if (isset($_GET['matricule'])) {
    $matricule = $_GET['matricule'];

    supprimerEtudiant($matricule);

    header("Location: index.php");
    exit();
} else {
    echo "Erreur: Matricule d'étudiant non spécifié.";
}

