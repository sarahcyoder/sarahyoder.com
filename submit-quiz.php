<?php
	session_start();
	require_once('./inc/connectvars.php');

	$dbc = mysqli_connect(HOST, USER, PW, DBNAME);
	
	$noun = $_POST['noun'];
    $country = $_POST['country'];
	$food = $_POST['food'];
		
	if (!empty($noun) && !empty($country) && !empty($food)) {
		
		if ($_SESSION['username']) {
		
			$currentUser = $_SESSION['username'];
			//print "$currentUser";

      		// insert answers into database
			$query = "UPDATE users SET nounAnswer = '$noun', countryAnswer = '$country', foodAnswer = '$food' WHERE username = '$currentUser'";
			print "$query";
				
     		mysqli_query($dbc, $query) or trigger_error(mysql_error()." ".$query);
			echo "success";
		}
	}

	mysqli_close($dbc);
?>