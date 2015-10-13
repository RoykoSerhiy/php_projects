<?php
include_once 'articleData.php';
$dataModel = new ArticlesData();

$list = $dataModel->all();
?>
<html>
    <head>
        
    </head>
    <body>
        <h3>Articles</h3>
        <?php  foreach($list as $article): ;?>
        <div class="article">
            <div class="title"><?=$article->title?></div>
            <div class="content"><?=$article->content?></div>
        </div>
        <?php        endforeach;?>
    </body>
</html>

