<?php
    session_start();
    include_once "../model/Mwrapper.php";
    include_once "../model/Mlogin.php";
    include_once "../model/Mexpression.php";
    include_once "../model/Mregister.php";
    include_once "../model/Msearch.php";
    //if (!Wrapper::online()) header("Location: ../index.php");
    $fid=$_GET['id'];
    Wrapper::begin(["mathmlf();","pin();","compute();","exportm();"]);
        Wrapper::contentBegin();
            if (Wrapper::online()) Wrapper::sideMenu();
            Wrapper::centerBegin();
                Mexpression::form($fid);
            Wrapper::centerEnd();
            if (!Wrapper::online())
            {
                Mregister::form();
                Mlogin::form();
                Msearch::notOnlineLink();
            }
        Wrapper::contentEnd();
    Wrapper::end();
?>