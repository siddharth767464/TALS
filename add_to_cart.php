<?php
session_start();
function isUserLoggedIn() {
    // You would typically have a more sophisticated way of checking if a user is logged in,
    // such as checking session variables, database records, etc.
    return isset($_SESSION['username']);
}

// Check if user is logged in
if (!isUserLoggedIn()) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit(); // Ensure that script execution stops after redirection
}



if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Add product to cart
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $_SESSION['cart'][] = $product_id;

    // Redirect back to index.php
    header("Location: display_all_products.php");
    exit();
} else {
    // If product ID is not provided, redirect back to index.php
    header("Location: home1.php");
    exit();
}
?>

