<?php
	session_start();
	// require_once('./php/startsession.php');
	require_once('./inc/check-login.php');
	require_once('./inc/connectvars.php');

	$dbc = mysqli_connect(HOST, USER, PW, DBNAME);
	$query = "SELECT * FROM users";
	$data = mysqli_query($dbc, $query);
	
	$nounAnswers = mysqli_num_rows(mysqli_query($dbc, "SELECT nounAnswer FROM users"));
	$countryAnswers = mysqli_num_rows(mysqli_query($dbc, "SELECT countryAnswer FROM users"));
	$foodAnswers = mysqli_num_rows(mysqli_query($dbc, "SELECT foodAnswer FROM users"));

	$correctNoun = mysqli_num_rows(mysqli_query($dbc, "SELECT nounAnswer from users WHERE nounAnswer = 'time'"));
	$correctCountry = mysqli_num_rows(mysqli_query($dbc, "SELECT countryAnswer from users WHERE countryAnswer = 'france'"));
	$correctFood = mysqli_num_rows(mysqli_query($dbc, "SELECT foodAnswer from users WHERE foodAnswer = 'cheese'"));

	function percentage($decimal) {
		$percentage = round((float)$decimal * 100 ) . '%';
		return $percentage;
	}

	$nounQuestion = percentage($correctNoun/$nounAnswers);
	$countryQuestion = percentage($correctCountry/$countryAnswers);
	$foodQuestion = percentage($correctFood/$foodAnswers);


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

	<div id="results">
		<div id="resultsHeader">
			<h1>How do your answers compare<?php
					// Make sure the user is logged in
					if (isset($_SESSION['username'])) {
						echo ', ' . $_SESSION['username'] . '';
					}
			?>?</h1>
		</div>
		<table>
			<tr>
			<th>Username</th>
			<th>Noun</th>
			<th>Country</th>
			<th>Food</th>
			</tr>
<?php
	while($array = mysqli_fetch_array($data)) {
		echo "<tr>";
    	echo "<td>" . $array['username'] . "</td>";
    	echo "<td>" . $array['nounAnswer'] . "</td>";
    	echo "<td>" . $array['countryAnswer'] . "</td>";
		echo "<td>" . $array['foodAnswer'] . "</td>";
	}
	mysqli_close($dbc);
?>
			</tr>
		</table>

		<div id="resultsHeader">
			<h1>What percentage got it right?</h1>
		</div>
		<table>
			<tr>
			<th>Noun Question</th>
			<th>Country Question</th>
			<th>Food Question</th>
			</tr>
			<tr>
				<td><?php echo $nounQuestion ?></td>
				<td><?php echo $countryQuestion ?></td>
				<td><?php echo $foodQuestion ?></td>
			</tr>
		</table>

		<br />
		<h1>Have you figured out the answers, yet?</h1>
	
		<a href="play-game.php"><input type="submit" value="Try Again!"></a>
	</div><!-- end div results -->

</body>
</html>