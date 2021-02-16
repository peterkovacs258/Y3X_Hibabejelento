<?php
require_once("dbconnection.php");
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['email']))
{
    $sql='SELECT * from user WHERE UserEmail="'.$_POST['email'].'"';
    $res=mysqli_query($connect,$sql);
if(mysqli_num_rows($res)>0)
{
    echo true;
}
else{echo "false";}
}

?>