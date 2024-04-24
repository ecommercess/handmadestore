<!DOCTYPE html>
<html>
<head>
    <title>Create New User</title>
    <link rel="stylesheet" type="text/css" href="Login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <style>

    body{
        font-family: "Lora", serif;
        background: radial-gradient(pink, white);
    }

    button[type="submit"] {
        height: 50px;
        background-color: #9B3922;
        color: #fff;
        border-radius: 25px;
    }

    button[type="submit"]:hover {
        background-color: black;
        color: white;
        border-radius: 25px;
    }

    label{
        font-weight: bold;
    }

    .container{
        margin-left: 35%;
        width: 30%;
        align-items: center;
        text-align: center;
    }
    .form input{
        width: 250px;
        height: 30px;
        border-radius: 25px;
        text-align: center;
    }
    .back-link a{
        text-decoration: none;
        background-color: #9B3922;
        padding-left: 20%;
        padding-right: 20%;
        padding-top: 1%;
        padding-bottom: 1%;
        color: #Fff;
        border-radius: 25px;
        transition: 200ms;
    }

    .back-link a:hover{
        text-decoration: none;
        background-color: #795458;
        padding-left: 20%;
        padding-right: 20%;
        padding-top: 1%;
        padding-bottom: 1%;
        color: #000;
    }


    .container button:hover{
        width: 250px;
        color: #000;
    }

    .container button{
        width: 250px;
    }
    .back-link a{
        border: 2px solid black;
    }
    </style>

</head>

<body>
<div class="container">
        <form action="addnew.php" method="post" class="form">
        <h2>Create New User</h2><br><br>
        <label>User Name</label><br>
        <input type="text" name="Username" required><br><br>
        <label>Password</label><br>
        <input type="text" name="Pass" required><br><br>
        <label>First Name</label><br>
        <input type="text" name="First" required><br><br>
        <label>Last Name</label><br>
        <input type="text" name="Last" required><br><br>
        <label>Middle Name</label><br>
        <input type="text" name="Middle"><br><br>
        <label>Address</label><br>
        <input type="text" name="Address" required><br><br>
        <label>Contact Number</label><br>
        <input type="number" name="Contact" required><br><br>
        <label>Gmail Account</label><br>
        <input type="email" name="Email" required><br><br>
            <button type="submit" >Add User</button><br><br>
            <div class="back-link">
        <a href="login.php">Back</a>
    </div>
        </form>

</body>

</html>