<?php
    include_once '../connexion.php';

    if((isset($_POST['matricule'])) || 
     (isset($_POST['nom'])) ||
     (isset($_POST['prenom'])) || 
     (isset($_POST['date_naissance'])) || 
     (isset($_POST['sexe'])) ||
     (isset($_POST['adresse'])) ||
     (isset($_POST['filiere']))||
     (isset($_POST['niveau']))
    ){
        $matricule = htmlspecialchars($_POST['matricule']);
        $nom = strtoupper(htmlspecialchars($_POST['nom']));
        $prenom =ucwords(htmlspecialchars( $_POST['prenom']));
        $sexe = ucfirst(htmlspecialchars( $_POST['sexe']));
        $date_naissance =htmlspecialchars( $_POST['date_naissance']);
        $adresse = ucfirst(htmlspecialchars( $_POST['adresse']));
        $filiere =strtoupper(htmlspecialchars( $_POST['filiere']));
        $niveau = strtoupper(htmlspecialchars($_POST['niveau']));

        $check = $bdd->query("SELECT * FROM ETUDIANT WHERE matricule = '$matricule'");
        $count = $check->rowCount();

        if($count == 1){
            header('Location:/esagapp/index.php?page=etudiant&state=existe');
        }else{

            $insert = $bdd->prepare("INSERT INTO etudiant(matricule,nom, prenom, datenaissance,sexe,adresse,filiere,niveau)
            VALUE(?, ?, ?, ?, ?,?,?,?)");
            $insert->execute(array($matricule,$nom,$prenom,$date_naissance,$sexe,$adresse,$filiere,$niveau));
            $bdd = null;
            header('Location:/esagapp/index.php?page=etudiant&state=addstudent');
        
        }
        
        
    }else{
        header('Location:/esagapp/index.php?page=etudiant&state=champ');
    }
    

?>
