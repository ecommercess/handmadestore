
You sent
<?php

    require_once('session.php'); 
    if ($logged==false) {
         header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dashboard</title>
    <style>/* styles.css */

        /* Resetting default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        
        /* Header styles */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        
        header h1 {
            margin: 0;
        }
        
        /* Navigation styles */
        nav ul {
            list-style-type: none;
            margin: 10px 0;
            padding: 0;
        }
        
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
        
        /* Main styles */
        main {
            padding: 20px;
        }
        
        /* Section styles */
        section {
            margin-bottom: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        section h2 {
            margin-bottom: 10px;
        }
        
        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        </style>
</head>
<body>
    <header>
        <h1>Welcome to your Dashboard!</h1>
        <nav>
            <ul>
                <li><a href="admin_page.php">Your Products</a></li>
                <li><a href="infor.php">Your Informations</a></li>
                <li><a href="#"></a></li>
                <li><a href="#">Customers</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </header>

<div style="margin: 2%;">

    <div class="row row-cols-1 row-cols-md-3 g-4">
   <?php

   $uid = $_SESSION['uid'];

  $sql = "SELECT * FROM products WHERE uid != $uid";
  $products = mysqli_query($con,$sql);

  while ($row = mysqli_fetch_array($products)){

  ?>     
  <div class="col">
    <div class="card h-100">
      <img src="uploads_img/<?php echo $row['image']; ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['Name']; ?></h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
<?php }; ?>
</div>

</div>

    
    <footer>
        <p>&copy; 2024 Handmade treasurestore Dashboard</p>
    </footer>
</body>
</html>