<?php
    include_once '../model/Mdb.php';
    class Mlogin
    {
        public static function form()
        {
            include_once "../form/Flogin.php";
        }
        
        public static function isAccount($user,$pass)
        {
            $query="select count(id) from account where username='$user' and password='$pass'";
            return Mdb::sqlScalarQuery($query);
        }
        
        public static function getId($user)
        {
            $query="select id from account where username='$user'";
            return Mdb::sqlScalarQuery($query);
        }
        
        public static function getPassword($user)
        {
            $query="select password from account where username='$user'";
            return Mdb::sqlScalarQuery($query);
        }
        
        public static function setPassword($user,$pass)
        {
            $query="update account set password='$pass' where username='$user'";
            Mdb::nonSelectQuery($query);
        }
        
        public static function getAccForId($accid)
        {
            $query="select * from account where id=$accid";
            return Mdb::sqlRowQuery($query);
        }
        
        public static function logout()
        {
            return '<div id="logout">
                    <a href="../script/Slogout.php">Odjavi se</a>
                  </div>';
        }
    }

?>