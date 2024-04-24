<?php
session_start();
include("Config.php");
?>
<?php

// Check if the user is logged in
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<script>alert('Welcome to Handmade Treasurestore,' $username' !);</script>";
        
        $_SESSION['welcome_displayed'] = true;
    } else {
        
    echo "<script>alert('You have been logged out.');</script>";
    header("Location: login.php");
    exit();
}
if(isset($_POST['logout'])) {
    // Destroy the session
    session_destroy();
    // Redirect to login page or any other appropriate page
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Handmade Treasurestore</title>  
    <link rel="stylesheet" href="Style.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
    <body>

        <div class="header"> 
        <div class = "container">
            <div class="navbar">
                <div class="logo">
                <img src="Logo.png" width="150px">
                </div>

            <nav>
                <ul>
                    <li><a href ="About.html">ABOUT US</a></li>
                    <li><a href ="Products.php">MY PRODUCTS</a></li>
                    <li><a href ="dashboard.php">DASHBOARD</a></li>
                    <li><a href ="mycart.php">MY ORDER</a></li>
                </ul>
            </nav>
            <a href ="mycart.php"><img src="Add.png" style="margin: 20px;"></a>
            <form method="post">
    <button type="submit" name="logout">Logout</button>
</form>
        </div>
        <div class="row">
            <div class="col-2">
                <h1>HANDMADE TREASURESTORE</h1>
                <p>Treasure Every Occasion</p>
                <a href="Products.php" class="btn">EXPLORE NOW &#8594;</a>
            </div>
            <div class="col-2">
                <img src ="image.jpg">
            </div>
            </div>
        </div>
    </div>
<!------Featured------>
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img src="img1.jpg">
                </div>
                <div class="col-3">
                    <img src="img2.jpg">
                </div>
                <div class="col-3">
                    <img src="img3.jpg">
                </div>  
            </div>
        </div>
    </div>
    <!------Featured Products------>
        <div class="small-container">
            <h2 class="title">Featured Products</h2>
            <div class="row">

             <?php 
                 $uid = $_SESSION['uid'];
                 $sql = "SELECT * FROM products";
                 $products = mysqli_query($conn,$sql);
                 while ($row = mysqli_fetch_array($products)){
                 ?>     

            <div class="col-4">
                <a href =""><img src="uploads_img/<?php echo $row['image']; ?>"></a>
                <a href =""><h4><?php echo $row['Name']; ?></h4></a>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p>&#8369; <?php echo $row['Price']; ?></p>
                <form method="POST" action="addtocartFunction.php">
                    <input type="hidden" name="img_path" value="<?php echo $row['image']; ?>">
                    <input type="hidden" name="name" value="<?php echo $row['Name']; ?>">
                    <input type="hidden" name="product_desc" value="<?php echo $row['Description']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $row['Price']; ?>">
                    <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                <button type="submit" class="btn btn-warning" name="addCart">Add to cart</button>
                 </form>
            </div>
            <?php }; ?>
        </div>
        <!-----LP-->
        <h2 class="title">Latest Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="pr5.jpg">
                <h4>Hand-Made Sandals</h4></a>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p>&#8369;250.00</p>
            </div>
            <div class="col-4">
                <img src="pr6.jpg">
               <h4>Puzzle Keychain</h4></a>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p>&#8369;60.00</p>
            </div>
            <div class="col-4">
                <img src="pr7.jpg">
                <h4>Yarn-Made Flower Bouquet</h4></a>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <p>&#8369;160.00</p>
            </div>
            <div class="col-4">
                <img src="pr8.jpg">
                <h4>Anime Glass Painting</h4></a>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <p>&#8369;180.00</p>
            </div>
            <div class="row">
                <div class="col-4">
                    <img src="pr9.jpg">
                   <h4>Handmade Bouquet</h4></a>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p>&#8369;250.00</p>
                </div>
                <div class="col-4">
                    <img src="pr10.jpg">
                    <h4>Handmade Bouquet</h4></a>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p>&#8369;60.00</p>
                </div>
                <div class="col-4">
                    <img src="pr11.jpg">
                    <h4>Yarn-Made Flower Bouquet</h4></a>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p>&#8369;160.00</p>
                </div>
                <div class="col-4">
                    <img src="pr12.jpg">
                    <h4>Yarn-made plant in a Pot</h4></a>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p>&#8369;180.00</p>
                </div>
            </div>
        </div>
        <!---o-->
        <div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="col-2">
                        <img src="xpr1.jpg" class="offer-img">
                    </div>
                    <div class="col-2">
                        <p>EXCLUSIVE PRODUCT</p>
                        <h1>Garden Elegance</h1></a>
                        <small>
                            Introducing the exquisite "Garden Elegance" flower bouquet – a harmonious
                             blend of nature's finest blooms crafted to elevate any occasion. <br></small>
                    </div>
                </div>
            </div>
        </div>
<!---foot----->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Follow Us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Instagram</li>
                    <li>Twitter</li>
                    <li>Tiktok</li>
                </ul>
                </div>
                <div class="footer-col-2">
                    <p>Thank you for choosing Handmade TreasureStrore! Explore our top-quality products with secure payments and fast shipping. Our dedicated support team is here for you. Stay tuned for exclusive offers and promotions. Happy shopping with us!</p>
           
        </div>
    </div>
</div>









    
    </body>
    </html>