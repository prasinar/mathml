<?php
    session_start();
    include_once "../model/Mnew.php";
    include_once "../model/Mlogin.php";
    $accid=Mlogin::getId($_SESSION['mathmlusr']);
    $name=addslashes($_POST['name']);
    $desc=addslashes($_POST['desc']);
    $content=addslashes($_POST['content']);
    $formula=addslashes($_SESSION['mathmltex']);
    $id=Mnew::saveExpression($accid,$name,$desc,$formula,$content);
    header("Location: ../view/Vexpression.php?id=$id");
?>