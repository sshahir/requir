<?php
session_start();

include("connect.php");

$ID=$_REQUEST["ID"];
$sql="SELECT * FROM `products` WHERE ID=".$ID;
$result=$connection->query($sql);
if($result->num_rows>0){
$row=$result->fetch_assoc();
$Name=$row["Name"];
$Path=$row["Path"];
$Price=$row["Price"];
$Details=$row["Details"];
$ViewCount=$row["ViewCount"]+1;
}
else
echo "Empty";

$sql="UPDATE products SET ViewCount=$ViewCount WHERE ID=".$ID;
if($connection->query($sql) === TRUE)
echo "";
else
echo "Error : ".$connection->error;

$sql="UPDATE customers SET Purchase_Items='',Purchase=0 WHERE IP_Address='".$_SESSION["IP_Address"]."' ";
if($connection->query($sql) === TRUE)
echo "";
else
echo "Error : ".$connection->error;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Requir</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<link href='https://fonts.googleapis.com/css?family=Pacifico|Courgette' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/masterstyle.css">
<link rel="stylesheet" href="css/productpagestyle.css">
<script src="js/masterjs.js"></script>
<script src="js/productpagejs.js"></script>
<script src="js/jquery.cookie.js"></script>
</head>
<body>
<!--navigation bar-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a href="index.php" class="navbar-brand"><span class="titl">Requir</span></a>
</div>

<div class="collapse navbar-collapse" id="myNavbar">
<div class="col-sm-3 col-md-3">
<form class="navbar-form" role="search" action="search-result.php" method="get">
<div class="input-group">
<input type="text" class="form-control" id="search" placeholder="Search" autocomplete="off" name="Search">
<div class="input-group-btn">
<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
</div>
</div>
<div id="search-result" class="bg-warning"></div>
</form>
</div>
<ul class="nav navbar-nav">
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Departments
<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="copy.php">Copy</a></li>
<li><a href="writing.php">Writing</a></li>
<li><a href="fixing.php">Utilities</a></li>
</ul>
</li>
</ul>
<ul class="nav navbar-nav">
<li><a href="cart.php">Cart <span class="badge" id="cart"></span></a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li id="Login"><a href="#myLoginModal" data-toggle="modal" data-target="#myLoginModal"><span class="glyphicon glyphicon-log-in"></span>
Login</a>
</li>
<li id="Register"><a href="#myModal" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span>
Register</a>
</li>
<li class="dropdown" id="Logout-place"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>
<span id="username"></span>
<span class="caret"></span></a>
<ul class="dropdown-menu">
<li id="Logout"><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
</ul>
</li>
</ul>
</div>
</div>
</nav>



<div id="myLoginModal" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Login</h4>
</div>
<div class="modal-body">
<div id="log-form">
<input type="email" class="form-control" placeholder="Email" autofocus name="email">
<input type="password" class="form-control" placeholder="Password" name="password">
<button type="submit" class="form-control btn" id="log-button">Login</button>
</div>
<div id="log-info" class="alert alert-success fade in">

</div>
</div>
</div>
</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Register</h4>
</div>
<div class="modal-body">
<div>
<input type="text" class="form-control" placeholder="Name" autofocus name="name">
<input type="email" class="form-control" placeholder="Email" name="email">
<input type="password" class="form-control" placeholder="Password" name="password">
<input type="password" class="form-control" placeholder="Confirm Password" name="repassword">
<button type="submit" class="form-control btn" id="reg-button">Register</button>
</div>
<div id="reg-info" class="alert alert-success fade in">

</div>
</div>
</div>
</div>
</div>


<!--main body-->
<div class="container-fluid main-body">
<div class="page-header">
<h2>Product</h2>
</div>
<div class="row">
<div class="col-lg-4">
<div class="page-header">
<h4><strong><?php echo $Name; ?></strong></h4>
</div>
<div id="product-img">
<img src="<?php echo $Path; ?>" class="responsive-image img-thumbnail" alt="<?php echo $Name; ?>">
</div>
</div>
<div class="col-lg-8">
<div class="row details">
<div class="page-header">
<h4>Details</h4>
</div>
<div class="panel panel-default">
<?php echo $Details; ?>
</div>
</div>
<div class="row">
<div class="col-xs-4 col-sm-2 form-group" id="quantity"><select class="form-control">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
</select></div>
<div class="col-sm-4">
<button class="btn btn-primary" id="addtocart-button" info="<?php echo $ID; ?>">Add To Cart</button>
<div class="alert alert-default" id="addtocart-button-info"></div>
</div>
<div class="col-sm-4">
<a class="btn btn-info buy-button" role="button" info="<?php echo $Price; ?>">Buy <strong id="cost">Rs. <?php echo $Price ?></strong></a>
</div>
</div>
</div>
</div>


<!--footer-->
<div class="container-fluid text-center footer">
<div class="row atpw">
<div class="col-xs-3"><a href="#about-us" data-toggle="modal" data-target="#about-us">About Us</a></div>
<div class="col-xs-3"><a href="#terms" data-toggle="modal" data-target="#terms">Terms</a></div>
<div class="col-xs-3"><a href="#privacy-policy" data-toggle="modal" data-target="#privacy-policy">Privacy Policy</a></div>
<div class="col-xs-3"><a href="#write-to-us" data-toggle="modal" data-target="#write-to-us">Write To Us</a></div>
</div>
<div class="row atpw2">
<div class="col-xs-6">Requir company &trade;</div>
<div class="col-xs-6 ftg">
<div class="col-xs-1"><a href="#"><img src="ftg-images/f.png"></a></div>
<div class="col-xs-1"><a href="#"><img src="ftg-images/t.png"></a></div>
<div class="col-xs-1"><a href="#"><img src="ftg-images/g.png"></a></div>
</div>
</div>
</div>
<div id="about-us" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">About Us</h4>
</div>
<div class="modal-body">

</div>
</div>
</div>
</div>
<div id="terms" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Terms</h4>
</div>
<div class="modal-body">

</div>
</div>
</div>
</div>
<div id="privacy-policy" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Privacy Policy</h4>
</div>
<div class="modal-body">

</div>
</div>
</div>
</div>
<div id="write-to-us" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Write To Us</h4>
</div>
<div class="modal-body">
<textarea rows="10" placeholder="Write here" class="form-control" id="write-to-us-writing"></textarea>
<div class=""><button class="btn btn-primary form-control" id="write-to-us-send-button">Send</button></div>
<div class="alert alert-warning" id="write-to-us-info"></div>
</div>
</div>
</div>
</div>
</body>
</html>