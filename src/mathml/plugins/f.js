function mathmlf(){
            $ascii = $("#tex");
            $label = $("#label")
            $area = $("#area");
            $mode = $(".mode");
        
            jQuery.fn.extend({
                insertAtCaret: function(myValue){
                  return this.each(function(i) {
                    if (document.selection) {
                      //For browsers like Internet Explorer
                      this.focus();
                      var sel = document.selection.createRange();
                      sel.text = myValue;
                      this.focus();
                    }
                    else if (this.selectionStart || this.selectionStart == '0') {
                      //For browsers like Firefox and Webkit based
                      var startPos = this.selectionStart;
                      var endPos = this.selectionEnd;
                      var scrollTop = this.scrollTop;
                      this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
                      this.focus();
                      this.selectionStart = startPos + myValue.length;
                      this.selectionEnd = startPos + myValue.length;
                      this.scrollTop = scrollTop;
                    } else {
                      this.value += myValue;
                      this.focus();
                    }
                  });
                }
            });
            
            function selectedText()
            {
                var textComponent = document.getElementById('tex');
                var selectedText="";
                // IE version
                if (document.selection != undefined)
                {
                    textComponent.focus();
                    var sel = document.selection.createRange();
                    selectedText = sel.text;
                }
                // Mozilla version
                else if (textComponent.selectionStart != undefined)
                {
                    var startPos = textComponent.selectionStart;
                    var endPos = textComponent.selectionEnd;
                    selectedText = textComponent.value.substring(startPos, endPos)
                }
                return selectedText;
            }
            
            $(".expression").click(function() {
                //console.log("ALO BRE!!!");
                $selTex = selectedText();
                if ($selTex!="") $ascii.insertAtCaret($(this).attr("data-pre")+$selTex+$(this).attr("data-suf"));
                else $ascii.insertAtCaret($(this).attr("data-latex"));
                
                updateMathML();
            });
			
            $("#tex").keyup(function () {
                updateMathML();
            });
            
            function toMathML(jax,callback) {
                var mml;
                try {
                  mml = jax.root.toMathML("");
                } catch(err) {
                  if (!err.restart) {throw err} // an actual error
                  return MathJax.Callback.After([toMathML,jax,callback],err.restart);
                }
                MathJax.Callback(callback)(mml);
            }
            
            function getMathML()
            {
                 MathJax.Hub.Queue(
                    function () {
                      var jax = MathJax.Hub.getAllJax();
                      //for (var i = 0; i < jax.length; i++) {
                        toMathML(jax[jax.length-1],function (mml) {
                          $area.text(mml);
                        });
                      //}
                    }
                );
            }
            
            function getLaTeX()
            {
                 $area.text(AMTparseAMtoTeX($ascii.val()));
            }
            
            function updateMathML() {
                $("#full-display").html("`"+$ascii.val()+"`");
                MathJax.Hub.Typeset("full-display");
                /*if ($label.attr("data-curr")=="mathml") getLaTeX();
                else getMathML();
				$('pre code').each(function(i, block) {
                      hljs.highlightBlock(block);
                });*/
            }
            
            /*$mode.click(function() {
               if ($label.attr("data-curr")=="mathml") {
                    $label.attr("data-curr","latex");
                    $label.text("MathML");
                    $area.attr("class","xml");
               }
               else {
                    $label.attr("data-curr","mathml");
                    $label.text("LaTeX");
                    $area.attr("class","tex");
               }
               updateMathML();
            });*/

            updateMathML();
            
            $l=AMTparseAMtoTeX($('.formula').text());
            $("#latex").text($l.substr(1,$l.length-2));
            MathJax.Hub.Queue(
                    function () {
                      var jax = MathJax.Hub.getAllJax();
                      //for (var i = 0; i < jax.length; i++) {
                        toMathML(jax[jax.length-1],function (mml) {
                          $("#mathml").text(mml);
                          $('pre code').each(function(i, block) {
                                    hljs.highlightBlock(block);
                          });
                        });
                      //}
                    }
                );
            
            $('.button-container-title').click(function(){
                        var type = $(this).text();
                        $this=$(this);
                            
                            //console.log(type);
                        
                        $.ajax({
                            url: '../script/Sbuttons.php', //This is the page where you will handle your SQL insert
                            type: 'POST',
                            data: 'type=' + type, //The data your sending to some-page.php
                            success: function(data){
                                $("#buttons-array").html(data);
                                MathJax.Hub.Typeset();
                                            
                                $(".expression").click(function() {
                                    $selTex = selectedText();
                                    if ($selTex!="") $ascii.insertAtCaret($(this).attr("data-pre")+$selTex+$(this).attr("data-suf"));
                                    else $ascii.insertAtCaret($(this).attr("data-latex"));
                                    
                                    updateMathML();
                                });
                            },
                            error:function(){
                                console.log('AJAX request was a failure');
                            }   
                        });
            });
}

