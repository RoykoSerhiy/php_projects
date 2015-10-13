<?php
    $image = imagecreatetruecolor(800, 600);
    $red = imagecolorallocatealpha($image, 255, 0, 0, 0);
    $green = imagecolorallocatealpha($image, 0, 255, 0, 0);
    $blue = imagecolorallocatealpha($image, 0, 0, 255, 0);

    imageline($image,10,20,780,580, $red);

    imagefilledrectangle($image, 100, 100, 200, 200, $red);
    //*****************base64***************
    ob_start();
    imagepng($image);
    $imgData = ob_get_contents();
    ob_end_clean();
    
    $imgBase64 = base64_encode($imgData);
?>
<html>
    <head>
        <style type="">
            div{
                position: relative;
                left: 20%;
            }
            img{
                position: relative;
                
            }
        </style>
    </head>
    <body>
        <div class="image">
            <img src="data:image/png;base64,<?=$imgBase64?>" alt="" width="800" height="600"/>
        </div>
        </body>
</html>



