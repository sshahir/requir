<?php

session_start();

include("connect.php");

$Email=$_POST["email"];
$Password=$_POST["password"];
$Name="";
$sql="SELECT * FROM customers";
$result=$connection->query($sql);
$flag=0;

if($result->num_rows>0){
while($row=$result->fetch_assoc()){
$pw=$row["Password"];$em=$row["Email"];
if(strcmp($Email,$em)==0){
if(strcmp($Password,$pw)==0){
$Name=$row["Name"];
$flag=1;
}
else
$flag=2;
break;
}
}
if($flag==1){
echo"Valid user : ".$Name;

setcookie("test_cookie","test",time()+60,'/');
$Name_cookie="Name";
$Email_cookie="Email";
$Password_cookie="Password";
$IP_cookie="IP_Address";

if(count($_COOKIE)>0){

/*Cookies are set*/
setcookie($Name_cookie,$Name,time()+(86400 * 1),"/");
setcookie($Email_cookie,$Email,time()+(86400 * 1),"/");
setcookie($Password_cookie,$Password,time()+(86400 * 1),"/");
setcookie($IP_cookie,$_SERVER['REMOTE_ADDR'],time()+(86400 * 1),"/");
setcookie("Last_Logged","true",time()+(86400 * 1),"/");


/*Session variables initialized*/
$_SESSION["Name"]=$Name;
$_SESSION["Email"]=$Email;
$_SESSION["Password"]=$Password;
$_SESSION["IP_Address"]=$_SERVER['REMOTE_ADDR'];
$_SESSION["Logged"]="true";
}
else{
echo"Cookie not supported";
}
}
else if($flag==2)
echo"Wrong Password";
else
echo"Registration required";
}
else{
echo"Empty";
}

$connection->close();
?>