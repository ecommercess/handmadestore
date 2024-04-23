<?php
session_start();
include("Config.php");
// Check if a product ID is provided in the URL parameter
if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product details from the database based on the product ID
    // This code should be similar to what you used in the product display page
    $select_product = mysqli_query($conn, "SELECT * FROM products WHERE id = '$product_id'");
    $product = mysqli_fetch_assoc($select_product);

    // Check if the product exists
    if($product) {
        // Now, you can display the product information and handle the payment process
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- Include any necessary CSS stylesheets -->
</head>
<body>
<div class="Pay">
    <h1>YOU'RE ALMOST THERE!</h1></div>
    <div class="container">
        <?php if(isset($product['image'])): ?>
            <img src="uploads_img/<?php echo $product['image']; ?>" alt="Product Image" style="max-width: 100%; margin-bottom: 20px;">
        <?php endif; ?>
        <h2><?php echo $product['Name']; ?></h2>
        <p>Price: ₱<?php echo $product['Price']; ?></p>
        <!-- Here you can include a payment form or button to proceed with the payment process -->
        <!-- Example payment form -->
        <form action="process_payment.php" method="POST">
            <!-- Include necessary form fields for payment -->
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <input type="submit" value="Proceed to Payment">
        </form>
    </div>
</body>
</html>
<?php
    } else {
        // If the product doesn't exist, display an error message or redirect to an error page
        echo "Product not found!";
    }
} else {
    // If product ID is not provided, display an error message or redirect to an error page
    echo "Product ID not provided!";
}
?>
<style>
    /* CSS for Payment Page */
body {
    font-family: Arial, sans-serif;
    background: radial-gradient(#fff,#ffd6d6);
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 5px;
    text-align: center;
}

h1 {
    font-size: 36px;
    color: #333;
    margin-bottom: 20px;
}

h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}

p {
    font-size: 18px;
    color: #666;
    margin-bottom: 20px;
}

form {
    margin-top: 20px;
}

input[type="submit"] {
    background-color: black;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: pink;
}
.container img{
    height: 500px;
}
.Pay{
    text-align: center;
    color: black;
}

</style>
