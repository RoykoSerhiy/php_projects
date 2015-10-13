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
            <div class="title"><h1><?= $buisneses->scheduled_date ?></h1></div>
            
            <div class="content"><?= $buisneses->Description ?></div>
            <div><input type="hidden" value="<?= $buisneses->Id ?>" name="buisnes_id"/></div>
            <div class="action">
                
                <a href="http://<?=HOST?>/testWork/buisnes/deleteAction/<?= $buisneses->Id ?>">Delete</a>
            </div>
        </div>
    </body>
</html>