<?php include "templates/header.php"; ?>
<?php include "include/config.php";  ?>
<p>Successful Login</p>
<form action="" method="post">
Choose Clothing category:

<select name="gender">
  <option value="Female">Female</option>
  <option value="Male">Male</option> 
</select>
<input type="submit" name="submit" value="Choose options">
</form>

<p>DressName - Price - Gender - Color - Size</p>	
<?php
	$gender = "";
	if(isset($_POST['submit']))
	{
		if(!empty($_POST['gender']))
		{
		   $gender = $_POST['gender'];
		}
	}
	$query = mysqli_query($sql, "SELECT * FROM Dress where Gender = '$gender';");
	while($row = mysqli_fetch_assoc($query))
	{	
		$name = $row['Dress_Name'];
		$price = $row['Price'];
		$color = $row['Color'];
		$size = $row['Size'];
		$string1 = "	->	". $name ."	-	$". $price ."	-	". $color ."	-	". $size;
		Print $string1;
		echo '<form action="" method="post">
		<input type="checkbox" name="dress" value="yes"> 
		</form>';
		echo "<br>";
	}
		
	echo '<form method="post">
	<input type="submit" name="submit" value="ADD">
	</from>';
?>
	

<?php include "templates/footer.php"; ?>