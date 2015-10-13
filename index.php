<?php

function p($x = "...")
{
	print "<div>$x</div>\n";
}
function pa($x)
{
	print( implode(',' , $x));
}
function sum($x , $y)
{
	return $x + $y;
}
function pow2($x , $y)
{
	$res = 1;
	for ($i=0; $i < $y; $i++) { 
		$res *= $x;
	}
	return $res;
}
function pow3($x , $y)
{
	if($y > 0)
		return $x * pow3($x , $y-1);
	else
		return 1;
}
function pow4($x , $y)
{
	return $y > 0 ? $x * pow4($x, $y - 1) : 1;
}
/*
$res = sum(12 , 13);
p($res);
p(pow2(2 , 10));
p(pow3(2 , 10));
p(pow4(2 , 10));
p();*/
//**********************************
/**
* 
*/
class Aa
{
	public $b;
	
}
function c($x)
{
	$x->b = "ccc";
}
$a = new Aa();
$a->b = "bbb";
c($a);
p($a->b);

$arr1 = [1];
$arr2 = &$arr1;
$arr2[] = 2;
p(implode(',' , $arr1));

function changeArray(&$a)
{
	$len = count($a);
	for ($i=0; $i < $len ; $i++) { 
		$a[] = $a[$i] * 10;
	}
}
$ar1 = [1,2,3,4,5];
changeArray($ar1);
//pa($ar1);

$arr1 = [2,3,5,1,6,10,16,11,101,700,105];
function filter1(&$arr)
{
	$len = count($arr);
	for ($i=0; $i < $len; $i++) { 
		if($arr[$i] < 100 || $arr[$i] > 500)
		{
			unset($arr[$i]);
		}
	}
	return $arr;
}
filter1($arr1);
pa($arr1);

function prettyCounter()
{
	static $counter = 0;
	$counter++;
	return $counter;
}
for ($i=0; $i < 10; $i++) { 
	p(prettyCounter());
}
//****************************

/**
*  
*/
class User
{
	public $name;
	function __construct($name){
		$this->name = $name;
	}
	function __toString()
	{
		return $this->name;
	}
}
$compare = function($a1 , $a2){
	if(strlen($a1->name) != strlen($a2->name))
	{
		return strlen($a1->name) > strlen($a2->name) ? 1 : -1;
	}
	return strcmp($a1->name , $a2->name);
};
$users = [new User("adda"),new User("dg"),
new User("zz"),new User("dddddddf"),
new User("jj"),new User("ydy")];

usort($users, $compare);
pa($users);
//***************************
function decor($tag){
	$funcs = [
	'span' => function($x){return "<span style='color: #aa8888'>$x</span>";},
	'div' => function($x){return "<div style='border: 1px solid gray'>$x</div>";},
	'h1' => function($x){return "<h1>$x</h1>";},
	'bold' => function($x){return "<span style='font-weight:bold'>$x</span>";}
	];
	if(isset($funcs[$tag]))
	{
		return $funcs[$tag];
	}
}
$div = decor('div');
p($div("Hello Div"));

$bold = decor('bold');
p($bold("hello span"));
//***************************
function multyPulty()
{
	$params = func_get_args();
	$html = "<table border=1><tr>";
	$num = func_num_args();
	$html .= "<td>$num</td>";
	foreach ($params as $param) {
		$html .= "<td>$param</td>";
	}
	$html .= "</tbale>";
	return $html;
}

$res = multyPulty('hjmnj','ujmjm','umm','um','rfev','rtv');
p($res);