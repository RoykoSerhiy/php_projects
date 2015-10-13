<?php

$image = imagecreatetruecolor(800, 600);
$red = imagecolorallocatealpha($image, 255, 0, 0, 0);
$green = imagecolorallocatealpha($image, 0, 255, 0, 0);
$blue = imagecolorallocatealpha($image, 0, 0, 255, 0);

imageline($image,10,20,780,580, $red);

imagefilledrectangle($image, 100, 100, 200, 200, $red);
for($i = 0;$i< 20;$i++){
    $size = 20;
    $x = mt_rand(10 , 580-$size);
    $y = mt_rand(10, 580-$size);
    imagefilledrectangle($image, $x, $y, $x+$size, $y+$size, $blue);
}
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);

