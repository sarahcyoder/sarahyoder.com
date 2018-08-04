<!DOCTYPE html>
<html>
	<body>
<?
	require_once('../inc/connectvars.php');
	$dbc = mysqli_connect(HOST, USER, PW, DBNAME);
		
	$username = $_REQUEST["q"];
		
	$usernameMsg = "";

    // Make sure username not already taken	
     $query = "SELECT username FROM users WHERE username = '$username'";
     $data = mysqli_query($dbc, $query)  or trigger_error(mysql_error()." ".$query);
		
      if (mysqli_num_rows($data) !== 0) { // The username already exists
			$usernameMsg = '<p>That username already exists! Please try a different one.</p>';
        	$username = "";
			} 

	// Output
	echo $usernameMsg;

?> 

	</body>
</html>