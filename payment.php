<?php
session_start();
include("Config.php");
// Retrieve product ID from the URL parameter
if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Retrieve product details from the database based on the product ID
    $select_product = mysqli_query($conn, "SELECT * FROM products WHERE id = '$product_id'");
    $product = mysqli_fetch_assoc($select_product);

    // Example: Redirect to payment page with product details
    header("Location: payment_page.php?product_id=$product_id");
    exit; // Stop further execution
} else {
    // If product ID is not provided, redirect to a different page or show an error message
    header("Location: error_page.php");
    exit; // Stop further execution
}
?>
