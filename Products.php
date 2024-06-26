<?php
include 'Config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Handmade Treasurestore</title>  
    <link rel="stylesheet" href="Products.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
    <body>

        <div class="header"> 
        <div class = "container">
            <div class="navbar">
                <div class="logo">
                <img src="Logo.png">
                </div>
            <nav>

            <div class="product-display">
                <a>HERE ARE YOUR PRODUCTS</a>
    <table class="product-display-table">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select = mysqli_query($conn, "SELECT * FROM products");
            while($row = mysqli_fetch_assoc($select)){
               
                $payment_link = "#" . $row['id'];
            ?>
            <tr>
                <td class="product-image"><a href="<?php echo $payment_link; ?>"><img src="uploads_img/<?php echo $row['image']; ?>" height="100" alt=""></a></td>
                <td class="product-name"><a href="<?php echo $payment_link; ?>"><?php echo $row['Name']; ?></a></td>
                <td class="product-price"><a href="<?php echo $payment_link; ?>">₱<?php echo $row['Price']; ?></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <style>
        .product-display a{
            padding-right: 45%;
            padding-top: 20px;

        }
  .button-container {
    color: black;
    margin: 20px;
    display: flex;
    justify-content: center;
    border-radius: 50%;
  }
  button {
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: black;
    border: none;
    border-radius: 10px;
    cursor: pointer;
  }
  button:hover {
    background-color: white;
    color: black
  }
</style>
</head>
<body>
<div class="button-container">
  <button onclick="updateProduct()">Update Product</button>
</div>
<script>
  function updateProduct() {
   
    window.location.href = 'admin_page.php';
  }
</script>
</div>
</div>


<div class="footer">
    <div class="Follow">
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
</div>
</div>
</div>
    </body>
</html>

<style>
.logo{
    padding-top: 10px;
    padding-bottom: 50px;
}
.logo img{
    height: 200px;
    width: 200px;
}
.container{
    height: 100vh;
}
.product-display {
    width: 80%;
    margin: 0 auto;
}

.product-display-table {
    width: 100%;
    border-collapse: collapse;
}

.product-display-table th,
.product-display-table td {
    border: 1px solid #ddd; 
    padding: 10px;
    text-align: left;
}

.product-display-table th {
    background-color: #f0f2f5;
    font-weight: bold;
}

.product-display-table td.product-image img {
    max-height: 150px;
    max-width: 150px; 
    display: block; 
    margin: 0 auto; 
    display: flex;
    flex-direction: row;
}

.product-display-table td.product-name {
    font-weight: bold;
    color: #333; 
    padding-top: 10px; 
}

.product-display-table td.product-price {
    color: #e74c3c; 
    font-size: 16px; 
}

.product-display-table td.product-description {
    color: #666; 
}

.product-display-table td.product-button {
    text-align: center;
    padding-top: 10px;
}

.product-display-table td.product-button a {
    display: inline-block;
    background-color: #ff9800; 
    color: #fff; 
    text-decoration: none;
    padding: 8px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.product-display-table td.product-button a:hover {
    background-color: #f57c00;
}
.footer{
    width: 100%;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 20px;
    padding-bottom: 20px;
}

</style>