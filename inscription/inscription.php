<?php

include'../controle.php';
include_once '..\esagapp\connexion.php';
//MAtricule
$check = $bdd->prepare('SELECT * FROM etudiant ');

$check->execute();

$matricules = $check->fetchAll();

//cours
$check2 = $bdd->prepare('SELECT *FROM cours ');

$check2->execute();

$cours = $check2->fetchAll();

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
        <form action="/esagapp/inscription/traitement_inscription.php" method="POST">
            <h2>INSCRIPTION</h2>
            <label for="">Matricule :::</label>
            <select id="" name="matricule" required="required">
                <option disabled selected>------</option>
                <?php
                foreach ($matricules as $matricule) :
                ?>
                    <option value="<?= $matricule['matricule'] ?>"><?= $matricule['matricule'] ?> - <?= $matricule['nom'] ?> <?= $matricule['prenom'] ?></option>
                <?php
                endforeach;
                ?>
            </select><br>
            <label for="">Code cours :</label>
            <select id="" name="code_cours" required="required">
                <option disabled selected>------</option>
                <?php
                foreach ($cours as $cour) :
                ?>
                    <option value="<?= $cour['codecours'] ?>"><?= $cour['codecours'] ?> - <?= $cour['libellecours'] ?></option>
                <?php
                endforeach;
                ?>
            </select><br>
            <label for="">Montant</label>
            <input type="number" name="montant" placeholder="montant" required><br>
            <input type="submit" value="Inscrire">
        </form>
    </div>
</body>

</html>