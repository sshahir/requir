<?php

session_start();

include("connect.php");

$Query=$_POST["Query"];

$sql="SELECT * FROM `products` WHERE Name LIKE '%$Query%' OR Category LIKE '%$Query%' OR Info LIKE '%$Query%' LIMIT 6";
$result=$connection->query($sql);

$count=0;
if(strcmp($Query,"")==0){
echo "Blank";
}
else{
if($result->num_rows>0){
while($row=$result->fetch_assoc()){

echo '<div id="search-items"><a href="search-result.php?Search='.$Query.'">'.$row["Name"].' in Category '.$row["Category"].'</a></div><hr>';


}
}
else{
echo "Nothing";
}
}
?>
