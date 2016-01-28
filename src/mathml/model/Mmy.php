<?php
    include_once '../model/Mdb.php';
    class Mmy
    {
        public static function getAll()
	{
            include_once '../model/Mlogin.php';
            $accid=Mlogin::getId($_SESSION['mathmlusr']);
	    $query="select * from expression where accid=$accid order by ts desc";
            $res=Mdb::sqlTableQuery($query);
            foreach ($res as $row)
            {
                if (Mmy::isAdded($accid,$row['id'])==1) $value="BRIŠI IZ FORMIRANIH IZRAZA"; else $value="DODAJ U FORMIRANE IZRAZE";
                echo "<div class='side' style='width:auto;height:150px;'>";
                echo    "<a href='../view/Vexpression.php?id=".$row['id']."'>".$row['name']."<div class='formula'>`".$row['formula']."`</div></a>";
                echo    "<input type='submit' id='".$row['id']."' value='$value' class='user' />
                      </div>";
            }
	}
        
        public static function save($accid,$fid,$type)
	{
            if ($type=="DODAJ U FORMIRANE IZRAZE")
            {
                $query="insert into saved(accid,fid) values($accid,$fid)";
                Mdb::nonSelectQuery($query);
            } else if ($type=="BRIŠI IZ FORMIRANIH IZRAZA")
            {
                $query="delete from saved where accid=$accid and fid=$fid";
                Mdb::nonSelectQuery($query);
            }
        }
        
        public static function isAdded($accid,$fid)
        {
            $query="select count(fid) from saved where fid=$fid and accid=$accid";
            return Mdb::sqlScalarQuery($query);
        }
	
	public static function delete($id)
	{
	    $query="delete from expression where id=$id";
	    Mdb::nonSelectQuery($query);
	}
    }

?>