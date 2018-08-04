<?
	session_start();

/*
  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['username'])) {
    if (isset($_COOKIE['username']) && isset($_COOKIE['username'])) {
      $_SESSION['username'] = $_COOKIE['username'];
    } else {
		$_SESSION['temp'] = 'temp';
	}
  }
 
if (!empty($_POST)) {
		$_SESSION['country'] = $_POST['country'];
		$_SESSION['food'] = $_POST['food'];
		$_SESSION['noun'] = $_POST['noun'];
	
		$country = $_SESSION['country'];
	$noun = $_POST['noun'];
	}

 */
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
	<div id="quiz">
	<div id="errorMsg"></div>

	<div id="quizHeader">
		<h1>What do you know?</h1>
	</div><!-- end quizHeader div -->
			<?php
					// Make sure the user is logged in
					if (isset($_SESSION['username'])) {
						echo '<h1>Welcome, ' . $_SESSION['username'] . '!</h1>';
					}
			?>

				<h2>Take this short quiz and see how you stack up!</h2>
		
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					1. What is the most commonly used noun in the English language?<br />
					<input type="text" id="nounQuestion" name="noun" list="nouns" value="<?php if (!empty($noun)) echo $noun; ?>">
					<p>Hints: <span id="suggestNouns"></span></p>
				
					2. What is the most visited country in the world?<br />
					<input type="text" id="countryQuestion" name="country" list="country" value="<?php if (!empty($country)) echo $country; ?>">
					<p>Hints: <span id="suggestCountries"></span></p>
				
					3. The most commonly shoplifted food item in the US is candy. What is it in Europe?<br />
					<input type="text" id="foodQuestion" name="food" list="food" value="<?php if (!empty($food)) echo $food; ?>">
					<p>Hints: <span id="suggestFoods"></span></p>
				
					<input type="submit" value="Submit" name="submit" id="quizSubmit">
				</form>
			
			
			<div id="quizResults">
				<p>1. You answered <span id="nounInput"></span>. <span id="nounResult"></span></p>
				<p>1. You answered <span id="countryInput"></span>. <span id="countryResult"></span></p>
				<p>1. You answered <span id="foodInput"></span>. <span id="foodResult"></span></p>
			
			<div id="quizRegister">
				<p id="registerText">Register to see how you compare!</p>
				<a href="register.php"><input type="submit" value="Register" name="register" id="register"></a>
			</div>
			<div id="seeResults">
				<a href="results.php"><input type="submit" value="See Results from All Users" name="resultsButton" id="resultsButton"></a>
			</div>	
			</div><!-- end div id quiz results-->
			
		</div> <!-- end quiz div -->
		<br /><br />
</body>
</html>