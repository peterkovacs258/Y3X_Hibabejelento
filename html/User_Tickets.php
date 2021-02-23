<?php
require_once("../php/dbconnection.php");
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"||!empty($_SESSION['userId']))
{
    $id=$_SESSION['userId'];
    $sql="SELECT * from tickets where UserID=".$id;
    $res=mysqli_query($connect,$sql);
    if(mysqli_num_rows($res)<1)
    {
        echo"false";
    }
    else
    {   $returnHtml="<script src='javascript/deleteTicket.js'></script>";
        $returnHtml.="<div class='container containerTicket'>".
        "<div class='goBackMakeTicket'><a href='#' class='goBack'><i class='fas fa-backward'></i></a></div>";
         while($row=$res->fetch_assoc())
        {
         $returnHtml.="<div class='content '>".
         "<div id='deleteDiv'><a data-id=".$row['TicketID']." href='#' id='deleteIcon'><i class='fas fa-trash-alt'></i></a></div>".
         "<div><span class='propertyName'>Ticket id</span><p>".$row['TicketID']."</div>".
         "<div><span class='propertyName'>Category of fault</span><p>".$row['TicketCategory']."</p></div>".
         "<div><span class='propertyName'>Home address</span><p>".$row['Homeaddress']."</p></div>".
         "<div><span class='propertyName'>Product category</span><p>".$row['ProductCategory']."</p></div>".
         "<div><span class='propertyName'>Product name</span><p>".$row['ProductName']."</p></div>".
         "<div><span class='propertyName'>Customer message</span><p id='tmessage'>".$row['TicketMessage']."</p></div>".
         "<div><span class='propertyName'>Date</span><p>".$row['TicketDate']."</p></div>".
         "<div><span class='propertyName'>Progress</span><p>".$row['Progress']."</p></div>".

         "</div>";   
        }
        $returnHtml.="</div>";
        echo $returnHtml;
        echo file_get_contents('footer.html');
    }
}
session_abort();

?>