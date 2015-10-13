<?php
require_once 'common.php';
include_once 'namespace2.php';
use Animals\Mammals\Cats\Kitty as koshara;

$k = new koshara();
$k->Mew();
$jag = new \Cars\Jaguar();
$jag->move();

