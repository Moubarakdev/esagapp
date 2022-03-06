<?php
include_once '../connexion.php';

$check = $bdd->prepare('SELECT   ETUDIANT.matricule, ETUDIANT.nom, ETUDIANT.prenom,  INSCRIPTION.codecours, INSCRIPTION.montant  FROM ETUDIANT,INSCRIPTION WHERE (ETUDIANT.matricule = INSCRIPTION.matricule) AND ETUDIANT.nom = "KERIM" ');
$checktotal = $bdd->prepare('SELECT   SUM(INSCRIPTION.montant) AS total  FROM ETUDIANT,INSCRIPTION WHERE (ETUDIANT.matricule = INSCRIPTION.matricule) AND ETUDIANT.nom = "KERIM" ');
$check->execute();
$checktotal->execute();

$row = $check->rowCount();
$results = $check->fetchAll();
$total = $checktotal->fetchAll();
var_dump($results);
var_dump($row);

$nom = $_GET['nom'];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/esagapp/css/bootstrap.css">
    <title>Document</title>
</head>

<body>



    <?php
    $check1 = $bdd->prepare('SELECT   ETUDIANT.matricule, ETUDIANT.nom, ETUDIANT.prenom,  INSCRIPTION.codecours, INSCRIPTION.montant  FROM ETUDIANT,INSCRIPTION WHERE (ETUDIANT.matricule = INSCRIPTION.matricule) AND ETUDIANT.nom = ".$nom." ');
    $checktotal = $bdd->prepare('SELECT   SUM(INSCRIPTION.montant) AS total  FROM ETUDIANT,INSCRIPTION WHERE (ETUDIANT.matricule = INSCRIPTION.matricule) AND ETUDIANT.nom = ".$nom." ');
    $check1->execute();
    $checktotal->execute();

    $row = $check1->rowCount();
    $results = $check1->fetchAll();
    $total = $checktotal->fetchAll();

    var_dump($results);
    var_dump($row);

    ?>

    <a href="#" class="btn btn-lg btn-danger" data-toggle="modal" data-target="#basicModal">Click to open Modal</a>


    large modal
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><?= $_GET['nom'] ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div align="center">
                        <table class="table">
                            <tr>
                                <th scope="col">COURS</th>
                                <th scope="col">MONTANT</th>
                            </tr>
                            <?php
                            foreach ($results as $result) :
                            ?>
                                <tr>
                                    <td><?= $result['codecours'] ?></td>
                                    <td><?= $result['montant'] ?></td>
                                </tr>
                            <?php
                            endforeach;
                            foreach ($total as $tot) :
                            ?>
                                <tr>
                                    <th scope="row">TOTAL A PAYER </th>
                                    <td><?= $tot['total'] ?></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>

                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="/esagapp/scripts/jquery.js"></script>
    <script src="/esagapp/scripts/bootstrap1.js"></script>
    <script src="/esagapp/scripts/bootstrap2.js"></script>
    <script src="/esagapp/scripts/bootstrap3.js"></script>
    <script src="/esagapp/scripts/jquery.uitablefilter.js"></script>
    </div>
</body>

</html>