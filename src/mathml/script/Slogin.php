<?php
    session_start();
    include_once "../model/Mlogin.php";
    $user=addslashes($_POST['username']);
    $pass=addslashes($_POST['password']);
    if (Mlogin::isAccount($user,$pass)==1) $_SESSION['mathmlusr']=$user;
    header("Location: ../view/Vhome.php");
?>
