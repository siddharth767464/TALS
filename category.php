<?php
include('db.php');

$categoriesResult = $conn->query("SELECT * FROM categories");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>Categories</h1>
    </header>

    <div class="container">
        <div class="categories">
            <?php
            while ($category = $categoriesResult->fetch_assoc()) {
                echo '<a href="product.php?category=' . $category['id'] . '">' . $category['name'] . '</a>';
            }
            ?>
        </div>
    </div>

</body>
</html>
