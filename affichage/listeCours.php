<?php
include_once '../connexion.php';

$check = $bdd->prepare('SELECT DISTINCT * FROM cours ');

$check->execute();

$cours = $check->fetchAll();



?>

<div class="container">
    <h2 class="m-5" style="color: #FFC300;">
        <center>COURS</center>
    </h2>
    <table class="table table-hover table-dark table-bordered table-striped liste">

        <thead>
            <tr>
                <th>Code cours</th>
                <th>Libellé cours</th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($cours as $cour) :
            ?>
                <tr>
                    <td><?= $cour['codecours'] ?></td>
                    <td><?= $cour['libellecours'] ?></td>
                </tr>
            <?php
            endforeach;
            ?>

        </tbody>
    </table>
</div>