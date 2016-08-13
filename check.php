<?php

session_start();

if(!isset($_SESSION["Name"])&&!isset($_SESSION["Email"])&&!isset($_SESSION["Password"])&&!isset($_SESSION["IP_Address"])&&!isset($_SESSION["Logged"])){
$_SESSION["Name"]="";
$_SESSION["Email"]="";
$_SESSION["Password"]="";
$_SESSION["IP_Address"]=$_SERVER['REMOTE_ADDR'];
$_SESSION["Logged"]="";
$_SESSION["Active"]="";

echo "just set";
}
else if(strcmp($_SESSION["Logged"],"true")==0){
echo $_SESSION["Name"];
}
else
echo "false";

$_SESSION["Active"]="true";
?>