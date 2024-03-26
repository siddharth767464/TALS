
<?php
include('db.php');


// Check if user is logged in
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $categoriesResult = $conn->query("SELECT * FROM categories");

} else {
  $username = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture</title>
    <!-- <link rel="stylesheet" href="portfolio.css"> -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
</head>
<style>
    *
{
    margin: 0;
    padding: 0;
}
#main
{
    width: 100%;
    height: 200px;
}
#header
{
    width: 100%;
    height: 110px;
    /* background-color: red; */
}
#lheader
{
    width: 40%;
    height: 100%;
    /* background-color: purple; */
    float: left;
}
#mheader
{
    width: 43%;
    height: 100%;
    /* background-color: green; */
    float: left;
}
#rheader
{
    width: 17%;
    height: 100%;
    /* background-color: red; */
    float: right;
}
#lheader img
{
    width: 20%;
    height: 100%;
    float: left;
    padding-top: 10px;
    padding-left: 20px;
}
#lheader p
{
    font-size: 50px;
    margin-top: 30px;
    margin-left: 170px;
    font-family: Georgia, 'Times New Roman', Times, serif;
    color: rgb(0, 0, 90);
}
#lheader h1
{
    font-size: 20px;
    margin-left: 165px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    color: rgb(0, 0, 90);
}
#textbox
{
    width: 550px;
    height: 35px;
    border-radius: 5px 5px;
    padding-left: 15px;
    border-color: grey;
    border-width: 1px;
    margin-top: 10px;
}
#searchbar
{
    margin-top: 35px;
    margin-left: 10px;
}
#btn1
{
    width: 80px;
    height: 35px;
    color: wheat;
    background-color: rgb(0, 0, 90);
    border-radius: 5px 5px;
    border-color: transparent; 
    margin-left: 5px;  
}
#btn2
{
    margin-top: 32px;
    background-color: transparent;
    border-color: transparent;
    margin-left: 5px;
    position: relative;
        /* padding-right: 30px; */
}
#btn2 badge
{
    position: absolute;
        top: -5;
        right: 0;
        background-color: red;
        color: white;
        padding: 5px;
        border-radius: 50%;
}
#shop_wish
{
    font-size: 25px;
    color: black;
    margin-left: 10px;
    text-decoration: none;
}
#shop_wish b
{
    font-size: 16px;
    font-weight: normal;
}
#menu
{
    width: 100%;
    height: 60px;
    display: flex;
    justify-content: center;
    margin-top: 10px;
}
#menu ul li a
{
    text-decoration: none;
    color: black;
    /* background-color: rgb(0, 0, 90); */
    font-size: 20px;
}
#menu ul li
{
    list-style: none;
    float: left;
    padding: 25px 30px;
    
}
#menu ul li a:hover
{
    color: red;
}

#hrline
{
    width: 1440px;
    margin: auto;
    /* margin-top: 20px; */
}
</style>
<body>
    <div id="main">
         <div id="header">
            <div id="lheader">
                <img src="logo1.png" alt="">
                <p><b>THE ART</b></p>
                <h1>O F&nbsp;&nbsp; L I V I N G&nbsp;&nbsp; S P A C E S</h1>
            </div>
            <div id="mheader">
                <div id="searchbar">
                    <input type="search" placeholder="Search" id="textbox">
                    <button id="btn1">Search</button>   
                </div>
            </div>

            <div id="rheader">
              <button id="btn2"><a href="display_all_products.php" id="shop_wish"><i class="fa fa-dropbox"><br><b>Products</b></i></a></button>

              <button id="btn2"><a href="view_cart.php" id="shop_wish"><i class="fa fa-shopping-cart"><span class="badge"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : ' 0'; ?></span><br><b>Add to Cart</b></i></a></button>

              <button id="btn2"><a href="file:///C:/Users/Admin/Desktop/taols/cate-page/login.html" id="shop_wish"><i class="fa fa-user"><br><b>Login</b></i></a></button>
            </div>
         </div>

         <div id="menu">
         <ul>
                <?php
                echo '<li> <a class="btnx" href="display_all_products.php">All</a></li>';
                while ($category = $categoriesResult->fetch_assoc()) {

                    echo '<li><a class="btnx" href="display_all_products.php?category=' . $category['id'] . '">' . $category['name'] . '</a></li>';
                }
                ?>
            </ul>
         </div>
         <hr id="hrline">

    </div>
</body>
</html>