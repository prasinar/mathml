<?php
    session_start();
    include_once "../model/Mwrapper.php";
    include_once "../model/Mlogin.php";
    include_once "../model/Msearch.php";
    include_once "../model/Mregister.php";
    if (isset($_GET['word'])) $word=$_GET['word']; else $word="";
    Wrapper::begin(["mathmlf();","search();"]);
        Wrapper::contentBegin();
            if (Wrapper::online()) Wrapper::sideMenu();
            Wrapper::centerBegin();
                Msearch::form($word);
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