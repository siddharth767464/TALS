<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];

    // Perform basic validation (you should enhance this)
    if (empty($username) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        // Perform registration (you should use prepared statements)
        $sql = "INSERT INTO user (username, password,email,mobile) VALUES ('$username', '$password','$email','$mobile')";
        if ($conn->query($sql) === TRUE) {
            echo ' <script type="text/javascript">
            // Display a message for 2 seconds
            setTimeout(function() {
                alert("Registration successful!");
            }, 0); // 0 milliseconds delay
    
            // Redirect to another page after 2 seconds
            setTimeout(function() {
                window.location.href = "login.php";
            }, 2000); // 2000 milliseconds = 2 seconds
        </script>';
           
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            width: 70%;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
        }

         .s2{
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
         }

        .s1[type="submit"] {
            width: 100%;
            background-color: #222222;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

     .s1:hover {
            background-color: #505251;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Registration Form</h2>
    <form action="#" method="post" name="f1"> 
        <label for="fullname">Username:</label><br>
        <input class="s2" type="text" id="fullname" name="username" required><br><br>

        <label for="email">Email:</label><br>
        <input class="s2" type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input class="s2" type="password" id="password" name="password" required><br><br>

        <label for="mobile">Mobile Number</label><br>
        <input class="s2" type="number"  name="mobile" required><br><br>

        <input class="s1" type="submit" value="Register">
        
    </form>
</div>

</body>
</html>
