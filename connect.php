<?php
    $servername="127.0.0.1";
    $username="root";
    $dbpassword="";
    $database="requir";
    $connection=new mysqli($servername,$username,$dbpassword,$database);
    if($connection->connect_error)
        die("Connection failed : ".$connection->connect_error);
?>