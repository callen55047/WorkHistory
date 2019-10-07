<?php
if (empty($_POST['page']))
{
	$display_type = 'no-signin';
	include('Home.php');
	echo 'no page value fowund';
	exit;
}

require('Module.php'); //connect to sql database 
include('questions.php');
include('Answers.php');

session_start();

$page = $_POST['page'];
$command = $_POST['command'];

if ($page == 'StartPage')
{
	switch ($command)
	{
		case 'SignIn':

			$username = '';
			$password = '';

			if (!empty($_POST['username']))
			{
				$username = $_POST['username'];
			}

			if (!empty($_POST['password']))
			{
				$password = $_POST['password'];
			}
			

			//after username and password have been entered correctly 
			if ($password != '' && $username != '')
			{
				//saves session variables
				$_SESSION['signedin'] = 'YES';
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;

				setcookie('username', $username, time() + 60 * 60);  // set cookie just for 1 hour


				//includes our users database table to check info against
				include('Users.php');
				//retuns boolean variable from search of username
				$result = ValidateUser($username, $password);
				if ($result)
				{
					$display_type = "signedin";
					include('mainPage.php');

					echo "<div class='alert alert-success'>
    					<a href='#' class='close' id='notification' data-dismiss='alert' aria-label='close'>&times;</a>
    						<strong>User info found. Signed in!</strong> 
  							</div>
  							<script>
  								window.setTimeout(function() { $('#notification').alert('close'); }, 2000);
  							</script>";
				}
				else
				{
					//restart us to the home page if user not found
					
					$_SESSION['message'] = "user not in system!";
					include('Home.php');

					echo "<div class='alert alert-danger'>
    					<a href='#' class='close' id='notification' data-dismiss='alert' aria-label='close'>&times;</a>
    						<strong>Warning!</strong> User not in system!
  							</div>
  							<script>
  								window.setTimeout(function() { $('#notification').alert('close'); }, 2000);
  							</script>";
				}
			}

			
			
			
			break;

		case 'SignUp':
		
			//new username
			$username = $_POST['NewUserName'];
			

			//new password
			
			$password = $_POST['NewPassword'];
			

			//new email
			
			$email = $_POST['NewEmail'];
			

			
			$name = $_POST['FullName'];
			

			//validates all the information
			if ($password != '' && $username != '' && $email != '')
			{
				include('Users.php');
				
				$x = AddUser($username, $password, $name, $email);
				if ($x)
				{
					setcookie('username', $username, time() + 60 * 60);  // set cookie just for 1 hour

					//saves session variables
					$_SESSION['signedin'] = 'YES';
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;

					include('mainPage.php');

					echo "<div class='alert alert-success'>
    					<a href='#' class='close' id='notification' data-dismiss='alert' aria-label='close'>&times;</a>
    						<strong>User added into Database!</strong> 
  							</div>
  							<script>
  								window.setTimeout(function() { $('#notification').alert('close'); }, 2000);
  							</script>";
				}
				else
				{
					include('Home.php');
					echo "<div class='alert alert-warning'>
    					<a href='#' class='close' id='notification' data-dismiss='alert' aria-label='close'>&times;</a>
    						<strong>Warning!</strong> Users info was partially or fully blank.
  							</div>
  							<script>
  								window.setTimeout(function() { $('#notification').alert('close'); }, 2000);
  							</script>";
				}
			}
			else
			{
				echo "<div class='alert alert-warning'>
    					<a href='#' class='close' id='notification' data-dismiss='alert' aria-label='close'>&times;</a>
    						<strong>Warning!</strong> Users info was partially or fully blank.
  							</div>
  							<script>
  								window.setTimeout(function() { $('#notification').alert('close'); }, 2000);
  							</script>";
			}

			//include('Home.php');
			break;
	}
}
else if ($page == 'MainPage')
{
	if (!isset($_SESSION['signedin']))
	{
		$display_type = "no-signin";
		include('Home.php'); //start page
		exit;
	}

	$username = $_SESSION["username"];
	$password = $_SESSION["password"];

	switch ($command)
	{
		case 'SignOut':
			session_unset();
			session_destroy();


			$display_type = 'no-signin';
			include('Home.php');
			break;

		case 'DisplayQuestions':
			
			GetQuestions($username);

       		break;


		case 'DeleteUser':

			include('Users.php');
			$result = DeleteUser($username, $password);

			if ($result)
			{
				session_unset();
				session_destroy();

				$result = DeleteAllAnswers($username);
				$result2 = DeleteAllQuestions($username);
				
				$display_type = 'no-signin';
				include('Home.php');

				echo "<div class='alert alert-info'>
    					<a href='#' class='close' id='notification' data-dismiss='alert' aria-label='close'>&times;</a>
    						<strong>User deleted from system</strong> 
  							</div>
  							<script>
  								window.setTimeout(function() { $('#notification').alert('close'); }, 2000);
  							</script>";
			}

		
			break;

		/*adding questions to the SQL database*/
		case 'AddQuestion':

			$question = $_POST['inputQuestion'];
			$query = AddQuestion($username, $question);
			GetQuestions($username);

			break;

		case "DeleteQuestion":

			$question = $_POST['questionID'];
			DeleteQuestion($question);
			GetQuestions($username);
			break;

		case "DeleteAnswer":

			$answer = $_POST['answerID'];
			$question = $_POST['questionID'];
			DeleteAnswer($answer);
			GetAnswers($question, $username);
			break;

		case "AddAnswer":

			$answer = $_POST['answer'];
			$QuestionId = $_POST['QuestionID'];
			AddAnswer($QuestionId, $username, $answer);

			break;

		case "displayAnswers":

			$questionID = $_POST['questionID'];
			GetAnswers($questionID, $username);

			break;


		case "displayAllAnswers":

			GetAllAnswers();

			break;

		case "Search":

			$search_terms = $_POST['search-terms'];
			SearchQuestions($username, $search_terms);

			break;


		default:
			
			include('mainPage.php');
			echo "<div class='alert alert-warning'>
    					<a href='#' class='close' id='notification' data-dismiss='alert' aria-label='close'>&times;</a>
    						<strong>Command unkown</strong> 
  							</div>
  							<script>
  								window.setTimeout(function() { $('#notification').alert('close'); }, 2000);
  							</script>
  							";

			break;
	} 
}


?>