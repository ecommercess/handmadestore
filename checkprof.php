<?php
include 'Config.php';
$row = [];

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $select = mysqli_query($conn, "SELECT * FROM userdata WHERE id = $id");
    $row = mysqli_fetch_assoc($select);

    if (isset($row) && isset($row['Username'])) {
        
    } else {
       
    }
}
    
if(isset($_POST['update_info'])){
    $Username = $_POST['Username'];
    $Pass = $_POST['Pass'];
    $First = $_POST['First'];
    $Last = $_POST['Last'];
    $Middle = $_POST['Middle'];
    $Address = $_POST['Address'];
    $Contact = $_POST['Contact'];
    $Email = $_POST['Email'];
    $update = mysqli_query($conn, "UPDATE userdata SET Name = '$Username', Pass = '$Pass'
    , First = '$First' , Last = '$Last' , Middle = '$Middle' , Address = '$Address' , Contact = '$Contact' , Email = '$Email' WHERE id = $id");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Information</title>
    <style>
        .container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="password"],
input[type="email"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #45a049;
}
    </style>
</head>
<body>
<div class="container">
        <div class="admin-product-form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <h3>Edit your Information
                </h3>
                <input type="text" placeholder="Enter New Username" name="Username" class="box" value="<?php echo $row['Username']; ?>">
                <input type="text" placeholder="Enter New Password" name="Pass" class="box" value="<?php echo $row['Pass']; ?>">
                <input type="text" placeholder="Enter New First Name" name="First" class="box" value="<?php echo $row['First']; ?>">
                <input type="text" placeholder="Enter New Las Name" name="Last" class="box" value="<?php echo $row['Last']; ?>">
                <input type="text" placeholder="Enter New Middle Name" name="Middle" class="box" value="<?php echo $row['Middle']; ?>">
                <input type="text" placeholder="Enter New Address" name="Address" class="box" value="<?php echo $row['Address']; ?>">
                <input type="text" placeholder="Enter New Contact" name="Contact" class="box" value="<?php echo $row['Contact']; ?>">
                <input type="text" placeholder="Enter New Email" name="Email" class="box" value="<?php echo $row['Email']; ?>">
                <input type="submit" class="btn" name="update_info" value="Update Information">
            </form>
        </div>
    </div>
</body>
</html>

