<?php
include 'Config.php';

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $select = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    $row = mysqli_fetch_assoc($select);
    
    if(isset($_POST['update_product'])){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];

        // If a new image is uploaded, update the image
        if(!empty($_FILES['product_image']['name'])){
            $target_dir = "uploads_img/";
            $product_image = $_FILES['product_image']['name'];
            $target_file = $target_dir . basename($product_image);
            move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);
            $update = mysqli_query($conn, "UPDATE products SET Name = '$product_name', Price = '$product_price', image = '$product_image' WHERE id = $id");
        } else {
            // If no new image is uploaded, update only the name and price
            $update = mysqli_query($conn, "UPDATE products SET Name = '$product_name', Price = '$product_price' WHERE id = $id");
        }

        if($update){
            header('location: admin_page.php');
        } else {
            echo "Failed to update product";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Update Product</title>
    <style>
    *{
        font-family: 'poppins, sans-serif';
        margin: 0;padding: 0;
        box-sizing: border-box;
        outline: none; border: none;
        text-decoration: none;
        text-transform: capitalize;
    }
    html{
        font-size: 100.5%;
        overflow-x: hidden;
    }
    .container{
        max-width: 1200px;
        padding: 2rem;
        margin:0 auto;
    }
    .admin-product-form-container.centered{
        display:flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;


    }
    .admin-product-form-container form{
        max-width: 50rem;
        margin: 0 auto;
        padding: 2rem;
        border-radius: .5rem;
        background: pink;
        text-align: center;
        border: 2px solid black;
    }
    .admin-product-form-container form h3{
        text-transform: uppercase;
        color: var(black);
        margin-bottom: 1rem;
        text-align: center;
        font-size: 50px;
    }
    .admin-product-form-container form .box{
        width: 100%;
        border-radius: .5rem;
        padding: 1.2rem 1.5rem;
        font-size: 1.5rem;
        margin: 1rem 0;
        background: white;
        text-transform: none;
        
    }    
    .btn{
        font-size: 1.7rem;
        margin-top: 1rem;
        display: block;
        width: 100%;
        cursor: pointer;
        border-radius: .5rem;
        padding: 1rem 3rem;
        background: var(white);
        color: black;
        text-align: center;
        
    }
    .btn:hover{
        background-color: black;
        color: white;

    }
    .message{
        display: block;
        background: var(pink);
        padding:1.5rem 1rem;
        font-size: 2rem;
        color: black;
        margin-bottom: 2rem;
        text-align: center;
    }
    .product-display{
        margin: 2rem 0;
      
    }
    .product-display .product-display-table{
        width: 100%;
        text-align: center;
    }
    .product-display .product-display-table thead{
        padding:1rem;
        font-size: 2rem;
        background: gray;
    }
    .product-display .product-display-table td{
        padding: 1.5rem;
        font-size: 2rem;
        border-bottom: var(black)
    }
    .product-display .product-display-table th{
        padding: 1.5rem;
        font-size: 2rem;
       
    }
    .product-display .product-display-table .btn:first-child{
        margin-top: 0;
       
    }
    .product-display .product-display-table .btn:last-child{
        background: white;
        
    }
    .product-display .product-display-table .btn:last-child:hover{
        background: black;
    }





@media (maxwidth:991px){
    html{
        font-size: 55%;

    }
}

@media (maxwidth:768px){
    .product-display{
       overflow-y: scroll;
    }
   
    .product-display .product-display-table{
        width: 80rem;
    }
}

@media (maxwidth:450px){
    html{
        font-size: 50%;
        
    }
}

</style>
</head>
<body>
    <div class="container">
        <div class="admin-product-form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <h3>Update Product</h3>
                <img src="uploads_img/<?php echo $row['image']; ?>" height="100" alt="Current Image">
                <input type="file" id="image" name="product_image" class="box">
                <input type="text" placeholder="Enter product name" name="product_name" class="box" value="<?php echo $row['Name']; ?>">
                <input type="number" placeholder="Enter Price of the Product" name="product_price" class="box" value="<?php echo $row['Price']; ?>">
                <input type="submit" class="btn" name="update_product" value="Update Product">
            </form>
        </div>
    </div>
</body>
</html>
