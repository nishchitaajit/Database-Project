<?php include "templates/header.php"; ?>
<?php include "include/config.php";  ?>

<h2>Order Details</h2>

<?php
	$totalAmount = "";
	$query = mysqli_query($sql, "SELECT Dress_Name, Price FROM Order;");
	while($row = mysqli_fetch_assoc($query))
	{
		$name = $row['Dress_Name'];
		$price = $row['Price'];
		$string1 = "	->	". $name ."	-	$". $price;
		Print $string1;
		$totalAmount = $totalAmount + $price;
	}
	
	echo "Total amount of the order = ". $totalAmount;
?>

<h3>Thank You</h3>
<?php include "templates/footer.php"; ?>