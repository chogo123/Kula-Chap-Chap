<?php

session_start();
include 'connection.php';

if(isset($_GET["action"])){

	if($_GET["action"] == "delete"){

		foreach($_SESSION["shopping_cart"] as $keys => $values){

			if($values["item_id"] == $_GET["id"]){
				unset($_SESSION["shopping_cart"][$keys]);
				//echo '<script>alert("Item removed")</script>';
				echo '<script>window.location="order.php"</script>';
			}
		}
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
 	<link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
	<title>Order Page</title>
</head>
<body>

</div>

<div><h1>Kula Chap Chap</h1>
<nav class="nb">
		<ul class="ul">
			<li><a href="index.php">Home</a></li>
			<li><a href="snacks.php">Snacks</a></li>		
			<li><a href="beverages.php">Beverages</a></li>
			<li><a href="food.php">Food</a></li>
			<li><a href="order.php">View Cart</a></li>
			<li class="right"><a href="logout.php">Log Out</a></li>
			
		</ul>
	</nav>
	</div>

	 <div style="clear: both;"></div>
	 <br>
	 <h2>Order details</h2>
	
	 	<table class="tableclass">
	 		<tr>
	 			<th width="40%">Item Name</th>
	 			<th width="10%">Quantity</th>
	 			<th width="20%">Price</th>
	 			<th width="15%">Total</th>
	 			<th width="5%">Action</th>
	 		</tr>
	 		<?php
	 		if(!empty($_SESSION["shopping_cart"])){

	 			$total = 0;
	 			foreach ($_SESSION["shopping_cart"] as $keys => $values) {
	 				// code...

	 				?>
	 				<tr>
	 					<td><?php echo $values["item_name"]; ?></td>
	 					<td><?php echo $values["item_quantity"]; ?></td>
	 					<td>$ <?php echo $values["item_price"]; ?></td>
	 					<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
	 					<td><button><a href="order.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></button></td>
	 				</tr>
	 				<?php
	 					$total = $total + ($values["item_quantity"] * $values["item_price"]);
	 			}
	 			?>
	 			<tr>
	 				<td colspan="3" align="right">Total</td>
	 				<td align="right">$ <?php echo number_format($total, 2); ?></td>
	 			</tr>
	 			<?php
	 		}
	 		?>
	 	</table>
	 		<button> <a href="cartreset.php">Place Order</a> </button> 



</body>
</html>