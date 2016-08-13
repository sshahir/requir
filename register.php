<?php

session_start();

include("connect.php");
$Name=$_POST["name"];
$Email=$_POST["email"];
$Password=$_POST["password"];
$date_time=date(DATE_RFC822);

//Checking
$sql="SELECT * FROM customers";
$result=$connection->query($sql);
$flag=0;

    while($row=$result->fetch_assoc()){
        $em=$row["Email"];
        if(strcmp($Email,$em)==0){
            $flag=1;
            break;
        }
    }

//Inserting data
if($flag==0){

    setcookie("test_cookie","test",time()+60,'/');
        $Name_cookie="Name";
        $Email_cookie="Email";
        $Password_cookie="Password";
        $IP_cookie="IP_Address";

        if(count($_COOKIE)>0){
            if(!isset($_COOKIE[$Name_cookie])&&!isset($_COOKIE[$Email_cookie])&&!isset($_COOKIE[$Password_cookie])&&!isset($_COOKIE[$IP_cookie])){

                /*Cookies are set*/
                setcookie($Name_cookie,$Name,time()+(86400 * 1),"/");
                setcookie($Email_cookie,$Email,time()+(86400 * 1),"/");
                setcookie($Password_cookie,$Password,time()+(86400 * 1),"/");
                setcookie($IP_cookie,$_SERVER['REMOTE_ADDR'],time()+(86400 * 1),"/");
                setcookie("Last_Logged","true",time()+(86400 * 1),"/");

            }

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

    $IP_Address=$_SESSION["IP_Address"];

    $sql="SELECT IP_Address FROM `customers` WHERE IP_Address='".$_SESSION["IP_Address"]."' ";
    $result=$connection->query($sql);
    if($result->num_rows>0){
            $sql="UPDATE customers SET Name='$Name',Email='$Email',Password='$Password',Date_Time='$date_time' WHERE IP_Address='".$_SESSION["IP_Address"]."' ";
            if($connection->query($sql) === TRUE)
                echo "Success : ".$Name;
            else
                echo "Error : ".$connection->error;
    }
    else{
    $sql="INSERT INTO customers(Name,Email,Password,Phone_number,Address,Landmark,City,Pin,ID,IP_Address,Date_Time,Cart_Items,Cart) VALUES ('$Name','$Email','$Password','','','','','','','$IP_Address','$date_time','','')";
    if($connection->query($sql) === TRUE)
        echo "Success : ".$Name;
    else
        echo "Error : ".$connection->error;
    }
}
else{
    echo"User with a same Email id exists. Please Login.";
}
$connection->close();
?>