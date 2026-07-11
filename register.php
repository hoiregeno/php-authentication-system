<?php
  include("db.php");

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username_input = trim($_POST["username"]);
    $password_input = $_POST["password"];

    if(empty($username_input) || empty($password_input)){
      $err_message = "Please enter username or password";
    }
    else{
      $hash_password = password_hash($password_input, PASSWORD_DEFAULT);

      // 1. Write the SQL query
      $query = "INSERT INTO users (username, hashed_password)
                VALUES (?, ?);";

      // 2. Prepare sends the query (with placeholders ?) to MYSQL to compile.
      $stmt = mysqli_prepare($conn, $query);

      // 3. Bind attaches the actual values to the placeholders, in order.
      mysqli_stmt_bind_param($stmt, "ss", $username_input, $hash_password);

      // 4. Execute is the step that actually runs the query against the DB.
      try{
        mysqli_stmt_execute($stmt);
        header("Location: index.php");
        exit;
      }
      catch(mysqli_sql_exception $e){
        // 5. getCode() gives us the MySQL error number 1062, duplicate entry.
        if($e->getCode() == 1062){
          $err_message = "Username already exist. Please enter another username.";
        }
        else{
          $err_message = "Registration failed. Please try again.";
        }
      }

      mysqli_stmt_close($stmt);
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <form action="register.php" method="post">
      <h2>Register</h2>

      <?php if(!empty($err_message)): ?>
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

      <p>Already have an account? <a href="index.php">Login here</a></p>
      <button type="submit">Submit</button>
    </form>
  </body>
</html>
