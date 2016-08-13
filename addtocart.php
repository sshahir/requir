<?php



include("connect.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
$Status=$_POST["Status"];
session_start();
}

switch($Status){
case "add":$ProductID=$_POST["ProductID"];$Quantity=$_POST["Quantity"];
$sql="SELECT IP_Address,Cart,Cart_Items FROM customers WHERE IP_Address='".$_SESSION["IP_Address"]."' ";
$result=$connection->query($sql);

if($result->num_rows>0){
$row=$result->fetch_assoc();
$Items=explode("-",$row["Cart_Items"],-1);
$key=-1;
for($i=0;$i<$row["Cart"];$i++){
$Items2=explode("*",$Items[$i],-1);
if($ProductID==$Items2[0]){
$key=1;
break;
}
}
if($key==1){
echo "Already added to Cart";
}
else{
$ProductID=$row["Cart_Items"].$ProductID."*".$Quantity."*-";
$Temp=$row["Cart"]+1;
$sql="UPDATE customers SET Cart=$Temp,Cart_Items='$ProductID' WHERE IP_Address='".$_SESSION["IP_Address"]."' ";
if($connection->query($sql) === TRUE)
echo $Temp;
else
echo "Error : ".$connection->error;
}

}
else{
$sql="INSERT INTO customers(Name,Email,Password,Phone_number,Address,Landmark,City,Pin,ID,IP_Address,Date_Time,Cart_Items,Cart) VALUES ('','','','','','','','','','".$_SESSION["IP_Address"]."','','$ProductID*$Quantity*-','1')";
if($connection->query($sql) === TRUE)
echo "1";
else
echo "Error : ".$connection->error;
}
break;
case "check":$sql="SELECT Cart FROM customers WHERE IP_Address='".$_SESSION["IP_Address"]."' ";
$result=$connection->query($sql);

if($result->num_rows>0){
$row=$result->fetch_assoc();
echo $row["Cart"];
}
else{
echo "0";
}
break;
case "cartpage":$sql="SELECT ID,IP_Address,Cart,Cart_Items FROM customers WHERE IP_Address='".$_SESSION["IP_Address"]."'";
$result=$connection->query($sql);
if($result->num_rows>0){
$sql="UPDATE customers SET Purchase_Items='',Purchase=0 WHERE IP_Address='".$_SESSION["IP_Address"]."' ";
if($connection->query($sql) === TRUE)
echo "";
else
echo "Error : ".$connection->error;
$row2=$result->fetch_assoc();
if($row2["Cart"]>0){
$Num=$row2["Cart"];
$Items=explode("-",$row2["Cart_Items"],-1);
while($Num!=0){
$Items2=explode("*",$Items[$Num-1],-1);
$sql="SELECT * FROM products WHERE ID=".$Items2[0];
$result=$connection->query($sql);
if($result->num_rows>0){
$row=$result->fetch_assoc();
echo'<div class="row checkbox"><label class="col-sm-4"><input type="checkbox" value="" data2="'.$Items2[1].'" data="'.$row["ID"].'" info="'.$row["Price"]*$Items2[1].'"><img class="img-responsive img-rounded img-thumbnail" src="'.$row["Path"].'" alt="'.$row["Name"].'"></label><label class="col-sm-4">Rs. '.$row["Price"].' x '.$Items2[1].'</label><label class="col-sm-4"><strong>Name : '.$row["Name"].'</strong><p class="small">Information : '.$row["Info"].'</p><p>Price : '.$row["Price"]*$Items2[1].'</p><a class="btn btn-warning cart-page-remove-item-button" data="'.$row["Price"]*$Items2[1].'" info="'.$row2["ID"].'/'.$row["ID"].'/" info2="'.$row2["Cart_Items"].'/'.$row2["Cart"].'/">Remove</a></label></div><hr>';
}
else
echo"No Such Product";
$Num--;
}
echo'<a href="check-out.php" class="btn btn-info buy-all-button" type="button" id="cart-page-button">Proceed to Check Out</a>';
}
else{
echo"You haven't added anything to your cart yet.";
}
}
break;
case "removeitem":$Product=$_POST["Product"];
$Items=explode("/",$Product,-1);
$IDcustomer=$Items[0];$IDproduct=$ProductID=$Items[1];$Cart_Items=$Items[2];$Cart=$Items[3]-1;
$Items2=explode("-",$Cart_Items,-1);
$key=-1;
for($i=0;$i<=$Cart;$i++){
$Items3=explode("*",$Items2[$i],-1);
if($IDproduct==$Items3[0]){
$key=$i;
break;
}
}
$Temp="";
for($i=0;$i<=$Cart;$i++){
if($i!=$key){
$Temp.=$Items2[$i]."-";
}
}
$sql="UPDATE customers SET Cart_Items='$Temp',Cart=$Cart WHERE ID=".$IDcustomer;
if($connection->query($sql) === TRUE)
echo "success".$Temp."/".$Cart."/";
else
echo "Error : ".$connection->error;



$sql="SELECT Purchase,Purchase_Items FROM customers WHERE IP_Address='".$_SESSION["IP_Address"]."' ";
$result=$connection->query($sql);

if($result->num_rows>0){
$row=$result->fetch_assoc();
if($row["Purchase"]>0){
$Items=explode("-",$row["Purchase_Items"],-1);
$key=array_search($ProductIDt,$Items);
$Temp="";
$Purchase=$row["Purchase"]-1;
for($i=0;$i<=$Purchase;$i++){
if($i!=$key){
$Temp.=$Items[$i]."-";
}
}
$sql="UPDATE customers SET Purchase_Items='$Temp',Purchase=$Purchase WHERE IP_Address='".$_SESSION["IP_Address"]."' ";
if($connection->query($sql) === TRUE)
echo "success";
else
echo "Error : ".$connection->error;
}
}
break;
case "checkout":$sql="SELECT Purchase_Items,Purchase from customers WHERE IP_Address='".$_SESSION["IP_Address"]."'";
$result=$connection->query($sql);
if($result->num_rows>0){
$row=$result->fetch_assoc();
$Num=$row["Purchase"];$Num2=0;
$Cost=0;
$Items=explode("-",$row["Purchase_Items"],-1);

while($Num!=0){
$Items2=explode("*",$Items[$Num-1],-1);
$Num2+=$Items2[1];
$sql="SELECT * FROM products WHERE ID=".$Items2[0];
$result=$connection->query($sql);
if($result->num_rows>0){
$row=$result->fetch_assoc();
$Cost+=$row["Price"]*$Items2[1];
echo'<div class="row check-out-items"><label class="col-sm-4"><img class="img-responsive img-rounded img-thumbnail" src="'.$row["Path"].'" alt="'.$row["Name"].'"></label><label class="col-sm-4">Rs. '.$row["Price"].' x '.$Items2[1].'</label><label class="col-sm-4"><strong>Name : '.$row["Name"].'</strong><p>Price : '.$row["Price"]*$Items2[1].'</p></label></div><hr>';
}
else
echo"No Such Product";
$Num--;
}
$Tax=$Cost*0.217;
$Shipping=$Num2*10;
$TotalCost=$Cost+$Shipping+$Tax;
echo'<div class="row well well-sm" ><strong>Total Cost</strong> : Cost of '.$Num2.' Items : '.$Cost.' + Shipping Cost : '.$Shipping.' + Tax : '.$Tax. ' <strong>= <u id="Totalcost" totalcost="'.$TotalCost.'">Rs. '.$TotalCost.'</u></strong></div>';
}
else{
echo"You haven't added anything to your cart yet.";
}
break;
case "addPurchase":$ProductID=$_POST["ProductID"];$Quantity=$_POST["Quantity"];
$sql="SELECT Purchase,Purchase_Items FROM customers WHERE IP_Address='".$_SESSION["IP_Address"]."' ";
$result=$connection->query($sql);

if($result->num_rows>0){
$row=$result->fetch_assoc();
$Items=explode("-",$row["Purchase_Items"],-1);
$key=-1;
for($i=0;$i<$row["Purchase"];$i++){
$Items2=explode("*",$Items[$i],-1);
if($ProductID==$Items2[0]){
$key=1;
break;
}
}
if($key==1){
echo "Already added to Purchase";
}
else{
$ProductID=$row["Purchase_Items"].$ProductID."*".$Quantity."*-";
$Temp=$row["Purchase"]+1;
$sql="UPDATE customers SET Purchase=$Temp,Purchase_Items='$ProductID' WHERE IP_Address='".$_SESSION["IP_Address"]."' ";
if($connection->query($sql) === TRUE)
echo "success";
else
echo "Error : ".$connection->error;
}

}
break;
case "removePurchase": $ProductID=$_POST["ProductID"];
$sql="SELECT Purchase,Purchase_Items FROM customers WHERE IP_Address='".$_SESSION["IP_Address"]."' ";
$result=$connection->query($sql);

if($result->num_rows>0){
$row=$result->fetch_assoc();
$Items=explode("-",$row["Purchase_Items"],-1);
$key=-1;
for($i=0;$i<=$row["Purchase"];$i++){
$Items2=explode("*",$Items[$i],-1);
if($ProductID==$Items2[0]){
$key=$i;
break;
}
}
$Temp="";
$Purchase=$row["Purchase"]-1;
for($i=0;$i<=$Purchase;$i++){
if($i!=$key){
$Temp.=$Items[$i]."-";
}
}
$sql="UPDATE customers SET Purchase_Items='$Temp',Purchase=$Purchase WHERE IP_Address='".$_SESSION["IP_Address"]."' ";
if($connection->query($sql) === TRUE)
echo "success";
else
echo "Error : ".$connection->error;
}


break;
case "addPurchasefromproductpage":$ProductID=$_POST["ProductID"];$Quantity=$_POST["Quantity"];
$sql="SELECT Purchase,Purchase_Items FROM customers WHERE IP_Address='".$_SESSION["IP_Address"]."' ";
$result=$connection->query($sql);

if($result->num_rows>0){
$row=$result->fetch_assoc();
$Items=explode("-",$row["Purchase_Items"],-1);
$key=-1;
for($i=0;$i<$row["Purchase"];$i++){
$Items2=explode("*",$Items[$i],-1);
if($ProductID==$Items2[0]){
 $key=1;
   break;
}
}
if($key==1){
echo "Already added to Purchase";
}
else{
$ProductID=$row["Purchase_Items"].$ProductID."*".$Quantity."*-";
$Temp=$row["Purchase"]+1;
$sql="UPDATE customers SET Purchase=$Temp,Purchase_Items='$ProductID' WHERE IP_Address='".$_SESSION["IP_Address"]."' ";
if($connection->query($sql) === TRUE)
echo "success";
else
echo "Error : ".$connection->error;
}

}
else{
$ProductID=$ProductID."*".$Quantity."*-";
$sql="INSERT INTO customers(IP_Address,Purchase_Items,Purchase) VALUES ('".$_SESSION["IP_Address"]."','$ProductID','1')";
if($connection->query($sql) === TRUE)
echo "1";
else
echo "Error : ".$connection->error;
}
break;
}



$connection->close();
?>