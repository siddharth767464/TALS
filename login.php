
<!-- <?php
include('db.php');
session_start();

// Check if user is already logged in
if (isset($_SESSION['username'])) {
  header('Location: home.php');
  exit;
}

      // Check if the login form is submitted
      if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare a SQL statement to retrieve user data
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        // Check if a row is returned
        if ($result->num_rows > 0) {
          // Authentication successful
          $_SESSION['username'] = $username;
          $_SESSION['id'] = $row['id'];
          header('Location: home.php');
          exit;
        } else {
          // Authentication failed
          $error = "Invalid username or password";
        }
      }

      ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .container1 {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 50px;
    }

    h2 {
      text-align: center;
    }

    .s1 {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .s2 {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .s1 {
      background-color: #161616;
      color: white;
      border: none;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
    }

    .s1:hover {
      background-color: #676967;

    }

    .forgot-password {
      text-align: right;
      margin-top: 10px;
    }
  </style>
</head>

<body>

  <div class="container1">
    <h2>Login</h2>
    <form action="login.php" method="post" class="f1">
      <label for="username">Username:</label>
      <input class="s2" type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input class="s2" type="password" id="password" name="password" required>

      <input class="s1" type="submit" value="Login">
      <?php if (isset($error)) : ?>
        <p><?php echo "<label>'.$error;.'</label>"; ?></p>
      <?php endif; ?>
    </form>
    <div class="forgot-password">
      <a href="forgot.html">Forgot Password?</a>
    </div>
    <a class="s1" href="registertion.php">Register Now</a>
  </div>

</body>

</html>