<?php
function p($x)
{
	print "<div>$x</div>\n";
}
/*
function textsize($size, $color)
{
	$fSize = "font-size: {$size}px;";
	$colorStyle = "color: $color";
	return function ($text) use ($fSize , $colorStyle)
	{
		return "<span style='$fSize; $colorStyle'>$text</span>";
	};
}
$redNormal = textsize(20 , 'red');
$greenGiant = textsize(50 , 'green');
$girlText = textsize(25 , '#ff44ee');
p($redNormal("normal text"));
p($greenGiant("Largest text"));
p($girlText("g text"));
*/

$users = [['Vasya','Pupkin','programmer'],
['Petro','Okunev','manager'],
['Mykola','Separatist','driver',]];

function createTable($users)
{
	
	$table = "<table border=1>";
		foreach ($users as $user) {
		  	$len = count($user);
		    $table .= "<tr>";
		  	for ($i=0; $i < $len; $i++) { 
		  		$table .= "<td>$user[$i]</td>";
		  	}
		}
	$table .= "</table>";
	return $table;
}
p(createTable($users));
