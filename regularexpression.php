<?php

require_once 'common.php';

$login = '123';

/*number
$expr1 = '#^\w{3,8}$#iU';//3-8
$expr2 = '#^\w*$#iU';//any
$expr3 = '#^\w+$#iU';//1 ->
$expr4 = '#^\w?$#iU';//1 or no*/
/*
$expr5 = '#\w*#';//
$expr6 = '#[abc]*#';//abc aaa cba
$expr7 = '#[^456]*#';//any without 456
$expr8 = '#[a-z]*#';//from 'a' to 'z'
$expr9 = '#[a-zA-z]*#';
$expr10 ='#\#[0-9a-f]{6}#';//ff00ff, a0a0a0*/
/*
$expr11 ='#(<.*>){3,5}#Ui';//<tr><td></td></tr>
$expr12 ='#[a-z0-9]+\.(com|net|org|info|ua|ru)#';//http
*/
//$expr13 ='|([a-z]+)|';//1111 abc 000 999 -> abc




foreach (
        [
           '123','vasys_megadeth',
            'katya1990','drop db',
            '!@#$%^&' 
        ] as $login
        ) {
 $regex = '#^[a-z][a-z0-9\-\_\=]{3,15}$#i';   
if(preg_match($regex,$login)){
    p("Login({$login})is correct");
} else
{
    p("get out {$login}");
}
}
