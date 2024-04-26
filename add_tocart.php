<?php

require_once('session.php'); 
if ($logged == false) {
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add to cart</title>
    <style>
        .btn{
            background-color: peru;
            padding-left: 20px;
        }
        .btm-warning{
            background-color: peru;
            padding-left: 20px;

        }
        </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<a href="mycart.php"><button class="btn btn-warning">CHECK MY CART</button></a>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
    $uid = $_SESSION['uid'];
    $sql = "SELECT * FROM products";
    $products = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($products)){
    ?>     
    <div class="col">
        <div class="card h-100">
            <img src="uploads_img/<?php echo $row['image']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['Name']; ?></h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <form method="POST" action="addtocartFunction.php">
                    <input type="hidden" name="img_path" value="<?php echo $row['image']; ?>">
                    <input type="hidden" name="name" value="<?php echo $row['Name']; ?>">
                    <input type="hidden" name="price" value="<?php echo $row['Price']; ?>">
                    <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                    <button type="submit" class="btn btn-warning" name="addCart">Add to cart</button>
                </form>
            </div>
        </div>
    </div>
    <?php }; ?>
</div>

</body>
</html>
