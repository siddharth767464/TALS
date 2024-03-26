
<?php
// Include your database connection file
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_or_email = $_POST['username_or_email'];
    $new_password = $_POST['new_password'];

    // Check if the username or email exists in the database
    $sql = "SELECT * FROM user WHERE username = '$username_or_email' OR email = '$username_or_email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Update user's password in the database
        $update_sql = "UPDATE user SET password = '$new_password' WHERE id = {$row['id']}";
        $update_result = mysqli_query($conn, $update_sql);

        if ($update_result) {
            echo '<div class="container">
            
        </div>';
            echo ' <script type="text/javascript">
            // Display a message for 2 seconds
            setTimeout(function() {
                alert("Your password has been reset.");
            }, 0); // 0 milliseconds delay
    
            // Redirect to another page after 2 seconds
            setTimeout(function() {
                window.location.href = "login.php";
            }, 2000); // 2000 milliseconds = 2 seconds
        </script>';
           
        } else {
            echo "Failed to update password.";
        }
    } else {
        echo "User not found.";
    }
}
?>
