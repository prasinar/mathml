<?php
    session_start();
    include_once '../model/Mexpression.php';
    include_once '../model/Mbexpression.php';
    $type=$_POST['type'];
    if ($type=="Formirani izrazi")
    {
        $res=Mexpression::getAllSaved();
        if ($res!=null)
        {
            foreach ($res as $row)
            {
                echo "<abbr title='".$row['name']."'><div style='width:auto;height:80px;line-height:80px;' class='expression' data-latex='".$row['formula']."' >`".$row['formula']."`</div></abbr>";
            }
        }
    }
    else
    {
        $res=Mbexpression::getForType($type);
        foreach ($res as $row)
        {
            echo "<abbr title='".$row['name']."'><div class='expression' data-latex='".$row['formula']."' data-pre='".$row['pre']."' data-suf='".$row['suf']."'>`".$row['desc']."`</div></abbr>";                    
        }
    }
?>