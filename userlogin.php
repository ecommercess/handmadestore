<?php
session_start();
include "Config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are provided
    if (isset($_POST['Username']) && isset($_POST['Pass'])) {
        $Username = $_POST['Username'];
        $Password = $_POST['Pass'];

        // Query to check if username and password match
        $sql = "SELECT * FROM userdata WHERE Username = '$Username'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Verify password
            if (password_verify($Password, $row['Pass'])) {
                // Set session variable to store user's name
                $_SESSION['Username'] = $row['Username'];
                // Redirect to homepage
                header("Location: Index.php");
                exit();
            } else {
                // Invalid password
                echo "<script>alert('Invalid username or password');</script>";
            }
        } else {
            // Invalid username
            echo "<script>alert('Invalid username or password');</script>";
        }
    } else {
        // Username or password not provided
        echo "<script>alert('Please enter username and password');</script>";
    }
}
?>
