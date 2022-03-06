<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/esagapp/css/cdnjs.cloudflare.css" rel="stylesheet" />
    <link rel="stylesheet" href="/esagapp/css/bootstrap.css">
    <link rel="stylesheet" href="/esagapp/css/formstyle.css">

    <title>Connexion</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <?php
            if (isset($_GET['login_err'])) {
                $err = htmlspecialchars($_GET['login_err']);

                switch ($err) {
                    case 'phrase':
            ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong>Phrase de récupération incorrect
                            <br>
                        </div>
                    <?php
                        break;

                    case 'email':
                    ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> email incorrect
                            <br>
                        </div>
                    <?php
                        break;

                    case 'already':
                    ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> compte non existant
                            <br>
                        </div>
            <?php
                        break;
                }
            }
            ?>

            <?php

            if (isset($_GET['err'])) {
                $err2 = htmlspecialchars($_GET['err']);
                switch ($err2) {
                    case 'current_password':
                        echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                        break;

                    case 'success_password':
                        echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                        break;
                }
            }
            ?>

            <!-- Tabs Titles -->


            <div class="fadeIn first">
                <h2 id="icon">VERIFICATION</h2>
            </div>

            <!-- Login Form -->
            <form action="recuperation_traitement.php" method="post">

                <?php
                if (@$err == 'success') {
                    echo '<input type="button" value="Changer de mot de passe" class="btn btn-success btn-lg fadeIn fourth" data-toggle="modal" data-target="#change_password">';
                } else { ?>
                    <input type="email" id="login" class="fadeIn second" name="email" placeholder="Email" required><br>
                    <input type="text" id="" class="fadeIn third" name="recup" placeholder="Phrase de récupération" required autocomplete="off">
                    <input type="submit" class="fadeIn fourth" value="Valider">
                <?php ;
                }
                ?>
            </form>

            <!-- Remind Passowrd -->

            <div>
                <a class="underlineHover" href="index.php">connexion</a>
            </div>

            <div id="formFooter">
                <a class="underlineHover" href="superuser.php">Inscription</a>
            </div>

        </div>
    </div>




    <script src="/esagapp/scripts/jquery.js"></script>
    <script src="/esagapp/scripts/bootstrap1.js"></script>
    <script src="/esagapp/scripts/bootstrap2.js"></script>
    <script src="/esagapp/scripts/bootstrap3.js"></script>
</body>

</html>


<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Changer mon mot de passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/esagapp/form-inscription/layouts/change_password2.php" method="POST">
                    <label for='current_password'>Mot de passe actuel</label>
                    <input type="password" id="current_password" name="current_password" class="form-control" required />
                    <br />
                    <label for='new_password'>Nouveau mot de passe</label>
                    <input type="password" id="new_password" name="new_password" class="form-control" required />
                    <br />
                    <label for='new_password_retype'>Re tapez le nouveau mot de passe</label>
                    <input type="password" id="new_password_retype" name="new_password_retype" class="form-control" required />
                    <br />
                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>