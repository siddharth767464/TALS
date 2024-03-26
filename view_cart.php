<?php
session_start();
$total_amount = 0;
include('db.php');

// $categoriesResult = $conn->query("SELECT * FROM categories");

// if (isset($_GET['category'])) {
//     $categoryId = $_GET['category'];
//     $result = $conn->query("SELECT * FROM products WHERE category_id = $categoryId");
// } else {
//     $result = $conn->query("SELECT * FROM products");
// }

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'add_to_cart') {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        // Retrieve product details from database
        $query = "SELECT * FROM products WHERE id = $product_id";
        $result = $conn->query($query);
        $product = $result->fetch_assoc();
        $product['quantity'] = $quantity;
        // Add product to cart
        $_SESSION['cart'][] = $product;
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
        /* height: 1200px; */
        background-color: #F1F9F9;
        display: flex;
        margin-top: 10px;
        /* justify-content: center; */
    }

    .product {
        /* width: 1000px; */
        height: 300px;
        background-color: green;
        /* display: flex;
        align-items: center;
        width: 48%;
        /* Adjust according to your layout */
        border: 1px solid #ccc;
        margin-bottom: 20px;
        padding: 10px; */
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
        background-color: black;
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

        width: 330px;
        height: 450px;
        background-color: white;
        float: left;
        border-radius: 2%;
        border: 1px solid #ccc;
        padding: 10px;
        margin-top: 50px;
        margin-left: 22px;
    }
    .simpler{
        
        justify-content: center;
        gap: 300px;
        
    }
    .simpler img{
        width: 100%;
    }
    p
    {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 22px;
        margin-top: 6px;   
    }
    
    .btn{
        width: 200px;
        height: 25px;
        background-color: green;
        border: none;
        color: white;
        border-radius: 5%;
        padding: 10px 22px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin-top: 20px;
        margin-left: 20px;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        cursor: pointer;
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
            <p>Total amount: $<?php
                                $_SESSION['total_amount'] = $total_amount;
                                echo $total_amount; ?></p>
            <a class="btn" href="process_order.php">Proceed to Order</a>
        </div>
</body>

</html>