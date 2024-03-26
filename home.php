<?php
echo "<link rel='stylesheet' type='text/css' href='style.css' />";
?>
<?php
include('db.php');
session_start();

// Check if user is logged in
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
} else {
  $username = null;
}
$categoriesResult = $conn->query("SELECT * FROM categories");

if (isset($_GET['category'])) {
  $categoryId = $_GET['category'];
  $result = $conn->query("SELECT * FROM products WHERE category_id = $categoryId");
} else {
  $result = $conn->query("SELECT * FROM products");
}

// Logout functionality
if (isset($_POST['logout'])) {
  session_destroy();
  header('Location: home.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <script src="script.js" defer></script>

</head>
<style>
*
{
    padding: 0;
    margin: 0;
}
.slideshow-container {
      width: 1500px;
      height: 700px;
      position: relative;
      margin: auto;
    }
    .img1
    {
      width: 1500px;
      height: 700px;
    }

    .mySlides {
      display: none;
    }

    /* Style the next and previous buttons */
    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
    }

    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }
#main
{
    width: 100%;
    height: 100%;
}
#offer
{
    width: 1335px;
    height: 130px;
    /* background-color: purple; */
    margin: auto;
    margin-top: 50px;    
}
#offer img
{
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
}
#grid-hrline
{
    width: 800px;
    margin: auto;
    margin-top: 80px;
}
#grid-text2
{
    width: 100%;
    height: 80px;
    /* background-color: red; */
    margin: auto;
    margin-top: 50px;
}
#grid-text2 h1
{
    width: 350px;
    height: 50px;
    margin: auto;
    font-size: 38px;
}
#grid-text2 p
{
    width: 370px;
    height: 30px;
    margin: auto;
    font-size: 18px;
}

  #grid-container
  {
      width: 962px;
      height: 512px;
      display: grid;
      grid-template-columns: repeat(4,1fr);
      /* background-color: aqua; */
      gap: 20px;
      padding: 10px;
      margin: auto;
      margin-top: 50px;
  
  }
  #grid-img
  {
      width: 225px;
      height: 200px;
      background-color: black;
      text-align: center;
      background-repeat: no-repeat;
      background-size: 100%;
      display: flex;
  }
  #grid-text
  {
      width: 150px;
      height: 40px;
      /* background-color: rebeccapurple; */
      margin-left: 25px;
      margin-top: 10px;
      text-align: center;
      font-weight: normal;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  #grid-container div a
  {
      text-decoration: none;
      color: black;
  }
#discount
{
    width: 1335px;
    height: 320px;
    /* background-color: grey; */
    margin: auto;
    margin-top: 80px;
}
#prt1
{
    width: 100%;
    height: 60px;
}
#txt1
{
    width: 270px;
    height: 100%;
    margin: auto;
    font-family: Poppins,sans-serif;
    font-size: 30px;
}
#prt2 img
{
    width: 100%;
    height: 270px;
    background-repeat: no-repeat;
}
#hrline1
{
    width: 1440px;
    margin: auto;
    margin-top: 70px;
}
#sign-up
{
    width: 1440px;
    height: 120px;
    /* background-color: purple; */
    margin: auto;
    margin-top: 60px;
    display: flex;
}
#sign-up img
{
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
}
#grid-heading
{
    width: 100%;
    height: 80px;
    background-color: #F1F9F9;
    margin: auto;
    margin-top: 90px;
}
#grid-heading h1
{
    font-size: 40px;
    margin-left: 40px;
    padding-top: 20px;
}
#grid-heading p
{
    font-size: 18px;
    margin-top: 5px;
    margin-left: 40px;
}
#grid-container-main
{
    width: 100%;
    height: 1100px;
    background-color:#F1F9F9;
    display: flex;
}
#grid2-container
{
    width: 1440px;
    height: 1000px;
    display: grid;
    grid-template-columns: repeat(4,1fr);
    /* background-color: aqua; */
    gap: 20px;
    margin: auto;
}
#item-1
{
    width: 336px;
    height: 480px;
    background-color: white;
    /* border: groove 4px grey; */
}
#item-1 a
{
    text-decoration: none;
    color: black;
}
#grid3-img
{
    width: 100%;
    height: 280px;
    background-color: wheat;
    text-align: center;
    background-repeat: no-repeat;
    border-radius: 5px;

}
#part1
{
    width: 100%;
    height: 280px;
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
    height: 700px;
    /* background-color: wheat; */
    margin-top: 100px;
    background-image: url(ad\ img/wp7213368.jpg);
    background-repeat: no-repeat;
    background-size: 100%;
}
#about_tittle
{
    width: 100%;
    height: 100px;
    /* background-color: red; */
    display: flex;
    color: rgba(54, 218, 250, 0.607);
}
#about_tittle b
{
    font-size: 40px;
    margin: auto;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}
#about_box
{
    width: 100%;
    height: 500px;
    /* background-color: green; */
    display: flex;
    justify-content: center;
    gap: 50px;
}
#about_box1
{
    width: 20%;
    height: 400px;
    background-color: rgba(176, 233, 245, 0.523);
    border-radius: 10px;
    margin-top: 110px;
    box-shadow: 0px 0px 10px 0px black;
}
#about_box1 input
{
    width: 90%;
    height: 40px;
    margin-left: 15px;
    margin-top: 25px;
    outline: 0;
    border-width: 0 0 2px;
    background-color: rgba(176, 234, 245, 0.046);
}
#about_box1 button
{
    width: 150px;
    height: 40px;
    margin-left: 15px;
    margin-top: 25px;
    background-color: rgb(250, 40, 40);
    color: white;
    border-radius: 5%;
}
#about_box1 img
{
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-left: 15px;
}
#about_box1:hover
{
    transform: translateY(-50px);
}
#about_box1 a
{
    text-decoration: none;
    color: black;
}
#about_box1 h1
{
    font-size: 20px;
    color: grey;
    font-weight: normal;
    margin-top: 50px;
    margin-left: 50px;
    margin-bottom: 40px;
}
#about_box1 h2
{
    font-size: 20px;
    color: black;
    font-weight: normal;
    margin-top: 20px;
    margin-left: 50px;
}
#hrline_last
{
    width: 100px;
    margin: auto;
    margin-top: 50px;
}
</style>
<body>

<?php
  include("nav.php");
?>
    <div id="main">

        <div class="slideshow-container">
            <div class="mySlides fade">
              <img src="slider/pic6.jpeg" class="img1" style="width:100%">
            </div>
        
            <div class="mySlides fade">
              <img src="sofa/33b1bab2ccf44b94a86495c4ffe4c958.jpg" class="img1" style="width:100%">
            </div>
        
            <div class="mySlides fade">
              <img src="sofa/058f345bc124448718e748c0715b905e.jpg" class="img1" style="width:100%">
            </div>
        
            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>

        <div id="offer">
            <img src="ad img/emi-banner.jpg" alt="">
          </div>

          <hr id="grid-hrline">
            <div id="grid-text2">
                <h1>Top Picks For You</h1>
                <p>Impressive Collection For Your Dream Home</p>
            </div>

          <div id="grid-container">
            <div id="item1"><a href="http://localhost/furniture/User/display_all_products.php?category=1"><img src="cate-round img/icon1.jpg" alt="" id="grid-img">
                <h4 id="grid-text">Sofa Sets</h4></a>
            </div>
            <div id="item2"><a href="http://localhost/furniture/User/display_all_products.php?category=3"><img src="cate-round img/icon2.jpg" alt="" id="grid-img">
                <h4 id="grid-text">Beds</h4></a>
            </div>
            <div id="item3"><a href="http://localhost/furniture/User/display_all_products.php?category=2"><img src="cate-round img/icon10.jpg" alt="" id="grid-img">
                <h4 id="grid-text">Living Room</h4></a>
            </div>
            <div id="item4"><a href="http://localhost/furniture/User/display_all_products.php?category=6"><img src="cate-round img/icon4.jpg" alt="" id="grid-img">
                <h4 id="grid-text">Mattress</h4></a>
            </div>
            <div id="item5"><a href="http://localhost/furniture/User/display_all_products.php?category=5"><img src="cate-round img/icon7.jpg" alt="" id="grid-img">
                <h4 id="grid-text">Study & Office</h4></a>
            </div>
            <div id="item6"><a href="http://localhost/furniture/User/display_all_products.php?category=4"><img src="cate-round img/icon3.jpg" alt="" id="grid-img">
                <h4 id="grid-text">Dining Tables</h4></a>
            </div>
            <div id="item7"><a href="http://localhost/furniture/User/display_all_products.php?category=7"><img src="cate-round img/icon11.jpg" alt="" id="grid-img">
                <h4 id="grid-text">Furnishing</h4></a>
            </div>
            <div id="item8"><a href="http://localhost/furniture/User/display_all_products.php?category=7"><img src="cate-round img/icon8.jpg" alt="" id="grid-img">
                <h4 id="grid-text">Discount Offer</h4></a>
            </div>
            
        </div>

          <div id="discount">
            <div id="prt1">
                <h2 id="txt1">Deal Maange More</h2>
            </div>
            <div id="prt2">
                <a href="#"><img src="ad img/discount.webp" alt=""></a>
            </div>
          </div>

          <hr id="hrline1">

         <div id="sign-up">
          <a href="file:///C:/Users/Admin/Desktop/taols/cate-page/login.html"><img src="ad img/signup.webp" alt=""></a>
        </div>

        <div id="grid-heading">
            <h1>Home Furnishing</h1>
            <p>Let's Start New Begin...</p>
        </div>

        <div id="grid-container-main">
            <div id="grid2-container">
                <div id="item-1">
                  <a href="#">
                  <div id="part1"><img src="furnishing/Furnishing-1.jpg" alt="" id="grid3-img"></div>
                  </a>
                  <div id="part2">
                    Vini Coin Studded Brass Analog Metal Wall Clock - 18 x 18 inch 
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
                    <p><b>$599</b> -$699 <span style="color: green;">40% off</span></p>
                    <div id="shipping"><i class="fa fa-truck"> <b>Ships in 2 Days</b></i></div>
                  </div>
                </div>
  
                <div id="item-1">
                  <a href="#">
                  <div id="part1"><img src="furnishing/11.jpg" alt="" id="grid3-img"></div>
                  </a>
                  <div id="part2">
                    Vini Coin Studded Brass Analog Metal Wall Clock - 18 x 18 inch 
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
                        <p><b>$99</b> -$109 <span style="color: green;">40% off</span></p>
                        <div id="shipping"><i class="fa fa-truck"> <b>Ships in 2 Days</b></i></div>
                  </div>
                </div>
  
                <div id="item-1">
                  <a href="#">
                  <div id="part1"><img src="furnishing/Furnishing 2.jpg" alt="" id="grid3-img"></div>
                  </a>
                  <div id="part2">
                    Vini Coin Studded Brass Analog Metal Wall Clock - 18 x 18 inch 
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
                    <p><b>$599</b> -$999 <span style="color: green;">40% off</span></p>
                    <div id="shipping"><i class="fa fa-truck"> <b>Ships in 2 Days</b></i></div>
                  </div>
                </div>
  
                <div id="item-1">
                  <a href="#">
                  <div id="part1"><img src="furnishing/furnishing 3.jpg" alt="" id="grid3-img"></div>
                  </a>
                  <div id="part2">
                    Vini Coin Studded Brass Analog Metal Wall Clock - 18 x 18 inch 
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
                    <p><b>$39</b> -%49 <span style="color: green;">40% off</span></p>
                    <div id="shipping"><i class="fa fa-truck"> <b>Ships in 2 Days</b></i></div>
                  </div>
                </div>
  
                <div id="item-1">
                  <a href="#">
                  <div id="part1"><img src="furnishing/furnishi 5.jpg" alt="" id="grid3-img"></div>
                  </a>
                  <div id="part2">
                    Vini Coin Studded Brass Analog Metal Wall Clock - 18 x 18 inch 
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
                    <p><b>$269</b> -$299 <span style="color: green;">40% off</span></p>
                    <div id="shipping"><i class="fa fa-truck"> <b>Ships in 2 Days</b></i></div>
                  </div>
                </div>
  
                <div id="item-1">
                  <a href="#">
                  <div id="part1"><img src="furnishing/clock.jpg" alt="" id="grid3-img"></div>
                  </a>
                  <div id="part2"> Vini Coin Studded Brass Analog Metal Wall Clock - 18 x 18 inch 
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
                    <p><b>$79</b> -$99 <span style="color: green;">40% off</span></p>
                    <div id="shipping"><i class="fa fa-truck"> <b>Ships in 2 Days</b></i></div>
                  </div>
                </div>
  
                <div id="item-1">
                  <a href="#">
                  <div id="part1"><img src="furnishing/furnish 6.jpg" alt="" id="grid3-img"></div>
                  </a>
                  <div id="part2">
                    Vini Coin Studded Brass Analog Metal Wall Clock - 18 x 18 inch 
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
                    <p><b>$429</b> -$529 <span style="color: green;">40% off</span></p>
                    <div id="shipping"><i class="fa fa-truck"> <b>Ships in 2 Days</b></i></div>
                  </div>
                </div>
  
                <div id="item-1">
                  <a href="#">
                  <div id="part1"><img src="furnishing/furnishing 4.jpg" alt="" id="grid3-img"></div>
                  </a>
                  <div id="part2">
                    Vini Coin Studded Brass Analog Metal Wall Clock - 18 x 18 inch 
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
                    <p><b>$69</b> -$89 <span style="color: green;">40% off</span></p>
                    <div id="shipping"><i class="fa fa-truck"> <b>Ships in 2 Days</b></i></div>
                  </div>
            </div>
  
        </div>
        </div>
        <hr id="hrline3">

        <div id="about">
            <div id="about_tittle"><b><u>About us</u></b></div>
            <div id="about_box">
                <div id="about_box1">
                  <a href="#"><h1>Support</h1></a>
                  <a href="#"><h2>Contact Us</h2></a>
                  <a href="#"><h2>FAQ</h2></a>
                  <a href="#"><h2>Downloads</h2></a>
                  <a href="#"><h2>Locate A Dealer</h2></a>
                  <a href="#"><h2>Product Registration</h2></a>
                  <a href="#"><h2>Furniture Accessories</h2></a>
                </div>
                <div id="about_box1">
                  <a href="#"><h1>Manufacture</h1></a>
                  <a href="#"><h2>About Furrion</h2></a>
                  <a href="#"><h2>Furniture Design</h2></a>
                  <a href="#"><h2>Newroom</h2></a>
                  <a href="#"><h2>Manufacturing</h2></a>
                  <a href="#"><h2>Production</h2></a>
                </div>
                <div id="about_box1">
                  <a href="#"><h1>TALS</h1></a>
                  <a href="#"><h2>About Location</h2></a>
                  <a href="#"><h2>New Modern Design</h2></a>
                  <input type="text" placeholder="Enter Your E-Mail Address">
                  <button>Sign Up</button>
                </div>
                <div id="about_box1">
                  <h1>The Art Of Living Spaces</h1>
                  <img src="ad img/fb_1695273515215_1695273522698.jpg" alt="">
                  <img src="ad img/600px-Instagram_icon.png" alt="">
                  <img src="ad img/twiteer.jpg" alt="">
                  <img src="ad img/yt.png" alt="">
    
                  <hr id="hrline_last">
                </div>
            </div>
    </div>
</body>
</html>