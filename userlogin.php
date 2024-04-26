<?php
session_start();
include "Config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['Username']) && isset($_POST['Pass'])) {
        $Username = $_POST['Username'];
        $Password = $_POST['Pass'];

        
        $sql = "SELECT * FROM userdata WHERE Username = '$Username'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            
            if (password_verify($Password, $row['Pass'])) {
                
                $_SESSION['Username'] = $row['Username'];
                
                header("Location: Index.php");
                exit();
            } else {
                
                echo "<script>alert('Invalid username or password');</script>";
            }
        } else {
           
            echo "<script>alert('Invalid username or password');</script>";
        }
    } else {
       
        echo "<script>alert('Please enter username and password');</script>";
    }
}
?>
