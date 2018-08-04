<?php
// Make sure the user is logged in
if (!isset($_SESSION['username'])) {
	echo
		
		'<p>Please <a href="login.php">log in</a> to access this page.</p>';
		exit();
	}
?>