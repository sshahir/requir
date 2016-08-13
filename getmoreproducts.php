<?php

/*
case "":
break;
*/

include("connect.php");

$Product=$_POST["Product"];
$ItemCount=$_POST["ItemCount"];

$sql="SELECT * FROM `products` WHERE Category='".$Product."'";
$result=$connection->query($sql);
if($ItemCount>$result->num_rows)
echo"No More Products";
else{
switch($Product){
case "copy":$sql="SELECT * FROM `products` WHERE Category='copy' LIMIT $ItemCount";
$result=$connection->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo'<div class="col-md-4"><a href="product-page.php?ID='.$row["ID"].'" class="thumbnail"><p>'.$row["Name"].'</p><img class="img-responsive img-rounded" src="'.$row["Path"].'" alt="'.$row["Name"].'"></a></div>';
}
}
else
echo "Empty";
break;
case "diary":$sql="SELECT * FROM `products` WHERE Category='diary' LIMIT $ItemCount";
$result=$connection->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo'<div class="col-md-4"><a href="product-page.php?ID='.$row["ID"].'" class="thumbnail"><p>'.$row["Name"].'</p><img class="img-responsive img-rounded" src="'.$row["Path"].'" alt="'.$row["Name"].'"></a></div>';
}
}
else
echo "Empty";
break;
case "adhesive":$sql="SELECT * FROM `products` WHERE Category='adhesive' LIMIT $ItemCount";
$result=$connection->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo'<div class="col-md-4"><a href="product-page.php?ID='.$row["ID"].'" class="thumbnail"><p>'.$row["Name"].'</p><img class="img-responsive img-rounded" src="'.$row["Path"].'" alt="'.$row["Name"].'"></a></div>';
}
}
else
echo "Empty";
break;
case "whitner":$sql="SELECT * FROM `products` WHERE Category='whitner' LIMIT $ItemCount";
$result=$connection->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo'<div class="col-md-4"><a href="product-page.php?ID='.$row["ID"].'" class="thumbnail"><p>'.$row["Name"].'</p><img class="img-responsive img-rounded" src="'.$row["Path"].'" alt="'.$row["Name"].'"></a></div>';
}
}
else
echo "Empty";
break;
case "pen":$sql="SELECT * FROM `products` WHERE Category='pen' LIMIT $ItemCount";
$result=$connection->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo'<div class="col-md-4"><a href="product-page.php?ID='.$row["ID"].'" class="thumbnail"><p>'.$row["Name"].'</p><img class="img-responsive img-rounded" src="'.$row["Path"].'" alt="'.$row["Name"].'"></a></div>';
}
}
else
echo "Empty";
break;
case "pencil":$sql="SELECT * FROM `products` WHERE Category='pencil' LIMIT $ItemCount";
$result=$connection->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo'<div class="col-md-4"><a href="product-page.php?ID='.$row["ID"].'" class="thumbnail"><p>'.$row["Name"].'</p><img class="img-responsive img-rounded" src="'.$row["Path"].'" alt="'.$row["Name"].'"></a></div>';
}
}
else
echo "Empty";
break;
case "scale":$sql="SELECT * FROM `products` WHERE Category='scale' LIMIT $ItemCount";
$result=$connection->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo'<div class="col-md-4"><a href="product-page.php?ID='.$row["ID"].'" class="thumbnail"><p>'.$row["Name"].'</p><img class="img-responsive img-rounded" src="'.$row["Path"].'" alt="'.$row["Name"].'"></a></div>';
}
}
else
echo "Empty";
break;
}
}

$connection->close();
?>