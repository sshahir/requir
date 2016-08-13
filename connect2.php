<?php
    $servername2="127.0.0.1";
    $username2="root";
    $dbpassword2="";
    $database2="requir";
    $connection2=new mysqli($servername2,$username2,$dbpassword2,$database2);
    if($connection2->connect_error)
        die("Connection failed : ".$connection2->connect_error);
?>