<?php
session_start(); // Démarrage de la session
require_once 'config.php'; // On inclut la connexion à la base de données

if (!empty($_POST['email']) && !empty($_POST['recup'])) // Si il existe les champs email, password et qu'il sont pas vident
{
    // Patch XSS
    $email = strtolower(htmlspecialchars($_POST['email']));
    $recup = strtolower(htmlspecialchars($_POST['recup']));

    $email = strtolower($email); // email transformé en minuscule

    // On regarde si l'utilisateur est inscrit dans la table utilisateurs
    $check = $bdd->prepare('SELECT pseudo, email, type_utilisateur, recup FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();



    // Si > à 0 alors l'utilisateur existe
    if ($row > 0) {
        // Si le mail est bon niveau format
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Si le mot de passe est le bon
            if ($recup == $data['recup']) {



                //On créer la session et on redirige sur INDEX.php
                $_SESSION['user_name'] = $data['pseudo'];
                $_SESSION['user'] = $data['email'];
                $_SESSION['user_type'] = $data['type_utilisateur'];
                header('Location: recuperation.php?login_err=success');
                die();
            } else {
                header('Location: recuperation.php?login_err=phrase');
                die();
            }
        } else {
            header('Location: recuperation.php?login_err=email');
            die();
        }
    } else {
        header('Location: recuperation.php?login_err=already');
        die();
    }
} else {
    echo "Veillez renseignez tous les champs";
    header("Loation:recuperation.php");
}
