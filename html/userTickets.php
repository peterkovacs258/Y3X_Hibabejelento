<?php
require_once("dbconnection.php");
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
        $returnHtml="<div class='container'>";
         while($row=$res->fetch_assoc())
        {
         $returnHtml.="<div class=''>".
         "<a href='#' class='goBack'><i class='fas fa-backward'></i></a>".
         "<p>".$row['TicketID']."</p>".
         "<p>".$row['TicketCategory']."</p>".
         "<p>".$row['Homeaddress']."</p>".
         "<p>".$row['ProductCategory']."</p>".
         "<p>".$row['ProductName']."</p>".
         "<p>".$row['Progress']."</p>".
         "<p>".$row['TicketMessage']."</p>".
         "<p>".$row['TicketDate']."</p>".

         "</div>";   
        }
        $returnHtml.="</div>";
        echo $returnHtml;
    }
}
session_abort();

?>