<?php
    include_once("../connexion.php");

    if((isset($_POST['libelle_filiere'])) || 
     (isset($_POST['code_filiere'])) 
    ){
        $libelle = ucwords(htmlspecialchars($_POST['libelle_filiere']));
        $code = strtoupper(htmlspecialchars($_POST['code_filiere']));

        $check = $bdd->query("SELECT * FROM FILIERE WHERE codefiliere = '$code'");
        $count = $check->rowCount();

        if($count == 1){
          
           header('Location:/esagapp/index.php?page=filiere&state=deja');
        }else{
            
            $req = $bdd->prepare("INSERT INTO FILIERE(codefiliere, libellefiliere)  
            VALUE(?,?)");
            $req->execute(array($code,$libelle));
            
            $bdd = null;
            header('Location:/esagapp/index.php?page=filiere&state=enregistrer');
        }
        

    }else{
        
        header('Location:/esagapp/index.php?page=filiere&state=champ');
        
    }
   
?>

