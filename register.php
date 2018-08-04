<?php
	session_start();
	require_once "./inc/connectvars.php";

	if (isset($_POST['submit'])) {
		$dbc = mysqli_connect(HOST, USER, PW, DBNAME);
		
		$email = mysqli_real_escape_string($dbc, $_POST['email']);
    	$username = mysqli_real_escape_string($dbc, $_POST['username']);
		$password = mysqli_real_escape_string($dbc, $_POST['password']);	
		
		$noun = $_SESSION['noun'];
		$country = $_SESSION['country'];
		$food = $_SESSION['food'];
		
    	// Make sure username not already taken	
      	$query = "SELECT username FROM users WHERE username = '$username'";
     	$data = mysqli_query($dbc, $query)  or trigger_error(mysql_error()." ".$query);
	  
		if(!empty($username) && !empty($password) && !empty($email)) {
		
      		if (mysqli_num_rows($data) == 0) { // The username is unique so add to database
				$query = "INSERT INTO users (username, password, email, nounAnswer, countryAnswer, foodAnswer) VALUES ('$username', MD5('$password'), '$email', '$noun', '$country', '$food')";
				mysqli_query($dbc, $query);

				//send to login page
				$login_url = 'login.php';
				header('Location: ' . $login_url);
				mysqli_close($dbc);
				
			} else {
				// The username chosen already exists
				$error_msg = '<p>That username already exists! Please try a different one.</p>';
        		$username = "";
			}
		} else {
			$error_msg = '<p>Please fill in all fields!</p>';

		}
	}
?>
<!DOCTYPE html>
<html>
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
	<h1>Register</h1>
 	<div id="errorMsg">
		<?php
		echo "$error_msg";
		?>
	</div>
  		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

     		 Email:<br />
     		 <input type="email" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>" /><br />
     		 Username:<br />
     		 <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><div id="usernameMsg"></div><br />
		     Password:<br />
  		     <input type="password" id="password" name="password" /><br /><br />
    		 <input type="submit" value="Sign Up" name="submit" id="signupSubmit" />
  		</form>
	</div> <!-- end form div -->
</body> 
</html>
