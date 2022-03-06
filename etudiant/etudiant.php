<?php
    include '../controle.php';
    include_once '..\esagapp\connexion.php';

    $check = $bdd->prepare('SELECT * FROM filiere');

    $check->execute();

    $filieres = $check->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/esagapp/css/style.css">
    <title>Etudiant</title>
</head>

<body>
    <div class="container">
        <form action="/esagapp/etudiant/traitement_etudiant.php" method="POST">

            <h2>ETUDIANTS</h2>
            <label for="">Matricule</label>
            <input type="text" name="matricule" placeholder="Matricule"><br>
            <label for="">Nom</label>
            <input type="text" name="nom" id="" placeholder="Nom" required="required"><br>
            <label for="">Prénom(s)</label>
            <input type="text" name="prenom" id="" placeholder="Prenom" required="required"><br>
            <label for="">Date de naissance</label>
            <input type="date" name="date_naissance" id="" required><br>
            <label for="">Sexe :</label>
            <select name="sexe" id="">
                <option disabled selected>------</option>
                <option value="Masculin">Masculin</option>
                <option value="Feminin">Féminin</option>
            </select><br><br>
            <label for="">Adresse</label>
            <input type="text" name="adresse" id="" placeholder="Adresse" required="required"><br>
            <label for="filiere">Filière :</label>
            <select id="filiere" name="filiere" required="required">
                <option disabled selected>------</option>
                <?php
                foreach ($filieres as $filiere) :
                ?>
                    <option value="<?= $filiere['codefiliere'] ?>"><?= $filiere['codefiliere'] ?> - <?= $filiere['libellefiliere'] ?></option>
                <?php
                endforeach;
                ?>
            </select><br><br>
            <label for="">Niveau :</label>
            <select id="" name="niveau" required="required">
                <option disabled selected>-----</option>
                <option value="LP1">LP1</option>
                <option value="LP2">LP2</option>
                <option value="LP3">LP3</option>
                <option value="M1">M1</option>
                <option value="M2">M2</option>
            </select>
            <input type="submit" value="Enregistrer">
        </form>
    </div>

</body>

</html>