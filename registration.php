<?php
session_start();
require_once("php/functions.php");
include("php/dbconnection.php");
if(!empty($_SESSION['email']))
{
Alert("Már regisztráltál a weboldalra!");
header("Location: index.php");
}
if($_SERVER['REQUEST_METHOD']=="POST"&&!empty($_POST['cn'])&&!empty($_POST['pw'])&&!empty($_POST['pwreminder']))
{
    $email=$_SESSION['tempEmail'];
    $fulllName=$_POST['cn'];
    $password=$_POST['pw'];
    $passwordR=$_POST['pwreminder'];
   $sql="INSERT INTO user (UserName,UserEmail,UserPW,PwReminder) VALUES(?,?,?,?)";
   $stmt=$connect->prepare($sql);
   try{

$stmt->bind_param("ssss",$fulllName,$email,$password,$passwordR);
    $stmt->execute();
    $_SESSION['freshAccount']=true;
   alertThanMove("Registration succesfull!","index.php");
  

   }
   catch(Exception $ex)
   {
       $ex->getTraceAsString();
   }
}
?>


<!-- HTML-->
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/reg.css">
    <script src="javascript/reg.js"></script>
</head>

<body>
<nav class="navbar-nav navbar-expand-lg">
    <a href="index.php"><h2>y3x <br> Customer Support</h2></a>
</nav>
<div class="container form-group">
<form action="#" method="post"id="regForm">
    <p>Just one more step!</p>
<input name="cn" id="cn" type="text" class="form-controll" placeholder="Full Name">
<small id="cnSmall" >Please enter your FULL name</small>
<input name="pw" id="pw" type="password" class="form-controll" placeholder="Password">
<small id="pwSmall"></small>
<input name="pwc" id="pwc" type="password" class="form-controll" placeholder="Password again">
<small id="pwcSmall" >Passwords not matching</small>
<input name="pwreminder" type="text" class="form-controll pr" placeholder="Password reminder">
<input type="submit"class="btn " value="Registration" name="RegButton">

</form>
</div>

</body>

</html>