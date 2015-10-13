<html>
    <head>
        <style>
        div.title{
            width:600px;
            height: 200px;
            border-radius: 50px;
            background-color: lightgreen;
            margin-left: 400px;
            margin-bottom: 20px;
            padding-left: 40px;
            padding-top: 10px;
        }
        div.content{
            width: 520px;
            height: 100px;
            position: absolute;
           // margin-left: 40px;
            margin-top: 50px;
            background-color: lightcoral;
        }
        div.user_info{
            height: 600px;
            width: 300px;
            background-color: lightblue;
            position: absolute;
        }
        div.avatar{
            height: 150px;
            width: 150px;
            
        }
        img#ava{
            height: 150px;
            width: 150px;
        }
    </style>
    </head>
    <body>
        <div class="user_info">
            <a href="http://test4.com:81/course_work/auth/logoutAction">Log Out</a>
            <a href="http://test4.com:81/course_work/article/article">Add Article</a>
            <div class="avatar"><img id="ava" src="<?=AVATAR_PATH?>/default.jpg" /></div>
            <h1><?= $_SESSION['user']->name ?></h1>
            <h2>Login[<?= $_SESSION['user']->login ?>]</h2>
            <h2>Age[<?= $_SESSION['user']->age ?>]</h2>
            <h2>Email[<?= $_SESSION['user']->email ?>]</h2>
        </div>
        <?php foreach($articles as $item):?>
        <div class='title'> <a href="/course_work/article/read/<?= $item->id ?>"><?= $item->title ?></a>
            <div class='content'><?= $item->content ?></div>
        </div>
        <?php endforeach;?>
    </body>
</html>