<?php
  // Start session
  session_start();

  // Unset all session variables
  $_SESSION = array();

  // Destroy the session on the server
  session_destroy();

  // Redirect to login page
  header("Location: index.php");
  exit;