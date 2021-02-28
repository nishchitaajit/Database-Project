<?php include "templates/header.php"; ?>
<h2>Add new user information</h2>
<?php include "include/config.php";  ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

	First Name : <input type="text" name="firstname"><br/><br/>
    	Last Name : <input type="text" name="lastname"><br/><br/>
    	Email ID : <input type="text" name="email"><br/><br/>
    	Contact Number : <input type="text" name="contactnumber"><br/><br/>
    	<input type="submit"  name="submit" value="submit">
	<input type="submit" name="cancel" value="cancel">
		
    </form>
	
	<?php	 
		if(isset($_POST['submit']))
			{
			$firstName = $_POST['firstname'];
			$lastName = $_POST['lastname'];
			if(empty($_POST['email'])){
				exit('email is empty');
			}
			else 
			{  
				$email = $_POST['email']; 
			}
			$contact = $_POST['contactnumber'];
			$sql = mysqli_query($conn, "SELECT Email_Id from Customer where Email_ID='$email';");
			$rowcount = mysqli_num_rows($sql);
			if($rowcount == 0)
			{
				$query = mysqli_query($conn, "INSERT INTO Customer(First_Name, Last_Name, Email_Id, Contact_Number) VALUES('$firstName', '$lastName', '$email', '$contact');");
				echo "Successfully Registered";
				header('refresh:5 URL=Display.php');
			}
			else
			{
				echo "\n Email_Id already exists";
			}
		}
		else if(isset($_POST['cancel']))
			echo "Clicked cancel";
	?> 

    <br/><br/>
	<div id="center_button"><button onclick="location.href='index.php'">Back to Home</button></div>
    <!--<a href="index.php">Back to home</a>-->
 
    <?php include "templates/footer.php"; ?>

