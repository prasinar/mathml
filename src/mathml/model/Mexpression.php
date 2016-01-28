<?php
    include_once '../model/Mdb.php';
    class Mexpression
    {
        public static function form($fid)
	{
            include_once '../model/Mwrapper.php';
            include_once '../model/Mlogin.php';
	    include_once '../model/Msearch.php';
            $res=Mexpression::getExpression($fid);
            if ($res['verified']==1) $verified="<img src='../images/verified.png' style='height:36px;margin-bottom:-5px;' />";
            else $verified="";
	    $acc=Mlogin::getAccForId($res['accid']);
	    echo "<h5 style='color:#b3b3b3'>".$acc['username']."</h5>";
            echo "<h1 style='color:#32475e;'>$verified".$res['name']." <span style='color:#b3b3b3;font-size:26px'>[".$res['popularity']."]</span></h1>";
            echo "<div class='formula'>`".$res['formula']."`</div>";
            echo "<p id='desc'>".Msearch::filterText($res['description'])."</p>";
            if (Wrapper::online())
	    {
		$accid=Mlogin::getId($_SESSION['mathmlusr']);
		if (Mexpression::mine($accid,$fid)==1)
		{
		    echo '<img style="height:22px;margin-right:60px;" src="../images/edit.png" class="user" />';
		    echo "<a href='../view/Vnew.php?id=".$res['id']."' style='color:#e74d3d;float:right;'>IZMENI</a>";
		    echo '<img height="22" src="../images/delete.png" class="user" />';
		    echo "<a href='../script/Sdelete.php?id=".$res['id']."' style='color:#e74d3d;float:right;' onclick='".'return confirm("Da li ste sigurni da želite da obrišete ovaj izraz?");'."'>OBRIŠI</a>";
		} else
		{
		    if (Mexpression::isAdded($accid,$fid)==1) $value="BRIŠI IZ KOLEKCIJE"; else $value="DODAJ U KOLEKCIJU";
		    echo "<input type='submit' id='save' value='$value' data-fid='$fid' />";
		}
	    }
		echo "<span class='heading'>AsciiMath</span>
            <pre><code id='asciimath' disabled='true' class='exp-area'>".$res['formula']."</code></pre>
		    <span class='heading'>LaTeX</span>
            <pre><code id='latex' disabled='true' class='exp-area tex'></code></pre>
			<span class='heading'>Presentation MathML</span>
            <pre><code id='mathml' disabled='true' class='exp-area html'></code></pre>";
		echo "<input type='button' id='export' value='Preuzmi izvorni kod' />";
		if ($res['content']!="")
		{
			echo "<span class='heading'>Content MathML</span>
                  <pre><code disabled='true' class='exp-area html'>".htmlspecialchars ($res['content'])."</code></pre>";
			echo "<span class='heading' id='label' data-curr='mml'>Unesi vrednosti</span>";
			echo "<div id='var' style='float:left;width:100%;'>";
					Mexpression::getCi($res['content']);
			echo "  <br /><input type='submit' id='compute' data-id='".$res['id']."' value='IZRAČUNAJ' />";
			echo "</div>";
			echo "<span class='heading' id='result'></span>
				  <div style='display:none;'>`".$res['formula']."`</div>";
		}
	}
	
	    public static function getCi($content)
		{
			$xml = simplexml_load_string($content);
			$json = json_encode($xml);
			$array = json_decode($json,TRUE);
			
			function search($array, $key)
			{
				$results = array();
			
				if (is_array($array)) {
					if (isset($array[$key])) {
						$results[] = $array[$key];
					}
			
					foreach ($array as $subarray) {
						$results = array_merge($results, search($subarray, $key));
					}
				}
			
				return $results;
			}
			$srch = search($array,"ci");
			function array_flatten($array) { 
			  if (!is_array($array)) { 
				return FALSE; 
			  } 
			  $result = array(); 
			  foreach ($array as $key => $value) { 
				if (is_array($value)) { 
				  $result = array_merge($result, array_flatten($value)); 
				} 
				else { 
				  $result[$key] = $value; 
				} 
			  } 
			  return $result; 
			}
			$flat = array_flatten($srch);
			$final = array_unique($flat);
			asort($final);
			echo "<table>";
			foreach ($final as $var){
				echo "<tr>";
				echo "<td>`".$var."`</td>
				      <td>
					      <input class='ci' style='text-align:right;' type='text' name='".$var."'/>
					  </td>";
				echo "</tr>";
			}
			echo "</table>";
		}
        
        public static function mine($accid,$fid)
        {
            $query="select count(id) from expression where id=$fid and accid=$accid";
            return Mdb::sqlScalarQuery($query);
        }
        
        public static function getExpression($fid)
        {
            $query="select * from expression where id=$fid";
            return Mdb::sqlRowQuery($query);
        }
        
        public static function save($accid,$fid,$type)
	{
            if ($type=="DODAJ U KOLEKCIJU")
            {
                $query="insert into pinned(accid,fid) values($accid,$fid)";
                Mdb::nonSelectQuery($query);
                $query="update expression set popularity=popularity+1 where id=$fid";
                Mdb::nonSelectQuery($query);
            } else if ($type=="BRIŠI IZ KOLEKCIJE")
            {
                $query="delete from pinned where accid=$accid and fid=$fid";
                Mdb::nonSelectQuery($query);
                $query="update expression set popularity=popularity-1 where id=$fid";
                Mdb::nonSelectQuery($query);
            }
        }
        
        public static function isAdded($accid,$fid)
        {
            $query="select count(fid) from pinned where fid=$fid and accid=$accid";
            return Mdb::sqlScalarQuery($query);
        }
        
        public static function getAll()
	{
	    include_once '../model/Mmy.php';
	    include_once '../model/Mlogin.php';
            $accid=Mlogin::getId($_SESSION['mathmlusr']);
	    $res=Mexpression::getAllPinned();
            foreach ($res as $row)
            {
                if (Mmy::isAdded($accid,$row['id'])==1) $value="BRIŠI IZ FORMIRANIH IZRAZA"; else $value="DODAJ U FORMIRANE IZRAZE";
                echo "<div class='side' style='width:auto;height:150px;'>";
                echo    "<a href='../view/Vexpression.php?id=".$row['id']."'>".$row['name']."<div class='formula'>`".$row['formula']."`</div></a>";
                echo    "<input type='submit' id='".$row['id']."' value='$value' class='user' />
                      </div>";
            }
	}
	
	public static function getAllSaved()
	{
	    include_once '../model/Mlogin.php';
            $accid=Mlogin::getId($_SESSION['mathmlusr']);
	    $query="select * from expression e join saved p on e.id=p.fid where p.accid=$accid";
            return Mdb::sqlTableQuery($query);
	}
	
	public static function getAllPinned()
	{
	    include_once '../model/Mlogin.php';
            $accid=Mlogin::getId($_SESSION['mathmlusr']);
	    $query="select * from expression e join pinned p on e.id=p.fid where p.accid=$accid";
            return Mdb::sqlTableQuery($query);
	}
	
		public static function getContent($id)
		{
			$query="select content from expression where id=$id";
            $res=Mdb::sqlRowQuery($query);
			return $res['content'];
		}
	
    }

?>