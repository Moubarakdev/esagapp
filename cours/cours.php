<?php
    include'../controle.php';
    include_once'../esagapp/connexion.php';
    

    $check = $bdd->prepare('SELECT DISTINCT * FROM filiere ');

    $check->execute();

    $filieres = $check->fetchAll();

?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/esagapp/css/style.css">
    <title>COURS</title>
</head>
<body>
    <div class="container">
        <form  action="/esagapp/cours/traitement_cours.php" method="POST">
                <h2>COURS</h2>
                <label for="">Code cours</label>
                <input type="text" name="code_cours" placeholder="Code cours" required><br>
                <label for="">Libellé du cours</label>
                <input type="text" name="libelle_cours" placeholder="Libelle Cours" required><br>
                <label for="">Code filiere</label>
                <select id="code_filiere" name="code_filiere" required>
                <option disabled selected>----</option>
                <?php    
                foreach($filieres as $filiere):
                ?>
                    <option value="<?=$filiere['codefiliere']?>"><?=$filiere['codefiliere']?> - <?=$filiere['libellefiliere']?></option>
                <?php 
                endforeach; 
                ?>
                </select><br><br>
                <input type="submit" value="Ajouter">
        </form>
    </div>
</body>
</html>
