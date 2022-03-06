<?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=esagappdb', "root","");
    }catch(PDOException $e){
        die("Erreur de connexion " . $e->getMessage());
    }
