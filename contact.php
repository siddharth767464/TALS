<?php

include("db.php");

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert data into database
$sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo ' <script type="text/javascript">
            // Display a message for 2 seconds
            setTimeout(function() {
                alert("Contact submitted successfully!");
            }, 0); // 0 milliseconds delay
    
            // Redirect to another page after 2 seconds
            setTimeout(function() {
                window.location.href = "home.php";
            }, 500); // 2000 milliseconds = 2 seconds
        </script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>