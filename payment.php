<?php
include("db.php");
session_start();
$total_amount = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle payment processing
    $order_id = $_SESSION['order_id'];
    //$payment_status = 'completed';
    $payment_method = $_POST['payment_method'];
    $payment_amount = $_SESSION['total_amount'];
    // Determine payment status based on conditions
    if ($payment_method == 'cod') {
        $payment_status = 'Pending';
    } elseif ($payment_amount >= 0) {
        $payment_status = 'completed';
    } else {
        $payment_status = 'Failed';
    }
    // Insert payment into database
    $sql = "INSERT INTO payments (order_id, payment_status, payment_amount,payment_method) VALUES ('$order_id', '$payment_status', '$payment_amount','$payment_method')";
    if ($conn->query($sql) === TRUE) {
        echo "Payment successful!";
        // Clear session cart and order_id
        unset($_SESSION['cart']);
        unset($_SESSION['order_id']);
        header('Location: order_complete.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    .container1 {
        width: 1519px;
        height: 100%;
        display: flex;
        background-color: rgb(253, 238, 211);
        margin-top: 10px;
        display: flex;
        justify-content: center;
    }

    .product {
        display: flex;

        align-items: center;
        width: 48%;
        /* Adjust according to your layout */
        border: 1px solid #ccc;
        margin-bottom: 20px;
        padding: 10px;
    }

    .product img {
        width: 500px;
        /* Adjust according to your layout */
        margin-right: 20px;
    }

    .product-details {
        flex-grow: 1;
    }

    .add-to-cart-btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        margin-top: 10px;
    }

    .add-to-cart-btn:hover {
        background-color: #0056b3;
    }

    .bottom-product {

        margin-top: 20px;
    }

    .product-card {
        width: 450px;
        height: 500px;
        border: 1px solid #ccc;
        padding: 10px;
        margin-top: 20px;
        float: left;
        margin-left: 22px;
        background-color: white;
        border-radius: 7px;
        margin-top: 50px;

    }

    .simpler {

        justify-content: center;
        gap: 30px;

    }

    .simpler img {
        width: 100%;
        height: 80%;
    }

    .btn1{
        width: 210px;
        height: 40px;
        background-color: rgb(42, 42, 255);
        border: none;
        color: white;
        padding: 10px 22px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        margin-bottom: 50px;
        margin-top: 20px;
        border-radius: 7px;
        /* margin-left: 100px;         */

    }
    .btn2{
        width: 210px;
        height: 40px;
        background-color: green;
        border: none;
        color: white;
        padding: 10px 22px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        margin-bottom: 50px;
        margin-top: 20px;
        border-radius: 7px;
        /* margin-left: 20px;         */

    }
    .amount
    {
        font-size: 30px;
          
    }
</style>

<body>
    <?php
    include("nav.php");
    ?>
    <div class="container1">

        <div class="bottom-product">
            <h1 style="text-align: center;">Shopping Cart</h1>
            <div class="simpler">
                <?php
                // Fetch recently added product from the database
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $product_id) {

                        $result = $conn->query("SELECT * FROM products  WHERE id = $product_id");

                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="product-card">';
                            echo '<img src="' . $row['image_path'] . '" alt="' . $row['name'] . '">';
                            echo '<h3>' . $row['name'] . '</h3>';
                            echo '<p>' . $row['description'] . '</p>';
                            echo '<p>Price: $' . $row['price'] . '</p>';
                            $total_amount += $row["price"];

                            echo '</div>';
                        }
                    }
                } else {
                    echo "<p>Your cart is empty</p>";
                }

                $conn->close();
                ?>
            </div>
            <div class="main1">
                <p class="amount"><b>Total Amount: $&nbsp;</b><?php
                                    $_SESSION['total_amount'] = $total_amount;
                                    echo $total_amount; ?></p>
                <form action="payment.php" method="post">
                    <select class="btn1" id="payment_method" name="payment_method" required>
                        <option value="cod">Cash on Delivery</option>
                        <option value="online">Online Payment</option>
                    </select>
                    <input class="btn2" type="submit" value="Complete Order">
                </form>
            </div>

        </div>
</body>

</html>