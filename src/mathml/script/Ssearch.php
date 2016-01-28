<?php
    include_once '../model/Msearch.php';
    $word=$_POST['word'];
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
?>