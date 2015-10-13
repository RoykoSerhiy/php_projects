<?php
function redir($url='http://test4.com:81/blog/form.php')
{
    header('location:' . $url);
}

if(empty($_POST) || !isset($_POST['title']) || !isset($_POST['content'])){
    redir();
}

$userId = 2;
$insertData = [
    'title' => '',
    'content' => $_POST['content'],
    'user_id' => $userId,
];

$artData = new ArticlesData();
$artId = $artData->add($insertData);
