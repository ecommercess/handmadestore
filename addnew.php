<?php
session_start();
include "Config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username= $_POST['Username'];
    $Pass = $_POST['Pass'];
    $First = $_POST['First']; 
    $Last = $_POST['Last'];   
    $Middle = $_POST['Middle']; 
    $Address = $_POST['Address'];
    $Contact = $_POST['Contact'];
    $Email = $_POST['Email'];

 
    $sql = "INSERT INTO userdata (Username, Pass, First, Last, Middle, Address, Contact, Email)
    VALUES ('$Username', '$Pass', '$First', '$Last', '$Middle', '$Address', '$Contact', '$Email')";

    if (mysqli_query($conn, $sql)) {
        header("Location: Login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        exit();
    }
} else {
    header("Location: Login.php");
    exit();
}


?>
