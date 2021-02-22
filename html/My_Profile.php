<?php
session_start();
require_once("../php/dbconnection.php");

if($_SERVER['REQUEST_METHOD']=="POST"&&!empty($_SESSION['userId']))
{
    
    $uid=$_SESSION['userId'];
    $sql="SELECT * FROM user WHERE UserID =".$uid;
    $res=mysqli_query($connect,$sql);
    if(!$res)
    {http_response_code(500);}
    else
    {
    $row=mysqli_fetch_array($res);

    $date=substr($row['UserRegdate'],0,10);

    

    $html="<div class='container containerProfile'>".
    "<div class='goBackMakeTicket'><a href='#' class='goBack'><i class='fas fa-backward'></i></a></div>".
    "<div class='innerContainer'>".


    "<div ><span class='profileEmail' >Email address </span><div><i class='fas fa-edit'></i>".
    "<input type='text' class='form-controll firstInput ' value='".$row['UserEmail']."' readonly></div></div>".
    "<div><span>Full Name</span>".
    "<input type='text' class='form-controll ' value='".$row['UserName']."' readonly></div>".
    "<div><span>Registration date</span>".
    "<input type='text' class='form-controll ' value='".$date."' readonly></div>".
    "<div><span>Number of active tickets</span>".
    "<input type='text' class='form-controll ' value='".$row['UserTickets']."' readonly></div>".
    "</div></div>";

    echo $html;
    }



}
else
echo"false";

?>