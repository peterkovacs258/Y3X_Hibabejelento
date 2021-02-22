<?php
session_start();
require_once("php/dbconnection.php");
require_once("php/functions.php");
if(!isset($_SESSION['email']))
{header('Location:index.php');}
//LOGOUT
if(isset($_GET['logoutclicked']))
{
session_destroy();
header("Location:index.php");
}
$fullname="";
$ticketnumber;

$sql='SELECT * from user WHERE UserEmail="'.$_SESSION['email'].'"';
$res=mysqli_query($connect, $sql);
$row=mysqli_fetch_array($res);
if(!empty($row))
{$fullname=$row['UserName'];
$ticketnumber=$row['UserTickets'];
}


?>


<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a8f8b5d2fb.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&family=Roboto+Condensed:ital@1&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="javascript/menu.js" ></script>
<script src="javascript/send_ticket.js" ></script>
<link href="style/menu.css" rel="stylesheet" type="text/css">

</head>

<body>
  <nav class="nbar-top">
<a href="menu.php"><span>Y3X CustomerSupport</span></a>
  </nav>
  <main class="main">
   <div class="row1">
    <div class="card ">
      <div class="card-body card-1 makeTicket">
        <div class="card-title">
        <a href="#" >
        <i class="fas fa-ticket-alt"></i>  
        <span> Submit a ticket</span></a>
        </div>
      </div>
  </div>
  <div class="card ">
    <div class="card-body card-2 myTickets " id="">
      <div class="card-title">
        <a href="#"> 
          <i class="fas fa-clipboard-list"></i>
        <span> My tickets</span></a>
     </div>
    </div>
  </div>    
</div>
<div class="row2">
    <div class="card">
      <div class="card-body card-3 contact">
        <div class="card-title">
        <a href="#">
        <i class="fas fa-mail-bulk"></i>
          <span> Other contacts</span></a>
  </div>
  </div>
    </div>  
     
     <div class="card myProfile">
      <div class="card-body card-4">
        <div class="card-title">
     <a href="#">
     <i class="logoTicket fas fa-id-card-alt"></i>
          <span> My profile</span></a>
  </div>
  </div>
    </div>
</div>
    </main>



  <nav class="nbar">
    <ul class="nbar-nav">
      <li class="logo">
        <a href="#" class="n-link myProfile">
          <span class="link-text logo-text">
          
<?php echo returnLN($fullname) ?>

</span>

</a>
        
      </li>

      <li class="n-item makeTicket" >
        <a href="#" class="n-link">
        <i class="fas fa-ticket-alt"></i>   
          <span class="link-text">Make a request</span>
        </a>
      </li>

      <li class="n-item myTickets">
        <a href="#" class="n-link">
        <i class="fas fa-clipboard-list"></i>
        <span class="link-text">My tickets</span>
        </a>
      </li>

      <li class="n-item myProfile">
        <a href="#" class="n-link">
        <i class="fas fa-id-card-alt"></i>
<span class="link-text">My profile</span>
        </a>
      </li>

      <li class="n-item contact">
        <a href="#" class="n-link">
        <i class="fas fa-hands-helping"></i>
          <span class="link-text">HelpDesk</span>
        </a>
      </li>

      <li class="n-item" id="themeButton">
        <a href="?logoutclicked" class="n-link">
        <i class="fas fa-sign-out-alt"></i>
          <span class="link-text">Log-out</span>
        </a>
      </li>
    </ul>
  </nav>


</body>
</html>