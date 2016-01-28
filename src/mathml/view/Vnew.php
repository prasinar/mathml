<?php
    session_start();
    include_once "../model/Mwrapper.php";
    include_once "../model/Mlogin.php";
    include_once "../model/Mnew.php";
    include_once "../model/Mregister.php";
    include_once "../model/Mexpression.php";
    if (!Wrapper::online()) header("Location: ../index.php");
    if (isset($_GET['id']))
    {
        if (Mexpression::mine(Mlogin::getId($_SESSION['mathmlusr']),$_GET['id'])!=1)
        header("Location: ../index.php");
    }
    Wrapper::begin(["mathmlf();"]);
        Wrapper::contentBegin();
            if (Wrapper::online()) Wrapper::sideMenu();
            Wrapper::centerBegin();
                Mnew::form();
            Wrapper::centerEnd();
            if (!Wrapper::online())
            {
                Mregister::form();
                Mlogin::form();
            }
        Wrapper::contentEnd();
    Wrapper::end();
?>