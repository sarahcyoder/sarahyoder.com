<?php
  session_start();

  // If the session vars aren't set, try to set them with a cookie
 /* if (!isset($_SESSION['userNumber'])) {
    if (isset($_COOKIE['userNumber']) && isset($_COOKIE['username'])) {
      $_SESSION['userNumber'] = $_COOKIE['userNumber'];
      $_SESSION['username'] = $_COOKIE['username'];
    }
  }
  */
?>