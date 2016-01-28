<?php

    class Mnew
    {
        public static function form()
	{
	    include_once '../form/Fnew.php';
	}
	
	public static function saveExpression($accid,$name,$desc,$formula,$content)
	{
	    $query="insert into expression(accid,name,description,formula,content) values($accid,'$name','$desc','$formula','$content')";
            Mdb::nonSelectQuery($query);
	    $query="select max(id) from expression";
	    return Mdb::sqlScalarQuery($query);
	}
	
	public static function updateExpression($id,$name,$desc,$content)
	{
	    $query="update expression set name='$name',description='$desc',content='$content' where id=$id";
            Mdb::nonSelectQuery($query);
	}
    }

?>