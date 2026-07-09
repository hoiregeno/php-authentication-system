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
