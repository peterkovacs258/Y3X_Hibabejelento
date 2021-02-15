<?php
function validateEmail($email)
{
    if(!$email)
    {return "Email address required!";}
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
     {
         return "Please enter a valid Email address!";
     }
}

function Alert($msg){
echo'<script type="text/javascript">alert("'.$msg.'")</script>';
}
function returnLN($fullname)
{


    $LN="";
    for($i=0;$i<=strlen($fullname);$i++)
    {
        if($fullname[$i]!=' ')
        {$LN.=$fullname[$i];}
        else{
            break;
        }
    }
    return $LN;
}

?>