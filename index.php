<?php
session_start();
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
  header('Location:/esagapp/form-inscription/index.php');
  die();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>GESTION DES ETUDIANTS</title>
  <link rel="stylesheet" href="/esagapp/css/index_style.css">
</head>

<body>


  <table width="1000" border="0" cellpadding="0" cellspacing="0" align="center">
    <!--DWLayoutTable-->
    <tr>
      <td height="68" colspan="2" valign="top" ">
      <div class=" headercontainer">
        <?php include_once("entete.php"); ?>
        </div>
      </td>
    </tr>
    <tr>
      <td width="170" rowspan="2" valign="top" bgcolor="#f7f7f7">
        <div class="menucontainer">
          <?php include_once("menu.php"); ?>
        </div>
      </td>
      <td width="718" height="889" valign="top" bgcolor="#043e50">
        <div class="maincontainer">
          <?php

          error_reporting(0);//Masquer les erreur en fin de developpement
          switch (@$_GET["page"]) {
            case 'filiere':
              include_once("filiere/filiere.php");
              break;
            case 'etudiant':
              include_once("etudiant/etudiant.php");
              break;
            case 'paiement':
              include_once("paiement/paiement.php");
              break;
            case 'cours':
              include_once("cours/cours.php");
              break;
            case 'inscription':
              include_once("inscription/inscription.php");
              break;
            case 'listes':
              include_once("affichage/listes.php");
              break;
            default:
              include_once("filiere/filiere.php");
              break;
          }

          ?>

          <?php
          switch (@$_GET['state']) {
            case 'deja':
              echo '<script> alert("La filiere que vous tentez de créer existe déjà !!");</script>';
              break;
            case 'enregistrer':
              echo '<script> alert("Filiere enregistrée avec succès !!");</script>';
              break;
            case 'existe':
              echo '<script> alert("Le matricule que vous tentez d\'enregistrer existe déjà !!");</script>';
              break;
            case 'addstudent':
              echo '<script> alert("Etudiant enregistré avec succès !!");</script>';
              break;
            case 'champ':
              echo '<script> alert("Veillez renseigner tous les champs !!");</script>';
              break;
            case 'coursexiste':
              echo '<script> alert("Le cours que vous tentez de créer existe déjà !!");</script>';
              break;
            case 'addcours':
              echo '<script> alert("Cours enregistré avec succès !!");</script>';
              break;
            case 'dejains':
              echo '<script> alert("Etudiant  déjà inscrit à ce cours !!");</script>';
              break;
            case 'enregistrerins':
              echo '<script> alert("Etudiant inscrit avec succès !!");</script>';
              break;
            case 'montant':
              echo '<script> alert("Montant invalide !!");</script>';
              break;
            case 'payementreussi':
              echo '<script> alert("Payement effectuer avec succès !!");</script>';
              break;
          }

          ?>
        </div>
      </td>
    </tr>
    <tr height="100%" bgcolor="#021c24">
      <td height="100%" valign="top" class="footercontainer">
        <?php include_once "footer.php"; ?>
      </td>
    </tr>
  </table>
</body>

</html>