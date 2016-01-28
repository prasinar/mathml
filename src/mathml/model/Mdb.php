<?php

class Mdb {

    private static $dbh;
    private static $dsn;
    const HOST = "localhost";
    const BAZA = "mathml";
    const USER = "root";
    const PASS = "";
    
    public static function sqlRowQuery($query) {

        try {
	    $host=self::HOST;
	    $baza=self::BAZA;
	    $user=self::USER;
	    $pass=self::PASS;
            
            self::$dsn = "mysql:host=$host;dbname=$baza";
            self::$dbh = new PDO(self::$dsn, $user, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            
	    $pdo_izraz = self::$dbh->query($query);
            if ($pdo_izraz!=null) $result = $pdo_izraz->fetch();
            else $result=null;
        
	} catch (PDOException $exc) {
	    echo $exc->getMessage();
        }
        self::$dbh = null;
        return $result;
    }
	
    public static function sqlTableQuery($query) {

        try {
	    $host=self::HOST;
	    $baza=self::BAZA;
	    $user=self::USER;
	    $pass=self::PASS;
            
            self::$dsn = "mysql:host=$host;dbname=$baza";
            self::$dbh = new PDO(self::$dsn, $user, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			
            $pdo_izraz = self::$dbh->query($query);
            if ($pdo_izraz!=null) $result = $pdo_izraz->fetchAll();
            else $result=null;
			
        } catch (PDOException $exc) {
	    echo $exc->getMessage();
        }
        self::$dbh = null;
        return $result;
    }

		
    public static function sqlScalarQuery($query) {
        try {
	    $host=self::HOST;
	    $baza=self::BAZA;
	    $user=self::USER;
	    $pass=self::PASS;
            
            self::$dsn = "mysql:host=$host;dbname=$baza";
            self::$dbh = new PDO(self::$dsn, $user, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			
            $pdo_izraz = self::$dbh->prepare($query);
            $pdo_izraz->execute();
            $result = $pdo_izraz->fetch();
			
        } catch (PDOException $exc) {
	    echo $exc->getMessage();
        }
        self::$dbh = null;
        return $result[0];
    }

    public static function nonSelectQuery($query) {
        try {
	    $host=self::HOST;
	    $baza=self::BAZA;
	    $user=self::USER;
	    $pass=self::PASS;
            
            self::$dsn = "mysql:host=$host;dbname=$baza";
            self::$dbh = new PDO(self::$dsn, $user, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			
            $pdo_izraz = self::$dbh->prepare($query);
            $pdo_izraz->execute();
			
        } catch (PDOException $exc) {
	    echo $exc->getMessage();
        }
        self::$dbh = null;
    }

}

?>
