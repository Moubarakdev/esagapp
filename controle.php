<?php
session_start();
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
  header('Location:/esagapp/form-inscription/index.php');
  die();
}
?>