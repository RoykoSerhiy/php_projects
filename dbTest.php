<?php
require_once 'common.php';

include 'connect.php';

///*********** deleting
if(isset($_GET['del_id']))
{
    $delId = intval($_GET['del_id']);
    $sqlDelete ="DELETE FROM `users` WHERE `id` = $delId";
    $db->query($sqlDelete);
        
}



//****selecting
$sql = "SELECT * FROM `users` LIMIT 0, 10";

$res = $db->query($sql);

if($res){
    p("Selected rows: " . $res->num_rows);
    
    $rows = $res->fetch_all(MYSQLI_ASSOC);
    
    //pr($rows);
    
    $html = "<table border=1>\n".
            "<tr><td>Name</td>"
           . "<td>Login</td>"
           . "<td>Password</td>"
            . "<td>Age</td>"
           . "<td>Email</td>"
           . "<td>Gender</td>"
            . "<td>Operations</td></tr>";
           
   foreach ($rows as $i => $row){
       $html .= "<tr><td>{$row['name']}</td>"
           . "<td>{$row['login']}</td>"
           . "<td>{$row['pass']}</td>"
           . "<td>{$row['age']}</td>"
           . "<td>{$row['email']}</td>"
           . "<td>{$row['gender']}</td>"
           . "<td><a href = '?del_id={$row['id']}'>DELETE</a></td></tr>\n";
           }
   $html .= "</table>";
    p($html);
    $res->close();
}
$db->close();

include 'insertForm.php';