<?php
session_start();

if (!isset($_SESSION['products'])) {
	$_SESSION['products'] = $products;
}
if(!($_SESSION['cart']))
{
	$_SESSION['cart']=array(); 
}
?>
<?php
include "header.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
	<link href="./CSS/style.css?v=<?php echo time()?>" type="text/css" rel="stylesheet">
</head>
<body>
	<div id="main">
		<div id="products">
			<?php
			$_SESSION["products"] =array (
				array("id"=> 101, 'name'=> "Basket Ball",'image'=>"./images/basketball.png", "price"=> 150),
				array("id"=> 102, 'name'=> "Football", 'image'=> "./images/football.png", "price"=> 120 ),
				array("id"=> 103, 'name'=> "Soccer", 'image'=> "./images/soccer.png", "price"=> 110 ),
				array("id"=> 104, 'name'=> "Table Tennis", 'image'=> "./images/table-tennis.png", "price"=> 130),
				array("id"=> 105, 'name'=> "Tennis", 'image'=> "./images/tennis.png", "price"=> 100)
			);
			

			$i=0;
			foreach($_SESSION["products"] as $key => $value) 
{
	
    echo "<div id='product-101' class='product'>
    <img src='".$_SESSION['products'][$key]['image']."'><h3 class='title'>
        <a href='#'><h3>".$value[name] $value[id]."</a></h3>
        <span>Price: $".$value[price].".00</span>
		<form action='#' method ='POST'>
		<input type='hidden' name='submitvalue' value='".$i."' >
		<input type='submit' class='add-to-cart'   name='submit' value='Add to cart'></form>
		
</div>";
$i++

}


?>
	</div>
	</div>
<?php
include "addcart.php";
?>
<?php
function total()
{
	$total=0;
	foreach($_SESSION['cart'] as $key=>$value)
	{
		$total+=$_SESSION['cart'][$key]['pprice'];
	}
	echo "<div id='totalPrice'>Total Price : $" . $total . "</div>";
}
total();
?>	
<?php
	include_once("footer.php");
	?>
</body>
</html>
