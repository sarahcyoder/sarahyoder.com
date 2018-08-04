<?php
	session_start();
	require_once('../inc/connectvars.php');

	$dbc = mysqli_connect(HOST, USER, PW, DBNAME);

	function clean_input($data) {
		$data = trim($data);
  		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$noun = clean_input($_POST['noun']);
    $country = clean_input($_POST['country']);
	$food = clean_input($_POST['food']);
		
	if (!empty($noun) && !empty($country) && !empty($food)) {
		
		if ($_SESSION['username']) {
		
			$currentUser = $_SESSION['username'];
			//print "$currentUser";

      		// insert answers into database
			$query = "UPDATE users SET nounAnswer = '$noun', countryAnswer = '$country', foodAnswer = '$food' WHERE username = '$currentUser'";
			print "$query";
				
     		mysqli_query($dbc, $query) or trigger_error(mysql_error()." ".$query);
			echo "success";
			
		} else {
			if (!empty($_POST)) {
				$_SESSION['country'] = clean_input($_POST['country']);
				$_SESSION['food'] = clean_input($_POST['food']);
				$_SESSION['noun'] = clean_input($_POST['noun']);
			}
		}
	}

	mysqli_close($dbc);
?>