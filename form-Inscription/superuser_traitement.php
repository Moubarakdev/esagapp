<?php
$pin = 1234;
if (!empty($_POST['code'])) {
    $code = $_POST['code'];
    if ($code == $pin) {
        session_start();
        header('Location: inscription.php?o');
        die();
    } else {
        header('Location: superuser.php?reg_err=code');
        die();
    }
} else {
    echo "veillez renseignez tous les champs";
    header("Location:superuser.php");
}
?>