<?php
include_once '../connexion.php';

if ((isset($_POST['matricule'])) ||
    (isset($_POST['code_cours'])) ||
    (isset($_POST['montant']))

) {
    $matricule = htmlspecialchars($_POST['matricule']);
    $code = htmlspecialchars($_POST['code_cours']);
    $montant = $_POST['montant'];


    //on verifie si le montant est positif
    if ($montant <= 0) {
        header('Location:/esagapp/index.php?page=inscription&state=montant');
    } else {
        //on verifie si l'etudiant est deja inscrit aux cours 
        $check = $bdd->query("SELECT * FROM INSCRIPTION WHERE matricule = '$matricule' and codecours = '$code'");
        $count = $check->rowCount();

        if ($count > 0) {
            header('Location:/esagapp/index.php?page=inscription&state=dejains');
        } else {

            $insert = $bdd->prepare("INSERT INTO inscription(matricule,codecours, montant)
            VALUE(?, ?, ?)");
            $insert->execute(array($matricule, $code, $montant));

            $bdd = null;
            header('Location:/esagapp/index.php?page=inscription&state=enregistrerins');
        }
    }
} else {
    header('Location:/esagapp/index.php?page=inscription&state=champ');
}
