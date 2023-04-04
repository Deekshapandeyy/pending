<?php
session_start();
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
				array("id"=> 101, "name"=> "Basket Ball","image"=>"./images/basketball.png", "price"=> 150),
				array("id"=> 102, "name"=> "Football", "image"=> "./images/football.png", "price"=> 120 ),
				array("id"=> 103, "name"=> "Soccer", "image"=> "./images/soccer.png", "price"=> 110 ),
				array("id"=> 104, "name"=> "Table Tennis", "image"=> "./images/table-tennis.png", "price"=> 130),
				array("id"=> 105, "name"=> "Tennis", "image"=> "./images/tennis.png", "price"=> 100)
			);
			

			foreach($_SESSION["products"] as $key => $value) 
{

    echo "<div id='product-101' class='product'>
    <img src='$value[image]'><h3 class='title'>
        <a href='#'><h3>$value[name] $value[id]</a></h3>
        <span>Price: $$value[price].00</span>
		<form action='#' method ='GET'>
		<input type='hidden' name='submitvalue'value='$key' >

		<input type='submit' class='add-to-cart' name='submit' value='Add to cart'></form>
		
</div>";

}


?>
	</div>
	</div>
<?php
include "addcart.php";


//include_once "displaycart.php";


//$_SESSION['cart']=array();
$val=$_GET['submitvalue'];
$name;
$temp =[];
foreach($_SESSION["products"] as $key => $value)
{
	if($key==$val)
	{
		$name=$value["name"];
		//print_r($name);
		array_push($temp,$value);
		print_r($temp);
	}
}
echo "<pre>";
print_r($temp);
echo "</pre>";
array_push($_SESSION['cart'],$temp);
echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";

//print_r($val);

//include_once "displaycart.php";

echo "<table><thead><tr><th>Image</th><th>Name</th><th>Quantity</th><Th>Price</th>
<th>Action</th></tr></thead><tbody>";
		foreach ($_SESSION["cart"] as $key => $value) 
		{
			
				echo "<tr><td><img src='$value[image]'></td>";
				echo "<td> $value[name]</td>";
				echo "<td>$value[quantity]</td>";
				echo "<td>$value[price]</td>";
				echo "<td><button type='submit' id=$i value='Remove' onclick='remove_id(this.id)'>X</button></td></tr>";
			}				

			


// function remove_id(id)

session_unset();
session_destroy();
?>	
</body>
</html>
