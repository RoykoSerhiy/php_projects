<?php
	$dir = __DIR__. "/fonts";
	$files = scandir($dir);
	print_r($files);
	$fonts = [];
	foreach($files as $f){
		if(! is_file($dir . '/' . $f) OR !preg_match('#\.ttf$#iU', $f)){
			continue;
		}
		$fonts[] = $f;			
	}
	print count($fonts);
	
?><html>
	<head>
		<link href='./fonts/riesling.ttf' rel='stylesheet' type='text/css'>
		<style type="text/css">
			<?php foreach($fonts as $i => $font):?>
			@font-face {
				font-family: 'MyFont<?=$i?>';
				src: url('fonts/<?=$font?>') format('truetype');
			}
			<?php endforeach?>
		</style>
	</head>
	<body>
		<div style="font-family: MyWebFont;">test</div>
		<form action="avatar.php" method="post" enctype="multipart/form-data" >
			<div><input type="file" name="imgfile" /></div>
			<?php foreach($fonts as $i => $font):?>
			<div  style="font-family: MyFont<?=$i?>;">
				<input type="radio" name="font" value="<?=$font?>" />
				<span style="font-family:sans-serif">Select Font Style! ((<?=$font?>))</span> SOME FONT EXAMPLE.
			</div>
			<?php endforeach?>
			<div><input type="submit" value="Upload" /></div>
		</form>
	</body>
</html>