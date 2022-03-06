<?php
    include'../controle.php';
    include_once'../esagapp/connexion.php';
        //MAtricule
    $check = $bdd->prepare('SELECT DISTINCT matricule,nom,prenom FROM etudiant');

    $check->execute();

    $matricules = $check->fetchAll();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/esagapp/css/style.css">
    <title>PAIEMENT</title>
</head>
<body>
    <div class="container">
        <form  action="/esagapp/paiement/traitement_paiement.php" method="POST">
                <h2>PAIEMANT</h2>
                <label for="">Montant versé</label>
                <input type="text" name="montant_verse" placeholder="Montant verse" required><br>
                <label for="">Type paiement</label>
                <input type="text" name="type_paiement" id="" placeholder="Type de payement" required="required"><br>
                <label for="">Matricule</label>
                <select id="" name="matricule" required>
                    <option selected></option>
                <?php    
                foreach($matricules as $matricule):
                ?>
                    <option value="<?=$matricule['matricule']?>"><?=$matricule['matricule']?>  -  <?=$matricule['nom']?> <?=$matricule['prenom']?></option>
                <?php 
                endforeach; 
                ?>
                </select><br>
                <input type="submit" value="Proceder">
        </form>
    </div>
</body>
</html>