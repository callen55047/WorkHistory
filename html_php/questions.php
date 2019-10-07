<?php



	require('Module.php');
	global $conn;
	

	function CreateQuestionsTable()
	{
		global $conn;
		$sql = 'CREATE TABLE Questions (

		QuestionId_id INT AUTO_INCREMENT PRIMARY KEY,

		UserId varchar(20) NOT NULL,

		Question varchar(20) NOT NULL,

		date date )';

		

		mysqli_query($conn, $sql);
		return true;
		

	}


	function AddQuestion($username, $question)
	{
		global $conn;
		$sql = "SELECT * FROM Questions WHERE Question = '$question'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 0)
		{
			$time = date("ymd");
			$sql = "INSERT INTO Questions(`UserId`, `Question`, `date`) 
			VALUES ('$username','$question', '$time')";

			$result2 = mysqli_query($conn, $sql);
			return $result2;

		}
		

		
		return false;
	}

	function GetQuestions($username)
	{
		global $conn;
		$sql = "SELECT * FROM Questions WHERE UserId = '$username'";
		$result = mysqli_query($conn, $sql);

		

		$table = array();
		$table['Questions'] = array();

		$i = 0;
		while ($row = mysqli_fetch_assoc($result))
		{
			$tablerow = array("Question" => $row['Question'], "Date" => $row['date'],"Functions" => $row['QuestionId_id']);
			$table['Questions'][$i++] = $tablerow;
			
		}

		echo json_encode($table);
	}

	function SearchQuestions($username, $search)
	{
		global $conn;
		$sql = "SELECT * FROM Questions WHERE Question LIKE '$search'";
		$result = mysqli_query($conn, $sql);

		

		$table = array();
		$table['Search-Results'] = array();

		$i = 0;
		while ($row = mysqli_fetch_assoc($result))
		{
			$tablerow = array("Question" => $row['Question'], "UserID" => $row['UserId'],"Functions" => $row['QuestionId_id']);
			$table['Search-Results'][$i++] = $tablerow;
			
		}

		echo json_encode($table);
	}


	function DeleteQuestion($q)
	{
		global $conn;
		$sql = "DELETE FROM Questions WHERE QuestionId_id = '$q'";
		$result = mysqli_query($conn, $sql);

		
		return $result;
		

	}

	function DeleteAllQuestions($username)
	{
		global $conn;
		$sql = "DELETE FROM Questions WHERE UserId = '$username'";
		$result = mysqli_query($conn, $sql);

		
		return $result;
		

	}



?>