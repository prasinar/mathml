<?php
    include_once "../model/Mwrapper.php";
    include_once "../model/Mexpression.php";
    include_once "../model/Mbexpression.php";
?>
            <span class='heading'>Izrazi</span>
            <div id="buttons">
                <?php
                    $all=Mbexpression::getTypes();
                    foreach ($all as $row)
                    {
                        echo "<div class='button-container-title'>".$row['type']."</div>";
                    }
                    if (Wrapper::online())
                    {
                        echo "<div class='button-container-title'>Formirani izrazi</div>";
                    }
                ?>
                <div id="buttons-array">
                <?php
                    $res=Mbexpression::getForType("Operacije");
                    foreach ($res as $row)
                    {
                        echo "<abbr title='".$row['name']."'><div class='expression' data-latex='".$row['formula']."' data-pre='".$row['pre']."' data-suf='".$row['suf']."'>`".$row['desc']."`</div></abbr>";                    
                    }
                ?>
                </div>
            </div>
            <span class='heading'>AsciiMath</span>
            <?php
                  if (Wrapper::online()) echo "<form action='../script/Sredirect.php' method='post'>"
            ?>
            <textarea id="tex" class="area-latex" name="tex"></textarea>
            <?php
                  if (Wrapper::online()) echo "<input type='submit' value='SAČUVAJ IZRAZ' style='float:left;margin-top:5px;' /></form>";
            ?>
            <!--span class='heading' id='label' data-curr='mml'>Presentation MathML</span>
            <pre><code id="area" disabled="true" class='xml'></code></pre>
            <input type="button" class="mode" id="block" value="MathML - LaTeX" /-->
            <div id="full-display">
            </div>
            <input type='button' id='mode' value='Preuzmi izvorni kod' />