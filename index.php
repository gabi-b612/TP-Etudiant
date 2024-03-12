<?php
    require_once 'database.php';

    $etudiants = afficherLesEtutiants();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Liste des étudiants</h1>
            </div>
            <div class="col-md-6 text-right">
                <a href="ajouter.php" class="btn btn-success">Ajouter Étudiant</a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Genre</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <!-- Boucle PHP pour afficher chaque étudiant -->
            <?php
            foreach ($etudiants as $etudiant) {
                echo "<tr>";
                echo "<td>" . $etudiant['matricule'] . "</td>";
                echo "<td>" . $etudiant['nom'] . "</td>";
                echo "<td>" . $etudiant['prenom'] . "</td>";
                echo "<td>" . $etudiant['genre'] . "</td>";
                echo "<td>" . $etudiant['email'] . "</td>";
                echo "<td>
                        <a href='modifier.php?matricule=" . $etudiant['matricule'] . "' class='btn btn-primary'>Modifier</a>
                        <a href='supprimer.php?matricule=" . $etudiant['matricule'] . "' class='btn btn-danger'>Supprimer</a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>

