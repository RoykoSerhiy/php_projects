<?php

define('TEXT_DIR' , __DIR__ . '/textFiles');

$file = (isset($_GET['file']) && !empty($_GET['file'])) ? $_GET['file'] : null;

$files = scandir(TEXT_DIR);

foreach ($files as $i => $f){
    if(!is_file(TEXT_DIR . '/'. $f)){
        unset($files[$i]);
    }
}

$files = array_values($files);

if((is_null($file) || !file_exists(TEXT_DIR . '/' . $file)) && count($files) > 0){
    $file = $files[0];
}
$filePath = TEXT_DIR . '/' . $file;
$content = '';
if(!empty($files) && file_exists($filePath) && is_file($filePath)){
    $content = file_get_contents($filePath);
}

?>
<html>
    <head>
        <style type="text/css">
            div#menu{
                width:200px;
                border: 1px solid #aaa;
                display: inline-block;
                min-height: 555px;
            }
            div#header{
                background-color: lightcoral;
            }
            
            div#content{
                width:800px;
                height: 500px;
                border: 1px solid #aaa;
                display: inline-block;
            }
            div#content>div>form>div{
                margin: 4px;
            }
            
            div#menu>a{
                display: block;
                text-decoration: none;
                background-color: lightgreen;
                border-radius: 10px 0 0 10px;
                padding: 0 5px 0 5px;
                margin: 5px 0 0 0;
            }
            div#menu{
                background-color: red;
            }
        </style>
    </head>
    <body>
        <h3><?=$file?></h3>
        <div id="menu">
            <?php  foreach($files as $f):?>
            <a href="textread.php?file=<?=$f?>"><?=$f?></a>
            <?php  endforeach;?>
        </div>
        <div id="content">
            <div>
                <div id="header" name="filename"><?=$file?></div>
                <div id="text" name ="text"><?=$content?></div>
            </div>
        </div>
    </body>
        
</html>



