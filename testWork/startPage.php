
<html>
    <head>
        <style>
          div#login
          {
              text-align: center;
              width:100px;
              float: right;
              font-family: Stencil;
          }
          div#login:hover
          {
              background-color: lime;
          }
          div#reg
          {
              font-family: Stencil;
              text-align: center;
              width:200px;
              float: right;
          }
          div#reg:hover
          {
              background-color: lime;
          }
          div#head{
              
              height: 67px;
              background-color: lightslategray;
          }
          div#footer{
              float: bottom;
              height: 67px;
              background-color: lightslategray;
          }
          div#someContent{
              height: 600px;
          }
        </style>
    </head>
    <body>
        <div id='head'><div style="position:absolute; font-family: Stencil;"><h1>TO DO LIST</h1></div>
            <a href="http://<?=$_SERVER['HTTP_HOST']?>/testWork/auth/login"><div id='login'><h2>LOGIN</h2></div></a>
            <a href="http://<?=$_SERVER['HTTP_HOST']?>/testWork/auth/register"><div id='reg'><h2>REGISTRATION</h2></div></a>
        </div>
        <div id='someContent'></div>
        <div id='footer'></div>
    </body>
</html>