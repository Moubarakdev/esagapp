<?php
     include_once '../connexion.php';

    if((isset($_POST['code_cours'])) || 
     (isset($_POST['libelle_cours'])) ||
     (isset($_POST['code_filiere']))
    ){
        $libellecours = ucwords(htmlspecialchars($_POST['libelle_cours']));
        $codecours = strtoupper(htmlspecialchars($_POST['code_cours']));
        $codefiliere = strtoupper(htmlspecialchars($_POST['code_filiere']));

        $check = $bdd->query("SELECT * FROM COURS WHERE codecours = '$codecours'");
        $count = $check->rowCount();

        if($count == 1){
            header('Location:/esagapp/index.php?page=cours&state=coursexiste');

        }else{
            $req = $bdd->prepare("INSERT INTO cours(codecours, libellecours,codefiliere)  
            VALUE(?,?,?)");
            $req->execute(array($codecours,$libellecours,$codefiliere));

            $bdd = null;
            header('Location:/esagapp/index.php?page=cours&state=addcours');
            
        }

    }else{
        header('Location:/esagapp/index.php?page=cours&state=champ');
     }
   
?>

