<?php
session_start();
require_once("php/dbconnection.php");
require_once("php/functions.php");

if(isset($_SESSION['email']))
{
    session_unset();
}
if(isset($_POST['login']))
{
$sql="SELECT * FROM user WHERE UserEmail='".$_POST['email']."' and UserPW='".$_POST['password']."'";
$res= mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($res);
    if($row>0)
    {//siker
        $_SESSION['email']=$_POST['email'];
        $_SESSION['name']=$row['UserName'];
        $_SESSION['userId']=$row['UserID'];

        header('Location: menu.php');
    }

    else {echo"Falied to login";}
}

if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['regButton']))
{
    //Email already exists?
    //Went with jquery/Ajax request instead
    /*
    $res=mysqli_query($connect,'SELECT * from user WHERE UserEmail="'.$_POST['RegEmail'].'"');
    $row=mysqli_fetch_array($res);
    if(!empty($row))
    {Alert('Ez az email cím már létezik');

    }
    else
    {

    $error=validateEmail($_POST['RegEmail']);
    if(!$error)
    {
        */
        $_SESSION['tempEmail']=$_POST['RegEmail'];
    header("Location: registration.php");
    /*
    }
    else
    {
      Alert($error);
      
    }
    
}
*/
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Y3XSupport</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&family=Roboto+Condensed:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&family=Roboto+Condensed:ital@1&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="javascript/index.js"></script>
<link href="style/index.css" rel="stylesheet" type="text/css">
</head>

<body >
    <nav class="navbar-nav navbar-expand-lg">
    <a href="index.php"><h2>y3x <br> Customer Support</h2></a>
</nav>
    <div class=" container shadow-lg mb-3  bg-white">
    <div class="buttons">
        <input class="btn btns " id="LoginShow" type="button" value="Log-in">
        <input class="btn btns" id="RegShow" type="button" value="Sign-up">
</div>   
     
<div  class="main" id="main"> 
<form id="login-form"  action="" method="post">

    <input class="form-controll w-50" id="logemail" name="email" type="text" placeholder="Email address" ><br>
    <input class="form-controll w-50" name="password" type="password" placeholder="Password"><br>
    <input class="btn submit " type="submit" name="login" value="Sign-in"><br>

        <?php 
        {
            if(!empty($_SESSION['freshAccount']))
            {
            echo"<a class='fresh'><span>You can sign in now!</span></a><br>";
            $_SESSION['freshAccount']=0;
            }
        }
        ?>
            <!--
    <a href="#" ><span>Regisztráció</span></a><br>
    <a href="#" ><span>Segítség</span></a>
-->
</form>
</div>

</div>
</body>

</html>