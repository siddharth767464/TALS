<?php
include('db.php');
// Fetch last 6 products from the database
$sql = "SELECT * FROM products ORDER BY id DESC LIMIT 6"; // Select the last 6 entries
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Display</title>
    <style>
        .container1 {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card1 {
            width: 30%;
            margin: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .card1 img {
            width: 300px;
            height: auto;
            justify-content: center;
        }

        .card1 h2 {
            margin-top: 10px;
        }

        .card1 p {
            margin-top: 5px;
        }
        .btn {
        background-color: #2c3e50;
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
    }
    </style>
</head>

<body>
    <div class="container1">
        <?php if ($result->num_rows > 0) : ?>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="card1">
                    <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['name']; ?>">
                    <h2><?php echo $row['name']; ?></h2>
                    <p><?php echo $row['description']; ?></p>
                    <p>Price: $<?php echo $row['price']; ?></p>
                    <a class="btn" href="view_product.php?id='<?php echo $row['id']?>'">View Details </a>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No products found.</p>
        <?php endif; ?>
    </div>
</body>

</html>