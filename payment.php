<?php
session_start();
include("Config.php");

if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

   
    $select_product = mysqli_query($conn, "SELECT * FROM products WHERE id = '$product_id'");
    $product = mysqli_fetch_assoc($select_product);

    
    header("Location: payment_page.php?product_id=$product_id");
    exit; 
} else {
    
    header("Location: error_page.php");
    exit; 
}
?>
