<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/esagapp/css/cdnjs.cloudflare.css" rel="stylesheet" />
    <link rel="stylesheet" href="/esagapp/css/bootstrap.css">
    <link rel="stylesheet" href="/esagapp/css/formstyle.css">
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <?php
            if (isset($_GET['reg_err'])) {
                $err = htmlspecialchars($_GET['reg_err']);

                switch ($err) {

                    case 'code':
            ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> code incorrect !
                        </div>
            <?php
                        break;
                }
            }
            ?>
            <div class="fadeIn first">
                <h2 id="icon" class="text-danger">Authentification </h2>
            </div>

            <!-- Login Form -->
            <form action="superuser_traitement.php" method="post">
                <input type="password" class="fadeIn third" name="code" placeholder="Code Pin" required="required" autocomplete="off" style="width: 40%;" maxlength="4" class="mb-4" ><br>
                <input type="submit" class="fadeIn fourth" value="VALIDER">
                <p align="center" style="font-size: 12px;" class="text-danger">Cette action est restrinte</p>
            </form>
        </div>

    </div>
</body>

</html>