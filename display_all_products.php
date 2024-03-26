
<?php
include('db.php');
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$categoriesResult = $conn->query("SELECT * FROM categories");

if (isset($_GET['category'])) {
    $categoryId = $_GET['category'];
    $result = $conn->query("SELECT * FROM products WHERE category_id = $categoryId");
} else {
    $result = $conn->query("SELECT * FROM products");
}
?>
<style>
    /* Add your CSS styles here */
    /* Styles for the navigation bar */
   
    
    .product-container {
        width: 1478px;
        height: 100%;
        /* background-color: red; */
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 20px;
    }

    .product {
        width: 340px;
        height: 500px;
        margin-bottom: 50px;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px;
        transition: all 0.3s ease;
    }

    /* .product img:hover {
        border-radius: 50%;
    } */

    .product:hover {
        transform: translateY(-5px);
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
    }

    .product-card {
        width: 300px;
        height: 350px;
        margin: 20px;
        /* padding: 20px; */
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .product-card img {
        width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .product-card h2 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .product-card p {
        font-size: 1rem;
        margin-bottom: 5px;
    }

    img {
        width: 340px;
        height: 320px;
        /* background-color: red; */
    }
    .product-title
    {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 20px;
        margin-top: 6px;   
    }
    .product-price
    {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 22px;
        margin-top: 6px;   
    }
    .btn {
        background-color: rgb(0, 0, 90);
        border: none;
        color: wheat;
        padding: 10px 22px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 7px;
        margin-left: 5px;

    }
    .btn1 {
        width: 100px;
        height: 25px;
        background-color: green;
        border: none;
        color: white;
        border-radius: 5%;
        padding: 10px 22px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 20px;
        margin-left: 20px;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        cursor: pointer;
    }
    .btn2 {
        width: 100px;
        height: 25px;
        background-color: rgb(42, 42, 255);
        border: none;
        color: white;
        border-radius: 5%;
        padding: 10px 22px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        margin-left: 15px;

    }

    .categories {
        padding-bottom: 20px;
        text-align: center;
    }

    
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    
</head>

<body>
    <?php
    include("nav2.php");
    ?>

    <div class="categories">
        <a class="btn" href="display_all_products.php">All</a>
        <?php
        while ($category = $categoriesResult->fetch_assoc()) {
            echo '<a class="btn" href="display_all_products.php?category=' . $category['id'] . '">' . $category['name'] . '</a>';
        }
        ?>
    </div>

    <div class="product-container">

        <?php
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product">';
            echo '<img src="' . $row['image_path'] . '" alt="' . $row['name'] . '">';
            echo '<div class="product-info">';
            echo '<div class="product-title">' . $row['name'] . '</div>';
            echo '<div class="product-price">$' . $row['price'] . '</div>';
            echo "<a class='btn1' href='add_to_cart.php?id=" . $row['id'] . "'>Add to Cart</a>";
            echo '<a class="btn2" href="view_product.php?id=' . $row['id'] . '">View Details </a>';
            echo '</div></div>';
        }
        ?>
    </div>


</body>

</html>