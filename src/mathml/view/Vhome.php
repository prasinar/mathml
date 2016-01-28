<?php
    session_start();
    include_once "../model/Mwrapper.php";
    include_once "../model/Mlogin.php";
    include_once "../model/Mhome.php";
    include_once "../model/Mregister.php";
    include_once "../model/Msearch.php";
    //if (!Wrapper::online()) header("Location: ../index.php");
    Wrapper::begin(["mathmlf();","exportm();"]);
        Wrapper::contentBegin();
            if (Wrapper::online()) Wrapper::sideMenu();
            Wrapper::centerBegin();
                Mhome::form();
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