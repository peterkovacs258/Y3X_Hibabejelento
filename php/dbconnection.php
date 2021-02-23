<?php
try {
    $connect=new mysqli('localhost','root','','y3xsupport','3306');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $ex) {
    echo $ex->getTraceAsString();
  }