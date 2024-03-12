<?php
require_once 'database.php';

    if (isset($_GET['matricule'])) {
        $matricule = $_GET['matricule'];
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifier un étudiant</title>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                margin-top: 20px;
            }
        </style>
    </head>
    <body>

    <div class="container">
        <h1>Modifier un étudiant</h1>

        <form method="post" action="modifier_traitement.php">
            <!-- Champ caché pour stocker le matricule de l'étudiant -->
            <input type="hidden" name="matricule" value="<?php echo $matricule; ?>">

            <!-- Champs pour les nouvelles informations de l'étudiant -->
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" >
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" >
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" >
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
    </html>
    <?php
} else {
    // Si le matricule n'est pas spécifié dans les paramètres de l'URL, afficher un message d'erreur
    echo "Erreur: Matricule d'étudiant non spécifié.";
}
?>
