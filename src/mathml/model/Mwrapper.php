<?php

    class Wrapper
    {
		public static function online()
		{
			if (isset($_SESSION['mathmlusr'])) return 1;
			return 0;
		}
	
        public static function begin($funkcije)
        {
			include_once '../model/Mlogin.php';
			if (Wrapper::online()) $logout=Mlogin::logout();
			else $logout="";
				echo "<!DOCTYPE html>
					  <html>
						 <head>
						<link rel='icon' type='image/ico' href='../images/fav.ico'>
				        <link rel='stylesheet' type='text/css' href='../style.css'/>
						<style type='text/css' media='screen'>
							#editor { 
								width:98%;
								min-height:300px;
							}
						</style>
							<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
							<title>MathML</title>";
			echo	"<script src='../plugins/f.js'></script>
				<script type='text/x-mathjax-config'>
					
            
            MathJax.Hub.Config({
				extensions: ['asciimath2jax.js','tex2jax.js'],
				MathML: {
                        extensions: ['content-mathml.js']
                },
				preJax: '\\[\\[', postJax: '\\]\\]',
				menuSettings: {semantics: true, zoom: 'Hover'}
            });
				</script>
				<script src='http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_HTMLorMML'></script>
				<script src='../plugins/jquery.js'></script>
				<script src='../plugins/ascii2tex.js'></script>
				<link rel='stylesheet' href='../plugins/highlight/styles/github.css'>
				<script src='../plugins/highlight/highlight.pack.js'></script>
				<script>hljs.initHighlightingOnLoad();</script>
				<script>
				$( document ).ready(function() {";
			foreach ($funkcije as $funkcija) echo $funkcija;
			echo	   "})
				</script>
						 </head>
						 <body>
				<a href='../view/Vhome.php'>
					<div id='header'>
					<img src='../images/index.png' style='height:44px;margin-bottom:-5px;' />
					MathML";
			echo $logout
					."</div>
				</a>
					 ";
        }
	
		public static function sideMenu()
		{
			include_once '../model/Mlogin.php';
			$user=$_SESSION['mathmlusr'];
			$id=Mlogin::getId($user);
			$page=explode("V",$_SERVER['PHP_SELF'])[1];
			$my=$collection=$search="";
			switch ($page)
			{
			case "my.php":$my='style="color:#32475e;border-right:5px solid #e74d3d"';break;
			case "collection.php":$collection='style="color:#32475e;border-right:5px solid #e74d3d"';break;
			case "search.php":$search='style="color:#32475e;border-right:5px solid #e74d3d"';break;
			default:break;
			}
			echo
			'<div id="sidebar">
			<ul>
				<a href="Vmy.php"><li '.$my.'>Moji izrazi <img height="22" src="../images/home.png" class="user" /></li></a>
				<a href="Vcollection.php"><li '.$collection.'>Kolekcija <img height="22" src="../images/flag.png" class="user" /></li></a>';
			if (Wrapper::online()) echo '<a href="Vsearch.php"><li '.$search.'>Pretraga <img height="22" src="../images/search.png" class="user" /></li></a>';
			echo    '</ul>
			</div>';
		}
		
		public static function topMenu($names,$links,$images)
		{
			$page=$_SESSION['wlltyp'];
			if (isset($_GET['type'])) $page=$_GET['type'];
			echo "<div class='topMenuBox'><div id='topMenu'><ul>";
			$i=0;
			if ($links[0][0]=="S") $l="script"; else $l="view";
			foreach ($names as $name)
			{
			$fromLink=explode("type=",$links[$i])[1];
			if ($page==$fromLink)
				echo "<a href='../$l/".$links[$i]."'><li style='opacity:1;color:#32475e;border-bottom:5px solid #e74d3d'><img src='../images/".$images[$i].".png' style='height:22px;margin-bottom:-6px;'/> ".$name."</li></a>";
			else echo "<a href='../$l/".$links[$i]."'><li><img src='../images/".$images[$i].".png' style='height:22px;margin-bottom:-6px;'/> ".$name."</li></a>";
			$i++;
			}
			echo "</ul></div></div>";
		}
		
		public static function contentBegin()
		{
			echo "<div id='content'>";
		}
		
		public static function contentEnd()
		{
			echo "</div>";
		}
		
		public static function centerBegin()
		{
			echo "<div id='center'>";
		}
		
		public static function centerEnd()
		{
			echo "</div>";
		}
			
			public static function end() {
				echo "   </body>
					  </html>";
			}
			
			public static function formatDate($date)
			{
			$ndate = new DateTime($date);
				$diff = time() - strtotime($date);
				if ($diff<60) return $diff." seconds ago";
				else if (($diff>=60) && ($diff<60*60)) return floor($diff/60)." minutes ago";
				else if (($diff>=60*60) && ($diff<60*60*24)) return floor($diff/(60*60))." hours ago";
				else if (($diff>=60*60*24) && ($diff<60*60*24*2)) return "Yesterday";
			else if (($diff>=60*60*24*2) && ($diff<60*60*24*11)) return floor($diff/(60*60*24))." days ago";
				else
				{
					return $ndate->format("m.d.Y. H:s");
				}
			}
		}

?>
