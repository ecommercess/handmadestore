<?php

    require_once('session.php'); 
    if ($logged==false) {
         header("Location:index.php");
    }


$id = $_SESSION['uid'];
$result = mysqli_query($conn, "SELECT * FROM userdata WHERE id = '$id'");
$test = mysqli_fetch_array($result);

$username=$test['Username'];
$fname=$test['First'];
$lname=$test['Last'];
$contact=$test['Contact'];
$address=$test['Address'];
$email=$test['Email'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <!-- You can include CSS styles here -->
</head>
<body>
    <h1>User Information</h1>

    <table border="1">
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>

        <tr>
            <td>Username</td>
            <td><?php echo $username; ?></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><?php echo $fname; ?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?php echo $lname; ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo $address; ?></td>
        </tr>
        <tr>
            <td>Contact</td>
            <td><?php echo $contact; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $email; ?></td>
        </tr>
    </table>
</body>
</html>