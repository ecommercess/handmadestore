<?php

require_once('session.php');
if ($logged == false) {
    header("Location: index.php");
}

// Check if the product ID is present
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $uid = $_SESSION['uid'];

    // SQL to delete the item
    $sql = "DELETE FROM tbl_cart WHERE id = $product_id AND uid = $uid";
    if (mysqli_query($con, $sql)) {
        // Redirect back to cart page
        header("Location: mycart.php");
    } else {
        echo "Error removing item: " . mysqli_error($con);
    }
}

?>
