<?php
session_start();
include("Config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $_POST['Username'];
    $Pass = $_POST['Pass'];

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query
    $sql = "SELECT * FROM userdata WHERE Username = '$Username' AND Pass = '$Pass'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Correct username and password
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $Username;
        $_SESSION['id'] = $id;
        header("Location: Index.php");
    } else {
        echo "<script>
        alert('Invalid Username and Password!');
        window.location.href='login.php';
        </script>";
    }

    $conn->close();
}
?>

