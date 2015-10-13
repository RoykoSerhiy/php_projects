<?php

function p($x = "...")
{
	print "<div>$x</div>\n";
}
function pa($x)
{
	print( implode(',' , $x));
}
//********************
/*p("array merge");
$a = [1,2,3,4,5];
$b = [6,7,8,9,0];
$c = array_merge($a , $b);
//pa($c);*/
//sorting
/*$nums = [];
for($i = 0;$i< 20;$i++)
{
    $nums[] = mt_rand(10, 99);
}
$nums = array_unique($nums);
pa($nums);
sort($nums);
pa($nums);*/
//fill
/*
$vals = array_fill(0, 16, "Shkura");
pa($vals);*/
//flip
/*
$users = [
    'user'=>'red',    
    '123'=>'green',
    'vp'=>'blue',
    'admin'=>'black',
    'jonny'=>'yellow'
];
pr(array_flip($users));*/
//pa(array_keys($users))
//pa(array_values($users))
/*
if(in_array('green',array_values($users)))
{
    p("we have");
}*/
$user = [
    'fname'=>'Alex',
    'lname'=>'Dow',
    'email'=>'noname123@gmail.com',
    'adress'=>'Undefiend street',
    'phone'=>'1241555',
    'pet_name'=>'Shkura',
    'someVal'=>'val'
];
$keys = ['fname','lname','email'];
$data = array_intersect_key($user, array_flip($keys));
pa($data);
$ddata = array_diff_key($user , array_flip($keys));
pa($ddata);
