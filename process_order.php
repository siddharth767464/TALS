<?php session_start();
include_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];
    $total_amount = $_SESSION['total_amount']; // Assuming you calculate total amount elsewhere
    $sql = "INSERT INTO orders (customer_name, customer_email, customer_address, total_amount) VALUES ('$customer_name', '$customer_email', '$customer_address', '$total_amount')";
    if ($conn->query($sql) === TRUE) {
        $order_id = $conn->insert_id;
        $_SESSION['order_id'] = $order_id;
        header("Location: payment.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Processing</title>
    <style>
        .container1 {
            width: 1519px;
            height: 600px;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            margin-top: 20px;
            /* height: 100vh; */
            background-color: #F1F9F9;
            /* background-color: #f0f0f0; */
        }

        .f1 {
            width: 500px;
            height: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: calc(100% - 10px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            font-size: 18px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            border-radius: 4px;
        }

        .btn input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn input[type="submit"]:hover {
            background-color: #45a049;
        }
        .btn {
            width: 490px;
            height: 45px;
        background-color: orange;
        border: none;
        color: white;
        border-radius: 5px;
        padding: 10px 22px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    h1{
    text-align: center;
    font-size: 40px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

    }
    </style>
</head>

<body>
    <?php
    include("nav.php");
    ?>
     <h1>Order Processing</h1>
    <div class="container1">
        
        <form action="process_order.php" method="post" class="f1">
            <label for="name">Name:</label>
            <input type="text"  name="customer_name" placeholder="Name" required>

            <label for="email">Email:</label>
            <input type="email"  name="customer_email" placeholder="Email" required>

            <label for="address">Address:</label>
            <textarea  name="customer_address" rows="4" placeholder="Address" required></textarea>

            <input class="btn" type="submit" value="Place Order">
        </form>
    </div>
</body>

</html>