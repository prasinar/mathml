<?php
    include_once '../model/Mdb.php';
    class Mbexpression
    {
        public static function getTypes()
        {
            $query="select distinct type from bexpression";
            return Mdb::sqlTableQuery($query);
        }
        
        public static function getAll()
        {
            $query="select * from bexpression";
            return Mdb::sqlTableQuery($query);
        }
        
        public static function getForType($type)
        {
            $query="select * from bexpression where type='$type'";
            return Mdb::sqlTableQuery($query);
        }
    }

?>