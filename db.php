<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "krusty_krabs";
  $err_message = "";

  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  try{
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
  }
  catch(mysqli_sql_exception $e){
    die("Database connection failed" . $e->getMessage());
  }