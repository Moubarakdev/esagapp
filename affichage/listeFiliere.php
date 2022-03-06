<?php
include_once '../connexion.php';

$check = $bdd->prepare('SELECT DISTINCT * FROM filiere');

$check->execute();

$filieres = $check->fetchAll();


?>



<div class="container">
    <h2 class="m-5" style="color: #FFC300;">
        <center>Liste des filières</center>
    </h2>
    <table class="table table-hover table-dark table-bordered table-striped liste">

        <thead>
            <tr>
                <th scope="col">Code filiere</th>
                <th scope="col">Libellé filiere</th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($filieres as $filiere) :
            ?>
                <tr scope="row">
                    <td><?= $filiere['codefiliere'] ?></td>
                    <td><?= $filiere['libellefiliere'] ?></td>
                </tr>
            <?php
            endforeach;
            ?>

        </tbody>
        
    </table>
</div>