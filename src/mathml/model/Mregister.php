<?php
    include_once '../model/Mdb.php';
    class Mregister
    {
        public static function form()
        {
            include_once "../form/Fregister.php";
        }
        
        public static function register($user,$pass,$email)
        {
            $query="insert into account(username,password,email) values('$user','$pass','$email')";
            Mdb::nonSelectQuery($query);
            $query="insert into profile(status) values('active')";
            Mdb::nonSelectQuery($query);
        }
    }

?>