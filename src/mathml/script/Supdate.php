<?php
    session_start();
    include_once "../model/Mnew.php";
    include_once "../model/Mlogin.php";
    $id=$_POST['id'];
    $name=addslashes($_POST['name']);
    $desc=addslashes($_POST['desc']);
    $content=addslashes($_POST['content']);
    Mnew::updateExpression($id,$name,$desc,$content);
    header("Location: ../view/Vexpression.php?id=$id");
?>