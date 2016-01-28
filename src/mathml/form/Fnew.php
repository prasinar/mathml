<?php
    if (isset($_GET['id']))
    {
        include_once '../model/Mexpression.php';
        $res=Mexpression::getExpression($_GET['id']);
        echo "<div class='formula' style='margin-top:20px;margin-bottom:20px;'>`".$res['formula']."`</div>";
        ?>
            <form action="../script/Supdate.php" method="post">
                <input type="hidden" style="display: none" value="<?php echo $res['id']; ?>" name='id' />
                Naziv <input type="text" value="<?php echo $res['name']; ?>" name="name" style="width:92%;"/>
                <br /><br />Opis <br /><br /><textarea name="desc" ><?php echo $res['description']; ?></textarea>
                <br /><br />Content MathML <br /><br /><div id="editor" ></div>
                <textarea name="content" id="contentm" style="display:none;"><?php echo $res['content']; ?></textarea>
                <br /><br /><input type="submit" value="SAČUVAJ IZRAZ" />
            </form>
        <?php
    } else
    {
        echo "<div class='formula'>`".$_SESSION['mathmltex']."`</div>";
        ?>
            <form action="../script/Ssave.php" method="post">
                Naziv <input type="text" placeholder="Naziv matematičkog izraza" name="name" style="width:92%;"/>
                <br /><br />Opis <br /><br /><textarea name="desc" placeholder="Opis matematičkog izraza. Mogu se koristiti i heštegovi za pretragu. Na primer #fizika "></textarea>
                <br /><br />Content MathML <br /><br /><div id="editor" placeholder="Kod napisan u Content MathML (semantičko značenje formule)."></div>
                <textarea name="content" id="contentm" style="display:none;"></textarea>
                <br /><br /><input type="submit" value="SAČUVAJ IZRAZ" />
            </form>
        <?php
    }
?>
            <script src="../plugins/ace/ace.js" type="text/javascript" charset="utf-8"></script>
            <script>
                var editor = ace.edit("editor");
                editor.setTheme("ace/theme/chrome");
                editor.getSession().setMode("ace/mode/xml");
                editor.setFontSize(14);
                editor.setValue($("#contentm").text());
                editor.on("change", function(){
                    $("#contentm").text(editor.getValue());
                });
            </script>