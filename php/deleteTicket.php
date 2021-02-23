<?php
require_once('dbconnection.php');
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['id'])&&isset($_SESSION['userId']))
{
    $sql='DELETE FROM tickets WHERE UserID=? AND TicketID=?';
    $uid=$_SESSION['userId'];
    $tid=$_POST['id'];
    $stmt=$connect->prepare($sql);
    $stmt->bind_param("ii",$uid,$tid);
    try{
     if($stmt->execute())
     {
         echo "true";
     }
    }catch(Exception $ex)
    {
        echo $ex->getTraceAsString();
    }
    
}
else{ echo http_response_code(302);}



?>