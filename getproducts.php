<?php

/*
case "":
break;
*/

include("connect.php");



switch($Product){
case "IndexSliderProduct":$sql="SELECT * FROM `products` WHERE Category='SliderProduct' LIMIT 4";
$result=$connection->query($sql);
$flag=0;

if($result->num_rows>0){
while($row=$result->fetch_assoc()){
if($flag==0){
echo '<div class="item active"><a href="product-page.php?ID='.$row["ID"].'"><img src="'.$row["Path"].'" alt="'.$row["Name"].'"><div class="carousel-caption"><h3>'.$row["Name"].'</h3><p>'.$row["Info"].'</p></div></a></div>';
$flag=1;
}
else
echo '<div class="item"><a href="product-page.php?ID='.$row["ID"].'"><img src="'.$row["Path"].'" alt="'.$row["Name"].'"><div class="carousel-caption"><h3>'.$row["Name"].'</h3><p>'.$row["Info"].'</p></div></a></div>';
}
}
else
echo "Empty";
break;
case "IndexTrending":$sql="SELECT * FROM `products` WHERE NOT Category='SliderProduct' ORDER BY ViewCount DESC LIMIT 6";
$result=$connection->query($sql);

if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo'<div class="col-md-4"><a href="product-page.php?ID='.$row["ID"].'" class="thumbnail"><p class="text-center"><strong>'.$row["Name"].'</strong></p><p class="text-center small">'.$row["Info"].'</p><img class="img-responsive img-rounded" src="'.$row["Path"].'" alt="'.$row["Name"].'"></a></div>';
}
}
else
echo "Empty";
break;
case "copy":$sql="SELECT DISTINCT Category FROM `products` WHERE Page='copy'";
$result=$connection->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo'<div class="well well-sm"><h4>'.ucfirst($row["Category"]).'</h4></div><div class="row img-gallery" id="'.$row["Category"].'-img-gallery">';
include("connect2.php");
$sql2="SELECT * FROM `products` WHERE Category='".$row["Category"]."' ORDER BY BoughtCount DESC LIMIT 3";
$result2=$connection2->query($sql2);
if($result2->num_rows>0){
while($row2=$result2->fetch_assoc()){
echo'<div class="col-md-4"><a href="product-page.php?ID='.$row2["ID"].'" class="thumbnail"><p class="text-center"><strong>'.$row2["Name"].'</strong></p><p class="text-center small">'.$row2["Info"].'</p><img class="img-responsive img-rounded" src="'.$row2["Path"].'" alt="'.$row2["Name"].'"></a></div>';
}
}
else
echo "Empty";
$connection2->close();
echo'</div><button class="btn btn-danger" id="'.$row["Category"].'-img-gallery-button">More</button><div id="'.$row["Category"].'-img-gallery-button-info" class="alert alert-default"></div>';
}
}
else
echo "Empty";
break;
case "writing":$sql="SELECT DISTINCT Category FROM `products` WHERE Page='writing'";
$result=$connection->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo'<div class="well well-sm"><h4>'.ucfirst($row["Category"]).'</h4></div><div class="row img-gallery" id="'.$row["Category"].'-img-gallery">';
include("connect2.php");
$sql2="SELECT * FROM `products` WHERE Category='".$row["Category"]."' ORDER BY BoughtCount DESC LIMIT 3";
$result2=$connection2->query($sql2);
if($result2->num_rows>0){
while($row2=$result2->fetch_assoc()){
echo'<div class="col-md-4"><a href="product-page.php?ID='.$row2["ID"].'" class="thumbnail"><p class="text-center"><strong>'.$row2["Name"].'</strong></p><p class="text-center small">'.$row2["Info"].'</p><img class="img-responsive img-rounded" src="'.$row2["Path"].'" alt="'.$row2["Name"].'"></a></div>';
}
}
else
echo "Empty";
$connection2->close();
echo'</div><button class="btn btn-danger" id="'.$row["Category"].'-img-gallery-button">More</button><div id="'.$row["Category"].'-img-gallery-button-info" class="alert alert-default"></div>';
}
}
else
echo "Empty";
break;
case "utilities":$sql="SELECT DISTINCT Category FROM `products` WHERE Page='utilities'";
$result=$connection->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
echo'<div class="well well-sm"><h4>'.ucfirst($row["Category"]).'</h4></div><div class="row img-gallery" id="'.$row["Category"].'-img-gallery">';
include("connect2.php");
$sql2="SELECT * FROM `products` WHERE Category='".$row["Category"]."' ORDER BY BoughtCount DESC LIMIT 3";
$result2=$connection2->query($sql2);
if($result2->num_rows>0){
while($row2=$result2->fetch_assoc()){
echo'<div class="col-md-4"><a href="product-page.php?ID='.$row2["ID"].'" class="thumbnail"><p class="text-center"><strong>'.$row2["Name"].'</strong></p><p class="text-center small">'.$row2["Info"].'</p><img class="img-responsive img-rounded" src="'.$row2["Path"].'" alt="'.$row2["Name"].'"></a></div>';
}
}
else
echo "Empty";
$connection2->close();
echo'</div><button class="btn btn-danger" id="'.$row["Category"].'-img-gallery-button">More</button><div id="'.$row["Category"].'-img-gallery-button-info" class="alert alert-default"></div>';
}
}
else
echo "Empty";
break;

}

$connection->close();
?>