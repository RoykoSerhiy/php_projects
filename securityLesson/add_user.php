<?php

 include '../common.php';
include 'userData.php';

$data = [
    'name' => 'Jhon',
    'login' => 'jonny',
    'pass' => '123',
    'email' => 'jonnyDich@com'
];

$model = new UserData();
$model->create($data);

