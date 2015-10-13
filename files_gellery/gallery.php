<?php
require_once '../common.php';
define('IMAGE_DIR', __DIR__ . "/img");

$imageHD = (isset($_GET['img']) && file_exists(IMAGE_DIR . "/" . $_GET['img']))
        ? $_GET['img'] : null;



$files = scandir(IMAGE_DIR);
$imageList = [];
foreach ($files as $f)
{
   if(preg_match('#^\.#', $f)){
       continue;
   } 
   $imageList[] = $f;
}
if(is_null($imageHD)){
    $imageHD = $imageList[0];
}

?>
<html>
    <head></head>
    <body>
        <h3>Image</h3>
        <div class="mini">
            <?php foreach ($imageList as $img):?>
            <a href="gallery.php?img=<?=$img?>">
                <img src="img/<?=$img?>" width="80px" height="60px"/>
            </a>
            <?php   endforeach;;?>
        </div>
        <div class="content">
            <img src="img/<?=$imageHD?>" width="800px" height="600px"/>
        </div>
    </body>
</html>
    


