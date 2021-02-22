<?php
require_once("../php/dbconnection.php");
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"&&!empty($_SESSION['userId']))
{
    $id=$_SESSION['userId'];
    $sql="SELECT * from tickets where UserID=".$id;
    $res=mysqli_query($connect,$sql);
    if(mysqli_num_rows($res)<1)
    {
        echo"false";
    }
    else
    {
        $returnHtml="<div class='container containerTicket'>".
        "<div class='goBackMakeTicket'><a href='#' class='goBack'><i class='fas fa-backward'></i></a></div>";
         while($row=$res->fetch_assoc())
        {
         $returnHtml.="<div class='content'>".
         "<div id='deleteDiv'><a data-id=".$row['TicketID']." href='#' id='deleteIcon'><i class='fas fa-trash-alt'></i></a></div>".
         "<div><span>Ticket id</span><p>".$row['TicketID']."</div>".
         "<div><span>Category of fault</span><p>".$row['TicketCategory']."</p></div>".
         "<div><span>Home address</span><p>".$row['Homeaddress']."</p></div>".
         "<div><span>Product category</span><p>".$row['ProductCategory']."</p></div>".
         "<div><span>Product name</span><p>".$row['ProductName']."</p></div>".
         "<div><span>Customer message</span><p id='tmessage'>".$row['TicketMessage']."</p></div>".
         "<div><span>Date</span><p>".$row['TicketDate']."</p></div>".
         "<div><span>Progress</span><p>".$row['Progress']."</p></div>".

         "</div>";   
        }
        $returnHtml.="</div>";
        echo $returnHtml;
    }
}
session_abort();

?>