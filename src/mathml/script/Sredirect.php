<?php
    session_start();
    include_once "../model/Mlogin.php";
    $_SESSION['mathmltex']=$_POST['tex'];
    header("Location: ../view/Vnew.php");
?>