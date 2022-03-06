<?php
include_once '../connexion.php';

$check = $bdd->prepare('SELECT  * FROM ETUDIANT ORDER BY nom');
$check->execute();




$etudiants = $check->fetchAll();


?>




<?php
// var_dump($etudiants);
?>
<div class="container">
    <h2 class="m-5" style="color: #FFC300;">
        <center>ETUDIANTS</center>
    </h2>
    <?php
    //bouton d'activation du pop-up
    if (isset($_GET['nom'])) {
        @$nom = $_GET["nom"];
    ?><center><a href="#" class="btn btn-danger m-5" data-toggle="modal" data-target="#basicModal">Bulletin de paiement de l'étudiant selectionner</a></center>
    <?php ;
    }
    ?>
    <table class="table table-hover table-dark table-bordered table-striped liste">

        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date de naissance</th>
                <th>Sexe</th>
                <th>Adresse</th>
                <th>Filiere</th>
                <th>Niveau</th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($etudiants as $etudiant) :
            ?>
                <tr>
                    <td><?= $etudiant['matricule'] ?></td>
                    <td><a href="listes.php?nom=<?= $etudiant['nom'] ?>&prenom=<?= $etudiant['prenom'] ?>&id=<?= $etudiant['matricule'] ?>" style="text-decoration: none; "><?= $etudiant['nom'] ?></a></td>
                    <td><?= $etudiant['prenom'] ?></td>
                    <td><?= $etudiant['datenaissance'] ?></td>
                    <td><?= $etudiant['sexe'] ?></td>
                    <td><?= $etudiant['adresse'] ?></td>
                    <td><?= $etudiant['filiere'] ?></td>
                    <td><?= $etudiant['niveau'] ?></td>
                <?php
            endforeach;
                ?>
        </tbody>

    </table>


</div>