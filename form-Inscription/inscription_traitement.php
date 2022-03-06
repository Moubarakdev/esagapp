<?php 
    require_once 'config.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']) && !empty($_POST['recup']) && !empty($_POST['type_utilisateur']))
    {
        // Patch XSS
        $pseudo = ucfirst(htmlspecialchars($_POST['pseudo']));
        $email = strtolower(htmlspecialchars($_POST['email']));
        $password = strtolower(htmlspecialchars($_POST['password']));
        $password_retype = strtolower(htmlspecialchars($_POST['password_retype']));
        $recup = strtolower(htmlspecialchars($_POST['recup']));
        $type_utilisateur = htmlspecialchars($_POST['type_utilisateur']);
        
        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT pseudo, email, password, recup FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0){ 
            if(strlen($pseudo) <= 100){ // On verifie que la longueur du pseudo <= 100
                if(strlen($email) <= 100){ // On verifie que la longueur du mail <= 100
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        if($password === $password_retype){ // si les deux mdp saisis sont bon

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                            
                            // On stock l'adresse IP
                            $ip = $_SERVER['REMOTE_ADDR']; 

                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password, recup, type_utilisateur,ip) VALUES(:pseudo, :email, :password, :recup, :type_utilisateur, :ip)');
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'password' => $password,
                                'recup' => $recup,
                                'type_utilisateur' => $type_utilisateur,
                                'ip' => $ip
                            ));
                            // On redirige avec le message de succès
                            header('Location:inscription.php?o&reg_err=success');
                            die();
                        }else{ header('Location: inscription.php?o&reg_err=password'); die();}
                    }else{ header('Location: inscription.php?o&reg_err=email'); die();}
                }else{ header('Location: inscription.php?o&reg_err=email_length'); die();}
            }else{ header('Location: inscription.php?o&reg_err=pseudo_length'); die();}
        }else{ header('Location: inscription.php?o&reg_err=already'); die();}
    }else{
        echo"veillez renseignez tous les champs";
        header("Location:index.php");
    }
session_destroy();