<?php
include '../controle.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/esagapp/css/style.css">
    <title>Filiere</title>
</head>

<body>
    <div class="container">
        <form action="filiere/create_filiere.php" method="POST">

            <h2>FILIERE</h2>
            <label for="">Libelle Filière</label>
            <input type="text" name="libelle_filiere" placeholder="libelle" required="required"><br>
            <label for="">Code Filière</label>
            <input type="text" name="code_filiere" id="" placeholder="code" required="required"><br>
            <input type="submit" value="Ajouter"><br>
        </form>
    </div>
</body>

</html>