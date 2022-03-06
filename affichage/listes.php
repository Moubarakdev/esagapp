<?php
session_start();
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:/esagapp/form-inscription/index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Etudiants</title>
    <link rel="stylesheet" href="/esagapp/css/bootstrap.css">
    <style>
    html{
        background-color: #043e50 ;
    }
</style>
</head>

<body>
    <div class="container-fluid" style="background-color: #043e50;">

        <!-- BARRE DE NAVIGATION -->


        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="/esagapp/index.php?page=filiere">Créer une filiere <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/esagapp/index.php?page=etudiant">Ajouter un etudiant <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/esagapp/index.php?page=paiement">Effectuer un paiement <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/esagapp/index.php?page=cours">Ajouter un cours <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/esagapp/index.php?page=inscription">Inscription<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="listes.php?page=listes">enregistrements<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/esagapp/form-inscription/deconnexion.php">Déconnexion</a><span class="sr-only">(current)</span></a>
                    </li>

                </ul>
                <form class="d-flex" method="GET" id="table-form">
                    <input class="form-control me-3" type="search" placeholder="Faire une recherche" aria-label="Search" id="search">
                </form>
            </div>
        </nav>



        <?php
        error_reporting(0); //Masquer les Notices
        include 'listeEtudiant.php';
        include 'listeEtudiantinscrit.php';
        include 'listeFiliere.php';
        include 'listeCours.php';
        $bdd = null;
        ?>


    </div>

    <script src="/esagapp/scripts/jquery.js"></script>
    <script src="/esagapp/scripts/bootstrap1.js"></script>
    <script src="/esagapp/scripts/bootstrap2.js"></script>
    <script src="/esagapp/scripts/bootstrap3.js"></script>
    <script src="/esagapp/scripts/jquery.uitablefilter.js"></script>

    <script>
        $(function() {
            var theTable = $('table.liste')

            theTable.find("tbody > tr").find("td:eq(1)").mousedown(function() {
                $(this).prev().find(":checkbox").click()
            });

            $("#search").keyup(function() {
                $.uiTableFilter(theTable, this.value);
            })

            $('#table-form').submit(function() {
                theTable.find("tbody > tr:visible > td:eq(1)").mousedown();
                return false;
            }).focus(); //Give focus to input field
        });
    </script>


</body>

</html>