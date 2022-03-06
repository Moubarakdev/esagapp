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
                    case 'password':
            ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> mot de passe incorrect
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


            <!-- Tabs Titles -->


            <div class="fadeIn first">
                <h2 id="icon">CONNEXION</h2>
            </div>

            <!-- Login Form -->
            <form action="connexion.php" method="post">
                <input type="email" id="login" class="fadeIn second" name="email" placeholder="Email" required><br>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required autocomplete="off">
                <input type="submit" class="fadeIn fourth" value="S'indentifier">
            </form>

            <!-- Remind Passowrd -->

            <div >
                <a class="underlineHover" href="recuperation.php">Mot de passe oublié</a>
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