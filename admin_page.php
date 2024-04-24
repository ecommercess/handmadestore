<?php
    require_once('session.php'); 
    if ($logged==false) {
         header("Location:index.php");
    }

$message = array();

if(isset($_POST['add_product'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $uid = $_POST['uid'];
    $target_dir = "uploads_img/";
    $product_image = $_FILES['product_image']['name'];
    $target_file = $target_dir . basename($product_image);
    move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);

    if(empty($product_name) || empty($product_price) || empty($product_image)){
        $message[] = 'Please fill out all details!!!';
    } else {
        $insert = $conn->prepare("INSERT INTO products (Name, Price, image,uid) VALUES (?, ?, ?,?)");
        $insert->bind_param("ssss", $product_name, $product_price, $product_image,$uid);
        if($insert->execute()){
            $message[] = 'Product added successfully!';
        } else {
            $message[] = 'Failed to add product';
        }
    }
}

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM products WHERE id = $id");
   header('location: admin_page.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <div class="edit"><a href="editprof.php" class="butt">EDIT INFORMATIONS</a></div>
    <div class="welcome-seller">
        <h1>Welcome Seller</h1>
    </div>
</body>
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
    .welcome-seller h1{
        font-size: 60px;
        text-align: center;
        padding-top: 20px;
    }
    .container{
        max-width: 1200px;
        padding: 2rem;
        margin:0 auto;
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
        border: 2px solid black;
    }
    .product-display .product-display-table thead{
        padding:1rem;
        font-size: 2rem;
        background: gray;
    }
    .product-display .product-display-table td{
        padding: 1.5rem;
        font-size: 2rem;
        border: 2px solid black;
    }
    .product-display .product-display-table th{
        padding: 1.5rem;
        font-size: 2rem;
        border: 2px solid black;
       
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
    .edit{
        font-size: 1.7rem;
        margin-top: 1rem;
        display: block;
        width: 23%;
        cursor: pointer;
        border-radius: .5rem;
        padding: 1rem 3rem;
        color: black;
        align-items: end;
    }
    .butt a{
        text-decoration: none;
        text-align: center;
        padding-left: 100px;
        color: black;
        border: 2px solid black;
        width: 100%;


    }
    .butt a:hover{
        color: white;
        padding-left: 100px;
    }
    .butt:hover{
        background-color: black;
        color: white;
    }
    .butt{
        font-size: 1.7rem;
        margin-top: 1rem;
        display: block;
        width: 160%;
        cursor: pointer;
        border-radius: .5rem;
        padding: 1rem 3rem;
        color: black;
        align-items: end;
        border: 2px solid black;

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

<?php
if(isset($message)){
    foreach($message as $msg){
        echo '<span class="message">'.$msg.'</span>';
    }
}
?>
<div class="container">
    <div class="admin-product-form-container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <h3>Add new product</h3>
            <input type="text" placeholder="Enter product name" name="product_name" class="box">
            <input type="number" placeholder="Enter Price of the Product" name="product_price" class="box">
            <input type="file" id="image" name="product_image" class="box">
            <input type="hidden"  name="uid" value="<?php echo $_SESSION['uid'] ?>" class="box">
            <input type="submit" class="btn" name="add_product" value="Add Product">
        </form>
    </div>

    <div class="product-display">
        <table class="product-display-table">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $id = $_SESSION['uid'];

                $select = mysqli_query($conn, "SELECT * FROM products WHERE uid = '$id'");
                while($row = mysqli_fetch_assoc($select)){
                ?>
                <tr>
                    <td><img src="uploads_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td>₱<?php echo $row['Price']; ?></td>
                    <td>
    
    <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"><i class="fas fa-edit"></i> Edit </a>
    <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"><i class="fas fa-trash"></i> Delete </a>
</td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
