<?php
	session_start();
	require_once('./inc/connectvars.php');

	$error_msg = "";
	
	if (isset($_POST['submit'])) {
		$dbc = mysqli_connect(HOST, USER, PW, DBNAME);
		// get login data
    	$username = mysqli_real_escape_string($dbc, $_POST['username']);
    	$password = md5(mysqli_real_escape_string($dbc, $_POST['password']));
	
		if(!empty($username) && !empty($password)) {
			
			$query = "SELECT userNumber, username FROM users WHERE username = '$username' AND password = '$password'";
			
			$data = mysqli_query($dbc, $query);
				
			if (mysqli_num_rows($data) == 1) {
				// The log-in is OK so set the session vars and redirect to the welcome page
          		$row = mysqli_fetch_array($data);
          		$_SESSION['username'] = $row['username'];
				//$_SESSION['userNumber'] = $row['userNumber'];

				$welcome_url = 'results.php';
				header('Location: ' . $welcome_url);
		  
				mysqli_close($dbc);
        	}
       			else {
          			// Login info isn't valid
          			$error_msg = 'Whoops, that didn\'t match our records! Please enter a valid username and password to log in.';
        		}
      		}
      		else {
        		// Login info wasn't entered
        		$error_msg = 'You forgot to enter your info! Please enter your username and password to log in.';
      	}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"> 
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="style/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
	<script type="text/javascript" src="script/script.js"></script>
</head>

<body>

	<div class="nav"></div>
	<div id="form">
	<br />
		<h1>Log In</h1>
 		<div id="errorMsg">
			<?php
			echo "$error_msg";
			?>
		</div>

  		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
     	 	Username:<br />
    	 	 <input type="text" name="username" id="username" value="<?php echo $username; ?>" /><br />
    		  Password:<br />
    		  <input type="password" name="password" id="password" /><br /><br />
   			  <input type="submit" value="Log In" name="submit" id="loginSubmit" />
  		</form>

	</div> <!-- end form div-->

</body>
</html>