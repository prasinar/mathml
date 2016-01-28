<?php
    session_start();
    include_once "../model/Mexpression.php";
    include_once "../model/Mlogin.php";
    $accid=Mlogin::getId($_SESSION['mathmlusr']);
    $fid=$_POST['id'];
    $type=$_POST['type'];
    Mexpression::save($accid,$fid,$type);
?>