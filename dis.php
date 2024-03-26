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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    height: 100%;
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
    color: rgb(255, 103, 86);
}
#lheader h1
{
    font-size: 20px;
    margin-left: 165px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    color: rgb(255, 106, 90);
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
    margin-top: 30px;
    margin-left: 10px;
}
#btn1
{
    width: 80px;
    height: 35px;
    background-color: rgb(236, 235, 235);
    border-radius: 5px 5px;
    border-color: transparent;   
}
#btn2
{
    margin-top: 32px;
    background-color: transparent;
    border-color: transparent;
    margin-left: 5px;
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
    margin-top: px;
}
#display img
{
    width: 1300px;
    height: 500px;
    display: flex;
    margin: auto;
    margin-top: 20px;
}
#offer
{
    width: 1335px;
    height: 130px;
    /* background-color: purple; */
    margin: auto;
    margin-top: 80px;    
}
#offer img
{
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
}
#hrline1
{
    width: 1440px;
    margin: auto;
    margin-top: 50px;
}
#sofa-heading
{
    width: 400px;
    height: 50px;
    /* background-color: red; */
    margin: auto;
    margin-top: 50px;
}
#sofa-heading p
{
    font-size: 18px;
    margin-top: 5px;
    margin-left: 30px;
}
#sofa-heading h1
{
    font-size: 40px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
#sofa-grid-main
{
    width: 100%;
    height: 1300px;
    background-color: rgb(221, 245, 250);
    display: flex;
    margin-top: 30px;
}
#sofa-grid
{
    width: 1440px;
    height: 1149px;
    display: grid;
    grid-template-columns: repeat(3,1fr);
    /* background-color: aqua; */
    gap: 30px;
    margin: auto;
}
#item1
{
    width: 450px;
    height: 550px;
    /* border: groove 5px grey; */
    background-color: white;
}
#part1
{
    width: 100%;
    height: 350px;
    /* background-color: green; */
}
#part1 img
{
    width: 440px;
    height: 340px;
    border-radius: 5px;
    border: 5px solid white;
}
#part2
{
    font-size: 20px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
#part2 p
{
    font-size: 18px;
    color: gray;
    font-family: Arial, Helvetica, sans-serif;
    margin-top: 5px;
}
#part2 hr
{
    margin-top: 20px;
}
#part2 p b
{
    color: black;
    font-size: 25px;
    font-weight: normal;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
#shipping
{
    color: tomato;
    margin-top: 10px;

}
#shipping b
{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-weight: normal;
}
#hrline3
{
    width: 1000px;
    margin: auto;
    margin-top: 100px;
}
#about
{
    width: 100%;
    height: 300px;
    margin-top: 50px;
}
#h2-about
{
    margin-left: 20px;
    margin-top: 10px;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
#p-about
{
    margin-left: 20px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;

}
#adsense
{
    width: 1200px;
    height: 400px;
    background-color: red;
    margin: auto;
    margin-top: 100px;
    
}
#adsense img
{
    width: 100%;
    height: 100%;
}
</style>
<body>
    <div id="main">

         <div id="display"><img src="sofa/c38b1b334f5876a1f3064133bff27e93.jpg" alt=""></div>

         <div id="offer">
            <img src="emi-banner.jpg" alt="">
         </div>

         <hr id="hrline1">

         <div id="sofa-heading">
            <h1>Top Pics Of Sofa Sets</h1>
            <p>Impressive Collection For Your Dream Home</p>
        </div>
        <!-- <div class="categories">
        <a class="btn" href="display_all_products.php">All</a>
        <?php
        while ($category = $categoriesResult->fetch_assoc()) {
            echo '<a class="btn" href="display_all_products.php?category=' . $category['id'] . '">' . $category['name'] . '</a>';
        }
        ?>
    </div> -->
        <div id="sofa-grid-main">
            
            <div id="sofa-grid">
            
                <?php
        while ($row = $result->fetch_assoc()) {
             echo ' <div id="item1">
                    <a href="view_product.php?id=' . $row['id'] . '">
                        <div id="part1"><img src="' . $row['image_path'] . '" alt=""></div>
                    </a>
                    <div id="part2">
                    ' . $row['name'] . ' 
                      <p>Earthy Homes</p>
                      <span style="color: orange;">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-half-empty"></i>
                      </span>
                      (59 Sold)
                      <hr>
                      <p><b>Rs' . $row['price'] . '</b> -Rs 5,999 <span style="color: green;">40% off</span></p>
                      <div id="shipping"><i class="fa fa-truck"> <b>Ships in 2 Days</b></i></div>
                    </div>
                </div>';
            }
            ?>

        </div>
        </div>    

      

        <div id="about">
            <h2 id="h2-about">Buy Sofa Set Online in India at Best Price</h2>
            <p id="p-about">Sofa set is a quintessential element in the living room that defines the overall mood and tone of your home. It is a must-have furniture piece for every home, as you will find some of the best sofa online in India from Wooden Street, which will be the center of attraction for your guests to gaze on. Besides proffering comfort, a modern sofa set furniture provides plush comfort, so that your guests feel special every time they are at your home. Whether you are a couch potato or couch surfing, luxury sofa sets for drawing room serves the best. Therefore, living room sofa furniture is the central unit that uplifts the ambiance of the room.</p>
            <br>
            <p id="p-about">WoodenStreet’s astounding cheap and best sofa set online range features a variety of designs, patterns, textures to maximize the style quotient of your living room. Our collection of premium sofas online in India proffers all types of high-standard material choices including solid wood, leatherette, fabrics, and many others. With the stylish sofa set designs, we assure you that your investment serves for a longer time. Thus, all sorts of modern sofa sets online in India are durability certified and provide robustness even for rough and tough usage. Moreover, our furniture sofa set prices are great competitive and for quality that makes a great deal for our customers. So, whom are you waiting for? Shop the luxury sofa set design from our collection and enjoy the incredible shopping with us.</p>

            <h2 id="h2-about">
                Tips to choose right sofa set for living room
            </h2>
            <p id="p-about">
                Sofa sets for Living room are not only indispensable in day-to-day life, but their addition turns a dull space into glamorous one. Buying New Model Sofa furniture for drawing room is always a tricky task, so check out these factors if you do not know what tips to be considered before buying - 
            </p>
            <p id="p-about">WoodenStreet’s astounding cheap and best sofa set online range features a variety of designs, patterns, textures to maximize the style quotient of your living room. Our collection of premium sofas online in India proffers all types of high-standard material choices including solid wood, leatherette, fabrics, and many others. With the stylish sofa set designs, we assure you that your investment serves for a longer time. Thus, all sorts of modern sofa sets online in India are durability certified and provide robustness even for rough and tough usage. Moreover, our furniture sofa set prices are great competitive and for quality that makes a great deal for our customers. So, whom are you waiting for? Shop the luxury sofa set design from our collection and enjoy the incredible shopping with us.</p>
            <br>
            <p id="p-about">WoodenStreet’s astounding cheap and best sofa set online range features a variety of designs, patterns, textures to maximize the style quotient of your living room. Our collection of premium sofas online in India proffers all types of high-standard material choices including solid wood, leatherette, fabrics, and many others. With the stylish sofa set designs, we assure you that your investment serves for a longer time. Thus, all sorts of modern sofa sets online in India are durability certified and provide robustness even for rough and tough usage. Moreover, our furniture sofa set prices are great competitive and for quality that makes a great deal for our customers. So, whom are you waiting for? Shop the luxury sofa set design from our collection and enjoy the incredible shopping with us.</p>
        </div>
    </div>
</body>
</html>