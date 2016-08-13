<?php

session_start();

if(isset($_SESSION["Logged"])){
$_SESSION["Logged"]="false";
setcookie("Last_Logged","false",time()+(86400 * 1),"/");

echo"success";
}
else
echo"failure";
?>