<?php
session_start();
// Make sure the user is logged in
if (isset($_SESSION['username'])) {
	echo "1";
	}
?>