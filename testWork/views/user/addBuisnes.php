
<html>
    <head>
        <style>
            textarea.desc{
                width: 500px;
                height: 500px;
            }
            input.title{
                width: 500px;
            }
        </style>
    </head>
    <body>
        <h3></h3>
        <form action="<?=BASE_URL?>/buisnes/addBuisnes" method="post">
            <div>Title:</div>
            <div><input type="text" class='title' name="title"/></div>
            <div>Description</div>
            <div><textarea class='desc' name="description" id=""></textarea></div>
            <div>Schedule Date:<br/><input type="date" name="date"/></div>
            <div><input type="submit" name="create"/></div>
        </form>
            
    </body>
</html>

