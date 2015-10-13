<html>
    <head>
        <title><?=(isset($title)? $title : 'Some Page')?></title>
    </head>
    <body>
        <h3></h3>
        <?php if(isset($menu)):?>
        <div class="menu">
            <?php foreach($menu as $item):?>
            <a href="<?=$item->link?>"><?=$item->text?></a>
            <?php endforeach?>
        </div>
        <?php endif?>
        <div class="content"><?=$content?></div>
    </body>
</html>

