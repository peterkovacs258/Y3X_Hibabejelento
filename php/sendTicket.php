<?php
session_start();
require_once('dbconnection.php');


if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['ticketHaddress']))
{
    echo "asdasd";

}
else echo"false";

?>