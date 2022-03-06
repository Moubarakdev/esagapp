<?php
    
    
    if((isset($_POST['montant_verse'])) || 
     (isset($_POST['type_paiement'])) ||
     (isset($_POST['matricule'])) 
     
    ){
        $montant_verse = htmlspecialchars($_POST['montant_verse']);
        $type_paiement = strtoupper(htmlspecialchars($_POST['type_paiement'])); 
        $matricule =htmlspecialchars( $_POST['matricule']);
        
        include_once '../connexion.php';

        $insert = $bdd->prepare("INSERT INTO paiement(montantverse,typepaiement, matricule)
        VALUE(?, ?, ?)");
        $insert->execute(array($montant_verse,$type_paiement,$matricule));

        $bdd = null;

        header('Location:/esagapp/index.php?page=paiement&state=payementreussi');

    }else{
         
         header('Location:/esagapp/index.php?page=paiement&state=champ');
     }
    
?>