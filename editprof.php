<?php

    require_once('session.php'); 
    if ($logged==false) {
         header("Location:index.php");
    }

// Check if the session variable is set and not empty
if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
    $uid = mysqli_real_escape_string($conn, $_SESSION['uid']); // Sanitize the session variable
} else {
    // Handle the case where the session variable is not set or empty
    echo "Error: User ID not found in session.";
}

if(isset($_POST['updateData'])){
    $Username = mysqli_real_escape_string($conn, $_POST['Username']);
    $First = mysqli_real_escape_string($conn, $_POST['First']);
    $Middle = mysqli_real_escape_string($conn, $_POST['Middle']);
    $Last = mysqli_real_escape_string($conn, $_POST['Last']);
    $Address = mysqli_real_escape_string($conn, $_POST['Address']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Contact = mysqli_real_escape_string($conn, $_POST['Contact']);

    // Enclose string values in single quotes
    $query = "UPDATE userdata SET Username = '$Username', First = '$First', Middle = '$Middle', Last = '$Last', Address = '$Address', Contact = '$Contact', Email = '$Email' WHERE id = $uid";
    $query_run = mysqli_query($conn, $query);

    // Check for errors
    if(!$query_run) {
        echo 'Error: ' . mysqli_error($conn);
    } else {
        echo 'Data updated successfully';
    }
}


//Displaying the Data in the input
$id = $_SESSION['uid'];
$result = mysqli_query($conn, "SELECT * FROM userdata WHERE id = '$id'");
$test = mysqli_fetch_array($result);

$username=$test['Username'];
$fname=$test['First'];
$middle=$test['Middle'];
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
    <title>Edit Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: pink;
            margin: 0;
            padding: 0;
            align-items: center;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            align-items: center;
        }
        h2 {
            margin-top: 0;
            text-align: center;
            color: #333;
            padding-left: 38px;
        }
        form {
            margin-top: 20px;
            width: 500px;
            position: relative;
            align-items: center;
            text-align: center;
            padding-left: 32%;
        }
        .post{
            align-items: center;
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        p {
            text-align: start;
            margin-top: 20px;
            width: 300px;
        }
        a {
            color: #007bff;
            text-decoration: none;
            padding-top: 20px;
            font-size: 20px;
            color: black;
            position: inherit;
            text-align: start;
            width: 300px;
    
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<body>
    <p><a href="index.php">Back to Dashboard</a></p>
    <h2>Edit Profile</h2>
    <form method="post" action="editprof.php">
        <label for="Username">Username:</label><br>
        <input type="text" id="Username" name="Username" value="<?php echo $username; ?>"><br>
        <label for="First">First Name:</label><br>
        <input type="text" id="First" name="First" value="<?php echo $fname; ?>"><br>
        <label for="Middle">Middle Name:</label><br>
        <input type="text" id="Middle" name="Middle" value="<?php echo $middle; ?>"><br>
        <label for="Last">Last Name:</label><br>
        <input type="text" id="Last" name="Last" value="<?php echo $lname; ?>"><br>
        <label for="Address">Address:</label><br>
        <input type="text" id="Address" name="Address" value="<?php echo $address; ?>"><br>
        <label for="Contact">Contact:</label><br>
        <input type="number" id="Contact" name="Contact" value="<?php echo $contact; ?>"><br>
        <label for="Email">Email:</label><br>
        <input type="text" id="Email" name="Email" value="<?php echo $email; ?>"><br>
        <input type="submit" value="Submit" name="updateData">
    </form>
</body>
</html>
