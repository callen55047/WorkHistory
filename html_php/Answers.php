<?php

require('Module.php');
global $conn;

	function CreateAnswersTable()
	{
		global $conn;

		$sql = "CREATE TABLE Answers (

		AnswerId_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

		QuestionId varchar(20) NOT NULL,

		UserId varchar(20) NOT NULL,

		Answer varchar(20) NOT NULL,

		date date )";

		

		
		
		mysqli_query($conn, $sql);

		return true;
		

	}


	function AddAnswer($questionID, $username, $answer)
	{
		global $conn;
		$sql = "SELECT * FROM Answers WHERE Answer = '$answer' AND QuestionId = '$questionID'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 0)
		{
			$time = date("ymd");
			$sql = "INSERT INTO Answers(`Answer`, `date`, `QuestionId`, `UserId`) 
			VALUES ('$answer','$time', '$questionID', '$username')";

			$result2 = mysqli_query($conn, $sql);
			return $result2;

		}
		

		
		return false;
	}

	function GetAnswers($questionID, $username)
	{
		global $conn;
		$sql = "SELECT * FROM Answers WHERE QuestionId = '$questionID' AND UserId = '$username'";
		$result = mysqli_query($conn, $sql);

		

		$table = array();
		$table['Answers'] = array();

		$i = 0;
		while ($row = mysqli_fetch_assoc($result))
		{
			$tablerow = array("Answer" => $row['Answer'], "Date" => $row['date'], "Functions" => $row['AnswerId_id'], "QuestionId" => $questionID);
			$table['Answers'][$i++] = $tablerow;
			
		}

		echo json_encode($table);
	}

	function GetAllAnswers()
	{
		global $conn;
		$sql = "SELECT * FROM Answers";
		$result = mysqli_query($conn, $sql);

		

		$table = array();
		$table['Answers'] = array();

		$i = 0;
		while ($row = mysqli_fetch_assoc($result))
		{
			$tablerow = array("Answer" => $row['Answer'], "Username" => $row['UserId']);
			$table['Answers'][$i++] = $tablerow;
			
		}

		echo json_encode($table);
	}

	function DeleteAnswer($a)
	{
		global $conn;
		$sql = "DELETE FROM Answers WHERE AnswerId_id = '$a'";
		$result = mysqli_query($conn, $sql);

		
		return $result;
		

	}

	function DeleteAllAnswers($username)
	{
		global $conn;
		$sql = "DELETE FROM Answers WHERE UserId = '$username'";
		$result = mysqli_query($conn, $sql);

		
		return $result;
		

	}


?>