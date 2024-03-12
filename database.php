<?php

// Create connection
function connection($servername = 'localhost',$dbname='esis',$username='karen',$password='karen'): PDO
{
    try {
        return new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

//Afficher les etudiants
function afficherLesEtutiants(): array
{
    $baseDonnes = connection();
    $sql = "SELECT * FROM Etudiants";
    $statement = $baseDonnes->query($sql);

    $tableauEtudiant = [];

    while (($row = $statement->fetch())) {
        $Etudiant = [
            'matricule' => $row['matricule'],
            'nom' => $row['nom'],
            'prenom' => $row['prenom'],
            'email' => $row['email'],
            'genre' => $row['genre']
        ];
        $tableauEtudiant [] = $Etudiant;
    }
    return $tableauEtudiant;
}

//Supprimer un etudiant
function supprimerEtudiant($matricule): void
{
    $baseDonnees = connection();
    $requete = $baseDonnees->prepare("DELETE FROM Etudiants WHERE matricule = ?");

    $requete->bindParam(1, $matricule);

    if ($requete->execute()) {
        echo "L'étudiant avec le matricule $matricule a été supprimé avec succès.";
    } else {
        echo "Une erreur est survenue lors de la suppression de l'étudiant.";
    }
}

// Modifier Etudiant
function modifierEtudiant($matricule, $nouveauNom, $nouveauPrenom, $nouvelEmail): bool
{
    $baseDonnees = connection();

    $requete = $baseDonnees->prepare("UPDATE Etudiants SET nom=?, prenom=?, email=? WHERE matricule = ?");

    // Liaison des paramètres
    $requete->bindParam(1, $nouveauNom);
    $requete->bindParam(2, $nouveauPrenom);
    $requete->bindParam(3, $nouvelEmail);
    $requete->bindParam(4, $matricule);

    // Exécution de la requête
    if ($requete->execute()) {
        echo "Les informations de l'étudiant avec le matricule $matricule ont été mises à jour avec succès.";
        return true;
    } else {
        echo "Une erreur est survenue lors de la mise à jour des informations de l'étudiant.";
        return false;
    }
}

// Ajouter un Etudiant
function ajouterEtudiant($nom, $prenom, $email, $genre): bool
{
    $baseDonnees = connection();
    $matricule = genererMatricule($nom,$prenom);

    $requete = $baseDonnees->prepare("INSERT INTO Etudiants (nom, prenom, email, matricule, genre) VALUES (?, ?, ?, ?, ?)");

    // Liaison des paramètres
    $requete->bindParam(1, $nom);
    $requete->bindParam(2, $prenom);
    $requete->bindParam(3, $email);
    $requete->bindParam(4, $matricule);
    $requete->bindParam(5, $genre);

    // Exécution de la requête
    if ($requete->execute()) {
        echo "L'étudiant a été ajouté avec succès.";
        return true;
    } else {
        echo "Une erreur est survenue lors de l'ajout de l'étudiant.";
        return false;
    }
}

function genererMatricule($nom,$prenom):string
{
    $annee = substr(date('Y'), -2);
    return $annee.substr($nom, 0, 1).substr($prenom, 0, 1).rand(001,999);
}