function add() {
    $('.user').click(function(){
	var id_of_item_to_approve = $(this).attr('id');
	var type = $(this).attr('value');
	$this=$(this);
        
        //console.log(type);
	
	$.ajax({
	    url: '../script/Sadd.php', //This is the page where you will handle your SQL insert
            type: 'POST',
            data: 'id=' + id_of_item_to_approve + '&type=' + type, //The data your sending to some-page.php
            success: function(data){
		//console.log(data);
		if ($this.attr('value')=="DODAJ U FORMIRANE IZRAZE") {
		    $this.attr('value','BRIŠI IZ FORMIRANIH IZRAZA');
                    //$this.attr('style','background-color:#32475e');
		} else if ($this.attr('value')=="BRIŠI IZ FORMIRANIH IZRAZA") {
		    $this.attr('value','DODAJ U FORMIRANE IZRAZE');
		    //$this.attr('style','background-color:transparent');
		}
	    },
	    error:function(){
	       console.log('AJAX request was a failure');
	    }   
	});
    });
}

function pin() {
    $('#save').click(function(){
	var id_of_item_to_approve = $(this).attr('data-fid');
	var type = $(this).attr('value');
	$this=$(this);
        
        //console.log(type);
	
	$.ajax({
	    url: '../script/Spin.php', //This is the page where you will handle your SQL insert
            type: 'POST',
            data: 'id=' + id_of_item_to_approve + '&type=' + type, //The data your sending to some-page.php
            success: function(data){
		//console.log(data);
		if ($this.attr('value')=="DODAJ U KOLEKCIJU") {
		    $this.attr('value','BRIŠI IZ KOLEKCIJE');
                    //$this.attr('style','background-color:#32475e');
		} else if ($this.attr('value')=="BRIŠI IZ KOLEKCIJE") {
		    $this.attr('value','DODAJ U KOLEKCIJU');
		    //$this.attr('style','background-color:transparent');
		}
	    },
	    error:function(){
	       console.log('AJAX request was a failure');
	    }   
	});
    });
}

function search()
{
     $('#search').keyup(function(){
            var word = $(this).val();
            $this=$(this);
                //console.log(word);
            
            $.ajax({
                url: '../script/Ssearch.php', //This is the page where you will handle your SQL insert
                    type: 'POST',
                    data: 'word=' + word, //The data your sending to some-page.php
                    success: function(data){
                //console.log(data);
                        $('#search-result').html(data);
                        MathJax.Hub.Typeset("center");
                },
                error:function(){
                   console.log('AJAX request was a failure');
                }   
            });
    });       
}

function compute()
{
            $('#compute').click(function(){
                  var niz={};
                  $('.ci').each(function(){
                        $temp = $(this).attr('name');
                        niz[$temp] = $(this).val();
                  });
                  
                  var id=$(this).attr('data-id');
                  
                  /*for(var key in niz)
                  {
                        console.log(key+" "+niz[key]);
                  }*/
                  
                  var jNiz = JSON.stringify(niz);
                  
                  console.log(jNiz);
            
                  $.ajax({
                        url: '../script/Scompute.php', //This is the page where you will handle your SQL insert
                        type: 'POST',
                        data: 'niz=' + jNiz + '&id=' + id, //The data your sending to some-page.php
                        success: function(data){
                                    //console.log(data);
                                    $('#result').text(data);
                                    //MathJax.Hub.Typeset("center");
                        },
                        error:function(){
                                    console.log('AJAX request was a failure');
                        }   
                  });      
            });
}

function exportm()
{
            function toMathML(jax,callback) {
                var mml;
                try {
                  mml = jax.root.toMathML("");
                } catch(err) {
                  if (!err.restart) {throw err} // an actual error
                  return MathJax.Callback.After([toMathML,jax,callback],err.restart);
                }
                MathJax.Callback(callback)(mml);
            }
            
            function download(filename, content) {
                        var pom = document.createElement('a');
                        pom.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(content));
                        pom.setAttribute('download', filename);
                        pom.click();
                    }
            $('#export').click(function(){
                        $pom=$("#mathml").text();
                        $str = "<!-- ide u head blok -->\r\n"+
                               "<script src='http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=MML_HTMLorMML'></script>\n"+
                               "<!-- --------------- -->\n"+
                               "<!-- ide u deo gde zeli formula da se doda\n"+
                               "     ukoliko formula treba da bude u okviru teksta\n"+
                               '     dodati u math tagu atribut display="inline" inace je display="block" -->\n'+
                               $pom;
                        download('mathml.html',$str);
            })
            $('#mode').click(function(){
                        $pom="";
                        MathJax.Hub.Queue(
                            function () {
                              var jax = MathJax.Hub.getAllJax();
                              //for (var i = 0; i < jax.length; i++) {
                                toMathML(jax[jax.length-1],function (mml) {
                                  $pom=mml;
                                  console.log($pom);
                                });
                              //}
                            }
                        );
                        $str = "<!-- ide u head blok -->\r\n"+
                               "<script src='http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=MML_HTMLorMML'></script>\n"+
                               "<!-- --------------- -->\n"+
                               "<!-- ide u deo gde zeli formula da se doda\n"+
                               "     ukoliko formula treba da bude u okviru teksta\n"+
                               '     dodati u math tagu atribut display="inline" inace je display="block" -->\n'+
                               $pom;
                        download('mathml.html',$str);
            })
}