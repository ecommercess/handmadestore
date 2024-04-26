<?php

require_once('session.php');
if ($logged == false) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MY CART</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn {
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  border: none;
  border-radius: 5px;
  color: #fff;
}

.btn-primary {
  background-color: brown;
}

.btn:hover {
  background-color: black;
}
.row row-cols-1 row-cols-md-3 g-4{
    padding: 30px;
}
a{
    text-decoration: none;
    color: black;
    padding-left: 10px;
    padding-top: 8px;
    border: 2px solid peru;
    border-radius: 4px;
    background-color: peru;
    padding-right: 10px;
    font-size: 30px;
}
a:hover{
    background-color:black ;
    color: white;

}

        </style>
</head>
<body>
<a href="add_tocart.php">Back</a>

<h1 class="text-center">MY CART</h1>
<form method="post" action="checkout.php">
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
    $uid = $_SESSION['uid'];
    $sql = "SELECT * FROM tbl_cart WHERE uid = $uid";
    $products = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($products)) {
    ?>
        <div class="col">
            <div class="card h-100">
                <img src="uploads_img/<?php echo $row['img_path']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                    <p class="card-text"><?php echo $row['product_desc']; ?></p>
                    <input type="hidden" name="product_name[]" value="<?php echo htmlspecialchars($row['product_name']); ?>">
                    <input type="number" name="quantity[]" min="1" value="1" class="form-control">
                    <input type="hidden" name="unit_price[]" value="<?php echo $row['product_price']; ?>">
                    <p>Price: ₱ <?php echo $row['product_price']; ?></p>
                    <button formaction="remove_from_cart.php?product_id=<?php echo $row['id']; ?>" class="btn btn-danger">Remove</button>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
    </div>
</form>
</body>
</html>
