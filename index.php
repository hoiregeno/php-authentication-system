<?php
  session_start();
  include("db.php");

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Grab username and password
    $username_input = trim($_POST["username"]);
    $password_input = $_POST["password"];

    // Check if one input is not filled
    if(empty($username_input) || empty($password_input)){
      $err_message = "Please enter username or password";
    }
    else{
      // Prepared statements
      $query = "SELECT user_id, hashed_password FROM users
                WHERE username = ?";

      $stmt = mysqli_prepare($conn, $query);
      mysqli_stmt_bind_param($stmt, "s", $username_input);

      if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if($row && password_verify($password_input, $row["hashed_password"])){
          mysqli_stmt_close($stmt);
          $_SESSION["username_input"] = $username_input;
          header("Location: dashboard.php");
          exit;
        }
        else{
          $err_message = "Wrong username or password. Please try again.";
        }

        mysqli_stmt_close($stmt);
      }
      else{
        $err_message = "Something went wrong. Please try again.";
      }
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <form action="index.php" method="post">
      <h2>Login</h2>

      <?php if(isset($err_message)): ?>
        <p class="err-message">
          <?php echo htmlspecialchars($err_message); ?>
        </p>  
      <?php endif; ?>

      <div class="input-box">
        <input
          type="text"
          name="username"
          id="username"
          placeholder=" "
        /><label for="username">Username</label>
      </div>
      <div class="input-box">
        <input
          type="password"
          name="password"
          id="password"
          placeholder=" "
        /><label for="password">Password</label>
      </div>

      <p>Don't have an account? <a href="register.php">Register</a></p>
      <button type="submit">Submit</button>
    </form>
  </body>
</html>
