<?php include "templates/header.php"; ?>
<?php include "include/config.php";  ?>

    <h2>Existing User</h2>

    <form method="post">
    	<label for="email">Customer Email</label>
    	<input type="text" name="email">
    	<input type="submit" name="submit" value="Login">
	<br>
	<br>
	<label for="update">Update Contact Information</label>
	Email ID : <input type="text" name="emailId"><br/><br/>
    	Contact Number : <input type="text" name="contactNumber"><br/><br/>
	<input type="submit" name="update" value="Update"><br/><br/>
    </form>
	
<?php
	if(isset($_POST["submit"]))
	{
		if(empty($_POST['email']))
		{
			exit('Email field is empty , please provide your email_id');
		}
		else
		{
			$email = $_POST['email'];
		}
		$query = mysqli_query($sql, "SELECT Email_Id from Customer where Email_ID='$email';");
		$rowCount = mysqli_num_rows($query);
		if($rowCount == 0)
		{
			echo "No customer with id ".$email." exists.";
		}
		else 
		{
			header('refresh:0 URL=Display.php');
		}
	}
	if(isset($_POST["update"]))
	{
		if (empty($_POST['emailId']))
		{
			exit("\n Nothing to update! User does not exist!");
		}
		else 
		{
			$emailId = $_POST['emailId'];
			$contact = $_POST['contactNumber'];
		}
		$query1 = mysqli_query($sql, "UPDATE Customer SET Contact_Number='$contact' WHERE Email_Id='$emailId';");
		$rowCount1 = $sql->affected_rows;
		if ($rowCount1 == 0)
		{
			echo "No customer with id ".$emailId." exists.";
		}
		else
		{
			echo "Updated successfully!";
		}
	}?>	

    <br>
    <br>
    <a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>