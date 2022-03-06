<?php
include_once '../connexion.php';

$check = $bdd->prepare('SELECT   ETUDIANT.matricule, ETUDIANT.nom, ETUDIANT.prenom, ETUDIANT.filiere, ETUDIANT.niveau, INSCRIPTION.codecours, INSCRIPTION.montant, INSCRIPTION.dateinscription FROM ETUDIANT,INSCRIPTION WHERE (ETUDIANT.matricule = INSCRIPTION.matricule)  ');
$check->execute();

$etudiants = $check->fetchAll();



?>

<style>
    td a {
        color: red;
    }

    td a:hover {
        color: burlywood;
    }
</style>


<?php
// var_dump($etudiants);
?>
<div class="container">
    <h2 class="mt-5 mb-3" style="color: #FFC300;">
        <center>INSCRIPTIONS</center>
    </h2>
    <table class="table table-hover table-dark table-bordered table-striped liste">

        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Filiere</th>
                <th>Niveau</th>
                <th>Cours</th>
                <th>Date d'inscription</th>
                <th>Montant</th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($etudiants as $etudiant) :
            ?>
                <tr>
                    <td><?= $etudiant['matricule'] ?></td>
                    <td><?= $etudiant['nom'] ?></td>
                    <td><?= $etudiant['prenom'] ?></td>
                    <td><?= $etudiant['filiere'] ?></td>
                    <td><?= $etudiant['niveau'] ?></td>
                    <td><?= $etudiant['codecours'] ?> </td>
                    <td><?= $etudiant['dateinscription'] ?></td>
                    <td><?= $etudiant['montant'] ?></td>
                <?php
            endforeach;
            //récupération des données dans l'URL
            if ((isset($_GET['nom'])) || (isset($_GET['id']))) {
                $nom = $_GET["nom"];
                $id = $_GET["id"];
            }
                ?>
        </tbody>
    </table>



    <!-- MISE EN PLACE DU POP-UP -->

    <?php
    $check1 = $bdd->prepare("SELECT   ETUDIANT.matricule, ETUDIANT.nom, ETUDIANT.prenom,  COURS.libellecours, INSCRIPTION.montant  FROM ETUDIANT,INSCRIPTION,COURS WHERE (ETUDIANT.matricule = INSCRIPTION.matricule) AND (COURS.codecours = INSCRIPTION.codecours) AND ETUDIANT.nom = '{$nom}' ");
    $checktotal = $bdd->prepare("SELECT   SUM(INSCRIPTION.montant) AS total  FROM ETUDIANT,INSCRIPTION WHERE (ETUDIANT.matricule = INSCRIPTION.matricule) AND ETUDIANT.nom = '{$nom}'");
    $checkpaiement = $bdd->prepare("SELECT SUM(PAIEMENT.montantverse) as mverse from PAIEMENT,ETUDIANT where (PAIEMENT.matricule = ETUDIANT.matricule) AND ETUDIANT.matricule = '{$id}'");

    //execution des requêtes 
    $check1->execute();
    $checktotal->execute();
    $checkpaiement->execute();

    $row = $check1->rowCount();
    //recupération de resultats
    $results = $check1->fetchAll();
    $total = $checktotal->fetchAll();
    $paiements = $checkpaiement->fetchAll();
    //var_dump($paiements);
    // var_dump($row);

    ?>



    <!-- large modal -->
    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> <?= $_GET['id'] ?> <?= $_GET['nom'] ?> <?= $_GET['prenom'] ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    if ($row == 0) { ?>
                        <p align="center" style="color: red;">L'Etudiant n'est inscrit a aucun cours ! </p>
                    <?php ;
                    } else { ?>
                        <div align="center">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th scope="col">COURS</th>
                                    <th scope="col">MONTANT</th>
                                </tr>
                                <?php
                                foreach ($results as $result) :
                                ?>
                                    <tr>
                                        <td><?= $result['libellecours'] ?></td>
                                        <td><?= $result['montant'] ?></td>
                                    </tr>
                                <?php
                                endforeach;
                                foreach ($total as $tot) :
                                ?>

                                    <tr>
                                        <th scope="row"> *TOTAL A PAYER </th>
                                        <td><?= $tot['total'] ?></td>

                                    </tr>
                                <?php
                                endforeach;
                                foreach ($paiements as $paiement) :
                                ?>
                                    <tr>
                                        <th scope="row"> *TOTAL VERSE </th>

                                        <?php if ($paiement['mverse'] == null) {
                                        ?><td>0</td>
                                        <?php ;
                                        } else { ?>
                                            <td><?= $paiement['mverse'] ?></td>
                                        <?php ;
                                        }
                                        ?>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                                <tr>
                                    <th scope="row"> *RESTE A PAYER </th>
                                    <?php if ($paiement['mverse'] > $tot['total']) {
                                    ?><td>0</td>
                                    <?php ;
                                    } else { ?>
                                        <td><?= $tot['total'] - $paiement['mverse'] ?></td>
                                    <?php ;
                                    }
                                    ?>


                                </tr>

                            </table>
                        <?php ;
                    }
                        ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>