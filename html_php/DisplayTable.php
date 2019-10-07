<?php

	include('questions.php');

	$username = $_SESSION['username'];
    $sqltable = GetQuestions($username);

	
	echo json_encode($sqltable);

?>