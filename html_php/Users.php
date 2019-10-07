<?php



	require('Module.php');

	global $conn;

	

	function CreateUsersTable()

	{
		global $conn;
		$sql = 'CREATE TABLE Users (

		user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

		Username varchar(20) NOT NULL,

		Password varchar(20) NOT NULL,

		Fullname varchar(20),

		email varchar(20),

		date date )';

		

		mysqli_query($conn, $sql);

		return true;
		

	}



	function AddUser($username, $password, $fullname, $email)

	{
		global $conn;
		$sql = "SELECT * FROM Users WHERE Username = '$username'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 0)
		{
			$sql = "INSERT INTO Users(`Username`, `Password`, `Fullname`, `email`, `date`) 
			VALUES ('$username','$password','$fullname', '$email','november')";

			$result2 = mysqli_query($conn, $sql);
			return $result2;

		}
		

		
		return false;
	}

function ValidateUser($username, $password)
{
	global $conn;
	$sql = "SELECT * FROM Users WHERE Username = '$username' AND Password = '$password'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}



	function DeleteUser($username, $password)
	{
		global $conn;
		$sql = "DELETE FROM Users WHERE Username = '$username'";
		$result = mysqli_query($conn, $sql);

		//mysqli_num_rows($result) > 0
		return $result;
		

	}



?>