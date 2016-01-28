<?php
    session_start();
    include_once "../model/Mmy.php";
    include_once "../model/Mlogin.php";
    $accid=Mlogin::getId($_SESSION['mathmlusr']);
    $fid=$_POST['id'];
    $type=$_POST['type'];
    Mmy::save($accid,$fid,$type);
?>