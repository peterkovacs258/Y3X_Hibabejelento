<?php
$connect=new mysqli('localhost','root','','y3xsupport','3306');
if($connect -> errno)
{die ("Unable to connect to the database");}
if (!$connect ->set_charset('utf8')){
    echo 'A karakterkódolást nem sikerült beállítani!';
}