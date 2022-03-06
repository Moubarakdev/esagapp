<?php
session_start();

if(!isset($_GET['o'])){
    header('Location:/esagapp/form-inscription/superuser.php');
    die();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="/esagapp/css/cdnjs.cloudflare.css" rel="stylesheet" />
    <link rel="stylesheet" href="/esagapp/css/bootstrap.css">
    <link rel="stylesheet" href="/esagapp/css/formstyle.css">
    <title>inscription</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <?php
            if (isset($_GET['reg_err'])) {
                $err = htmlspecialchars($_GET['reg_err']);

                switch ($err) {
                    case 'success':
            ?>
                        <div class="alert alert-success">
                            <strong>Succès</strong> inscription réussie !
                        </div>
                    <?php
                        break;

                    case 'password':
                    ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> mot de passe différent
                        </div>
                    <?php
                        break;

                    case 'email':
                    ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> email non valide
                        </div>
                    <?php
                        break;

                    case 'email_length':
                    ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> email trop long
                        </div>
                    <?php
                        break;

                    case 'pseudo_length':
                    ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> pseudo trop long
                        </div>
                    <?php
                    case 'already':
                    ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> compte deja existant
                        </div>
            <?php

                }
            }
            ?>




            <div class="fadeIn first">
                <h2 id="icon">Inscription</h2>
            </div>

            <!-- Login Form -->
            <form action="inscription_traitement.php" method="post">
                <input type="text" class="fadeIn second" name="pseudo" placeholder="Nom utilisateur" required="required" autocomplete="off">
                <input type="email" class="fadeIn third" name="email" placeholder="Email" required="required" autocomplete="off">
                <input type="password" class="fadeIn third" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
                <input type="password" class="fadeIn third" name="password_retype" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                <input type="text" class="fadeIn third" name="recup" placeholder="Phrase de récupération" required="required" autocomplete="off">
                <select class="form-select fadeIn third " name="type_utilisateur" required="required">
                    <option selected disabled>Type du compte</option>
                    <option value="Administrateur">Administrateur</option>
                    <option value="Sécrétaire">Sécrétaire</option>
                    <option value="Econome">Econome</option>
                </select>
                <input type="submit" class="fadeIn fourth" value="S'inscrire">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="index.php">se connecter</a>
            </div>


        </div>

    </div>

    
    <script src="/esagapp/scripts/jquery.js"></script>
    <script src="/esagapp/scripts/bootstrap1.js"></script>
    <script src="/esagapp/scripts/bootstrap2.js"></script>
    <script src="/esagapp/scripts/bootstrap3.js"></script>
</body>

</html>