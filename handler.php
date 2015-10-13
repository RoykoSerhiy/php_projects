<?php
function p($x = "...")
{
	print "<div>$x</div>\n";
}
function pa($x)
{
	print( implode(',' , $x));
}
function pr($x){
	print "<pre>\n"; print_r($x); print "</pre>\n";
}
/*if(!isset($_POST['login']) || !isset($_POST['email']))
{
    die("Page forbidden!Evil hacker!!!");
}
 $login = $_POST['login']; */
 if(!isset($_POST['textArea']))
{
    die("Page forbidden!Evil hacker!!!");
}
 $txt = $_POST['textArea']; 
 $words = explode(" ", $txt);
 
 
 foreach ($words as $word => $value) {
     
 }

         
         

      
?>
<!--<html>
    <head>
        <style type="text/css">
            div.class{
                width: 500px;
                height: 250px;
            }
            div.content>div{
                border: 1px solid silver;
                width: 500px;
                height: 40px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="">
            <div><?=$login?></div>
            <div><?=$email?></div>
        </div>
    </body>
</html>-->
<html>
    <head>
        <style type="text/css">
            div.class{
                width: 500px;
                height: 250px;
            }
            div.content>div{
                border: 1px solid silver;
                width: 500px;
                height: 40px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="">
            <div><?=$txt?></div>
        </div>
    </body>
</html>