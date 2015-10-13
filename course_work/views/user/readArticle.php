<html>
    <head>
        <style>
            div.main{
                width: 1000px;
                height: 1020px;
                background-color: lightcyan;
                margin-left: 180px;
            }
            div.title{
                position: absolute;
                padding-left: 20px;
                width: 940px;
                margin-left: 20px;
                margin-top: 10px;
                height: 90px;
                background-color: lightcoral;
            }
            div.content{
                position: absolute;
                margin-top: 110px;
                padding: 20px;
                margin-left: 20px;
                width: 920px;
                height: 770px;
                background-color: lightgreen;
            }
            div.action{
                position: absolute;
                width: 960px;
                margin-left: 20px;
                margin-top: 930px;
                height: 80px;
                background-color: lightgrey;
            }
        </style>
    </head>
    <body>
        <div class="main">
            <div class="title"><h1><?= $articles->title ?></h1></div>
            <div class="content"><?= $articles->content ?></div>
            <div class="action">
                <a href="http://test4.com:81/course_work/article/update/<?= $articles->id ?>">Redact</a>
                <a href="http://test4.com:81/course_work/article/deleteAction/<?= $articles->id ?>">Delete</a>
            </div>
        </div>
    </body>
</html>