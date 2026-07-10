<?php
  session_start();

  // Session guard
  if(!$_SESSION["username_input"] || !isset($_SESSION["username_input"])){
    header("Location: index.php");
    exit;
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="wrapper">
      <h1 class="wrapper__heading">Hello <?php echo htmlspecialchars($_SESSION["username_input"]); ?>!</h1>

      <p>Welcome to your dashboard!</p>

      <a href="logout.php">Logout</a>
    </div>
  </body>
</html>
