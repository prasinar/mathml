<?php
    session_start();
    include_once "../model/Mregister.php";
    $email=addslashes($_POST['email']);
    $user=addslashes($_POST['username']);
    $pass=addslashes($_POST['password']);
    Mregister::register($user,$pass,$email);
    $_SESSION['mathmlusr']=$user;
    header("Location: ../view/Vhome.php");
?>
