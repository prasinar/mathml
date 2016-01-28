<?php
    session_start();
    include_once "../model/Mwrapper.php";
    include_once "../model/Mlogin.php";
    include_once "../model/Mexpression.php";
    include_once "../model/Mregister.php";
    if (!Wrapper::online()) header("Location: ../index.php");
    Wrapper::begin(["mathmlf();","add();"]);
        Wrapper::contentBegin();
            if (Wrapper::online()) Wrapper::sideMenu();
            Wrapper::centerBegin();
                Mexpression::getAll();
            Wrapper::centerEnd();
            if (!Wrapper::online())
            {
                Mregister::form();
                Mlogin::form();
            }
        Wrapper::contentEnd();
    Wrapper::end();
?>