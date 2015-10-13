<?php

if(! isset($_FILES['imgfile']) 
		AND  !file_exists($_FILES['imgfile']['tmp_name'])){
	die("File not uploaded!");
}


function image2base64($image){
	ob_start();
	imagepng($image);
	$imgData = ob_get_contents();
	ob_end_clean();
	return base64_encode($imgData);
}

$fileinfo = $_FILES['imgfile'];
$source = $fileinfo['tmp_name'];

$bytes = file_get_contents($source);
$imageSrc = imagecreatefromstring($bytes);
$srcW = imagesx($imageSrc);
$srcH = imagesy($imageSrc);

// Resize
$image = imagecreatetruecolor(150, 300);
$padding = 2;
$copySize = 146;


imagecopyresampled($image, $imageSrc,
		$padding, $padding, 10, 0,  
		 $copySize, $copySize, $srcW, $srcH);

$imageBG = imagecreatefromjpeg('images/nord.jpg');
imagecopyresampled($image, $imageBG,
		$padding, $padding + 186, 100, 50,  
		 $copySize, round($copySize / (500/375)), 500, 375);


// Text 
if(! isset($_POST['font'])){
	$fontfile = "BrotherTattoo_Demo.ttf";
} else {
	$fontfile = $_POST['font'];
}
$fontfile = 'fonts/' . $fontfile;
print " $fontfile " . (file_exists($fontfile) ? "yes" : "no");
$textTop = 188;
$textLeft = 10;
$text = "My Avatar!";
$red = imagecolorallocatealpha($image, 255, 0, 0, 50);
imagettftext($image, 20, 7, $textLeft, $textTop, $red, $fontfile, $text);

$img64 = image2base64($image);
print "<br><img src='data:image/png;base64,$img64' />";