<?php
session_start();


// Clear cart session
unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Completion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }

        .container1 {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 25px black;
        }

        h1 {
            text-align: center;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }

        .button1 {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button1:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php
    include("nav.php");
    ?>
    <div class="container1">
        <h1>Order Completed!</h1>
        <p>Thank you for your order. Your order has been successfully placed.</p>
        <p>A confirmation email has been sent to your email address.</p>
        <p><a href="display_all_products.php" class="button1">Continue Shopping</a></p>
    </div>
</body>

</html>