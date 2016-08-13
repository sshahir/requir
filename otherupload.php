<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Requir-Admin</title>
</head>
<body>
    <div>
    <h1>Other Products</h1>
    <form action="otherupload.php" method="post" enctype="multipart/form-data">
        <input type="text" name="Name" placeholder="Name"><br><br>
        <input type="text" name="Price" placeholder="Price"><br><br>
        <input type="text" name="Category" placeholder="Category"><br><br>
        <input type="text" name="Page" placeholder="Page"><br><br>
        <textarea rows="10" cols="100" name="Info" placeholder="Information"></textarea><br><br>
        <textarea rows="10" cols="100" name="Details" placeholder="Details"></textarea><br><br>
        <input type="file" name="Uploadfile"><br><br>
        <input type="submit" value="Upload" name="Submit">
    </form>
    <br>Three times Success is Successful uploading.<strong> Upload file less than 2 mb size.</strong>
    </div>


</body>
</html>

<?php
    include("connect.php");

    echo"<br><br>";
    $target_directory="trending-images/";
    if(isset($_POST["Submit"]) && !empty($_FILES["Uploadfile"]["name"])){

        if(!empty($_POST["Name"])&&!empty($_POST["Price"])&&!empty($_POST["Info"])&&!empty($_POST["Details"])&&!empty($_POST["Page"])){

        $target_file=$target_directory.basename($_FILES["Uploadfile"]["name"]);
        $check=getimagesize($_FILES["Uploadfile"]["tmp_name"]);
        if($check==false){
            echo"File exceeded size<br>";
        }
        else{
            echo"Success<br>";
        }

            $Name=$_POST["Name"];
            $Price=$_POST["Price"];
            $Info=$_POST["Info"];
            $Details=$_POST["Details"];
            $Category=strtolower($_POST["Category"]);
            $Page=strtolower($_POST["Page"]);

                            $filetype=pathinfo($target_file,PATHINFO_EXTENSION);
                            $myfile=fopen("sliderproduct.txt","r") or die("Cannot open sliderproduct.txt");
                            $content=fread($myfile,filesize("sliderproduct.txt"));
                            $ID=$content;
                            $target_file=$target_directory.$content.$Category."Product.".$filetype;
                            fclose($myfile);
                            $myfile=fopen("sliderproduct.txt","w") or die("Cannot open sliderproduct.txt");
                            fwrite($myfile,$content+1);
                            fclose($myfile);


            $sql="INSERT INTO products(Name,ID,Price,Path,Info,Details,BoughtCount,Category,Page) VALUES ('$Name','$ID','$Price','$target_file','$Info','$Details','','$Category','$Page')";
            if($connection->query($sql) === TRUE){
                if(move_uploaded_file($_FILES["Uploadfile"]["tmp_name"],$target_file)){
                    echo"Success<br>";
                }
                else
                    echo"File upload unsuccessful<br>";
                echo "Success<br>";
            }
            else
                echo "Error : ".$connection->error."<br>";

         }
         else
                echo"Fill in all Fields<br>";

    }
    else
        echo"Fill all the Input Fields and Press Submit<br>";
?>