<?php
    session_start();
    include_once "../model/Mmy.php";
    $id=$_GET['id'];
    Mmy::delete($id);
    header("Location: ../view/Vmy.php");
?>