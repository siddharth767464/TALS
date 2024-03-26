<?php
include('db.php');


session_start();

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    $result = $conn->query("SELECT p.*, c.name AS category_name
                            FROM products p
                            JOIN categories c ON p.category_id = c.id
                            WHERE p.id = $productId");

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        // Handle invalid product ID
        header('Location: display_all_products.php');
        exit();
    }
} else {
    // Handle missing product ID
    header('Location: display_all_products.php');
    exit();
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

        border: 1px solid #ccc;
        padding: 10px;
        margin-top: 10px;
    }
    .simpler{
        display: flex;
        justify-content: center;
        gap: 30px;
        
    }
    .simpler img{
        width: 150px;
    }
</style>

<body>
    <?php
        include("nav.php");
    ?>
    <div class="container1">
        <?php
        // Include database connection
        include 'db.php';

        // Fetch products from the database
        $sql = "SELECT * FROM products WHERE id = $productId"; // Assuming category_id for your category is 1
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                echo '<img src="' . $row['image_path'] . '" alt="' . $row['name'] . '">';
                echo '<div class="product-details">';
                echo '<h2>' . $row['name'] . '</h2>';
                echo '<p>' . $row['description'] . '</p>';
                echo '<p>Price: $' . $row['price'] . '</p>';
                echo "<a class='add-to-cart-btn' href='add_to_cart.php?id=" . $product['id'] . "'>Add to Cart</a>";
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </div>
    <div class="bottom-product">
        <h2 style="text-align: center;">Customer Also Buy</h2>
        <div class="simpler">
            <?php
            // Fetch recently added product from the database
            include 'db.php';
                $cat_id=$product['category_id'];
            $recentlyAddedSql = "SELECT * FROM products WHERE category_id = $cat_id ORDER BY id DESC LIMIT 3"; // Assuming category_id for your category is 1
            $recentlyAddedResult = $conn->query($recentlyAddedSql);

            if ($recentlyAddedResult->num_rows > 0) {
                // Output data of each row
                while ($row = $recentlyAddedResult->fetch_assoc()) {
                    echo '<div class="product-card">';
                    echo '<img src="' . $row['image_path'] . '" alt="' . $row['name'] . '">';
                    echo '<h3>' . $row['name'] . '</h3>';
                    echo '<p>' . $row['description'] . '</p>';
                    echo '<p>Price: $' . $row['price'] . '</p>';
                    echo "<a class='add-to-cart-btn' href='add_to_cart.php?id=" . $product['id'] . "'>Add to Cart</a>";
                    echo '</div>';
                }
            } else {
                echo "No recently added products";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>