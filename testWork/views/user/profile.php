 
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
            
            margin-top: 30px;
            background-color: lightcoral;
        }
        textarea.txt{
            width: 520px;
            height: 100px;
            max-height: 100px;
            max-width: 520px;
            
        }
        div.user_info{
            height: 600px;
            width: 300px;
            background-color: lightblue;
            position: absolute;
        }
       
        
    </style>
        
    </head>
    <body>
       
        <div class="user_info">
            <a href="http://<?=HOST?>/testWork/auth/logoutAction">Log Out</a>
            <a href="http://<?=HOST?>/testWork/buisnes/buisnes">Add Buisnes</a>
            <a href="http://<?=HOST?>/testWork/buisnes/deleteAcc">Delete Account</a>
            <form action="<?=BASE_URL?>/buisnes/sBuisnes" method="post">
                <input type="text" name="inputName"/>
                <input type="submit" value="Search"/>
                <a href="http://<?=HOST?>/testWork/buisnes/selectBuisnes">Reset</a>
            </form>
            
            <a href="http://<?=HOST?>/testWork/buisnes/selectBuisnes?orderBy=date_created">Order by Date Created</a><br/>
            <a href="http://<?=HOST?>/testWork/buisnes/selectBuisnes?orderBy=scheduled_date">Order by Scheduled Date</a>
            
            <h1><?= $_SESSION['user']->name ?></h1>
            <h2>Login[<?= $_SESSION['user']->login ?>]</h2>
            
        </div>
<?php foreach($buisneses as $item):?>
        
        <div class="title"><a href="/testWork/buisnes/read/<?= $item->Id ?>"><?= $item->Title ?></a><br/>Created:<?= $item->date_created ?><br/> to: <?= $item->scheduled_date ?>
            <div class='content'>
                <textarea class='txt' readonly="true">
                    <?= $item->Description ?>
               </textarea>
            </div>
            
            
       <?php
            $var = false;
            if($item->isExecute == 1){
            $var = "checked";}
            
            
       ?>
            <form action="<?=BASE_URL?>/buisnes/actionUpdate" method="post">
                <span>isExecuted:</span>
                <input type="checkbox" name="chkExecute" <?=$var?> />
                
                <input type="hidden" value="<?= $item->Id ?>" name="buisnes_id"/>
                <input type="submit" value="save"/>
                <a href="http://<?=HOST?>/testWork/buisnes/deleteAction/<?= $item->Id ?>">Delete</a>
            </form>
            
        </div>
<?php endforeach;?>
    </body>
</html>