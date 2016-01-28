<?php
    include_once '../model/Mdb.php';
    class Msearch
    {
        public static function form($word)
        {
            echo '<input id="search" value="'.$word.'" type="text" placeholder="Unesi kriterijum" />';
            echo '<div id="search-result">';
            $res=Msearch::getExpressions($word);
            foreach ($res as $row)
            {
                echo "<a href='../view/Vexpression.php?id=".$row['id']."' class='side' style='width:90%;color:#32475e'>
                         <div style='float:right;margin-bottom:-50px;margin-right:5px;font-size:36px;'>".$row['popularity'];
                if ($row['verified']==1) echo "<img src='../images/verified.png' height='24' />";
                echo    "</div>";
                if ($row['content']!="") echo "<img src='../images/compute.png' height='24' />";
                echo    "<h4>".$row['name']."</h4>"
                        ."<div class='formula'>`".$row['formula']."`</div>"
                        ."<p>".substr($row['description'],0,200)." ...</p>".
                     "</a>";
            }
            echo '</div>';
        }
        
        public static function notOnlineLink()
        {
            echo "<a href='../view/Vsearch.php' class='side'>
                    <img src='../images/search.png' style='height:22px;margin-bottom:-7px;' /> Pretraga
                  </a>";
        }
        
        public static function getExpressions($crit)
        {
            if ($crit!="")
                $query="select * from expression
                        where (lower(name) like lower('%$crit%')) or
                              (lower(description) like lower('%$crit%')) or
                              (lower(content) like lower('%$crit%')) or
                              (lower(formula) like lower('%$crit%'))
                        order by popularity desc, ts desc limit 70";
            else $query="select * from expression order by ts desc limit 70";
            //echo $query;
            return Mdb::sqlTableQuery($query);
        }
        
        public static function filterText($text)
        {
            $i=0;
            $tbr=array();
            $tbrw=array();
            while ($i<strlen($text))
            {
                if ($text[$i]=="#")
                {
                    $h=$i;
                    $i++;
                    while (ctype_alnum($text[$i]))
                    {
                        $i++;
                        if ($i==strlen($text)) break;
                    }
                    $hashtag=substr($text, $h, $i-$h);
                    $tbr[]=$hashtag;
                    $tbrw[]="<a href='../view/Vsearch.php?word=".substr($hashtag,1)."'>$hashtag</a>";
                }
                $i++;
            }
            return str_replace($tbr,$tbrw,$text);
        }
    }

?>