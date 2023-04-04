<?php


echo "<table><thead><tr><th>Image</th><th>Name</th><th>Quantity</th><Th>Price</th><th>Action</th></tr></thead><tbody>"
;
		foreach ($_SESSION['cart'] as $key => $value) {
			echo "<tr><td><img src='$value[image]'></td>";
			echo "<td>$value[name]</td>";
			echo "<td>$value[quantity]</td>";
			echo "<td>$value[price]</td>";
			echo "<td><button type='submit' value='Remove'>X</button></td></tr>";

			}



?>
<?php
include "footer.php";
?>