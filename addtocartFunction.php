<?php

include('Config.php');

if(isset($_POST['addCart'])){
    $name = $_POST['name'];
    $product_desc = $_POST['product_desc'];
    $product_price = $_POST['product_price'];
    $path = $_POST['img_path'];
    $uid = $_POST['uid'];

    $sql="INSERT INTO `tbl_cart`(`product_name`, `product_desc`, `product_price`, `img_path`,  `uid`) VALUES ('$name', '$product_desc', '$product_price',  '$path', '$uid')";

    $result = mysqli_query($con,$sql);

    if($result) {
        echo "<script>alert('Item added to cart successfully.');</script>";
    } else {
        echo "<script>alert('Failed to add item to cart.');</script>";
    }
    echo "<script>window.location.href='add_tocart.php';</script>";
}

?>
