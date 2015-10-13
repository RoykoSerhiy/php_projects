<html>
    <head></head>
    <body>
        <h3></h3>
        <form action="<?=BASE_URL?>/article/actionUpdate" method="post">
            <div><input type="" name="title" placeholder="Title" value="<?= $article->title ?>"/></div>
            <div><textarea name="content" id=""><?= $article->content ?></textarea></div>
            <div><input type="hidden" value="<?= $article->id ?>" name="article_id"/></div>
            <div><input type="submit" name="create"/></div>
        </form>
            
    </body>
</html>

<!--<?=BASE_URL?>/Article/addArticle-->