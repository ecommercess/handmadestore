<?php 
require_once("Config.php");
require_once("session.php");

if(isset($_SESSION['logged']))
{
    if ($_SESSION['logged'] == true)
    {
        if ($_SESSION['account']=="user") {
                header("Location:index.php");
            }
    }  
    else  {
        header("Location:../index.php");
      }  
}

if(isset($_POST['login_submit'])) {
    if(!(isset($_POST['username']))) {
        if(!(isset($_POST['pass']))) {
            location('index.php');    
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Log.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <title>LOGIN</title>

    <style>
    .lora-<uniquifier> {
      font-family: "Lora", serif;
      font-optical-sizing: auto;
      font-weight: <weight>;
      font-style: normal;
    }

    button[type="submit"] {
        background-color: pink;
        color: white; 
        padding: 10px 15px;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        display: block; 
        margin: auto;
        border: 2px solid black;
        
    }


    body{
        font-family: "Lora", serif;
        background: radial-gradient(pink, white);
    }
    a {
        display: inline-block;
        padding: 10px 15px;
        background-color: white;
        color: black;
        text-decoration: none;
        border-radius: 5px;
    }

    a:hover {
        background-color: grey;
        color: white; 
    }label {
        color:black
        font-size: 18px;
        padding: 10px;
        display: block;
    }
    .container{
        background-size: cover;
    }

    .wrapper{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .welcome img{
        display: block;
        margin: 0 auto;
    }
    .welcome h1{
        text-align: center;
        font-size: 30px;

    }
    .form{
        border-radius: 2px;
        padding-top: 3%;
        padding-left: 50px;
        text-align: center;
        padding-right: 6%;
        padding-bottom: 20px;
        
    }


    .form input{
        width: 250px;
        height: 30px;
        border-radius: 25px;
        text-align: center;
    }

    .form button{
        background-color: #9B3922;
    }

    .form button:hover{
        background-color: white;
        color: #000;
    }

    .create a{
        text-align: center;
        background-color: #9B3922;
        color: #fff;
        transition: 200ms;
        border-radius: 20px;
        border: 2px solid black;
    }

    .create a:hover{
        text-align: center;
        background-color: #fff;
        color: #000;
        font-weight: bold;
    }

    label{
        font-weight: bold;
    }

        </style>

</head>
<body>
    
<div class="wrapper">
    <div class="container">
        <form action="login.php" method="post" class="login-form">
            <div class= "form">
                <img src="Logo.png" alt="Logo" width="160px"><br>
                <h1>Welcome to <strong>HANDMADE TREASURESTORE</strong></h1>
            <label>Username</label>
            <input type="text" name="username" required placeholder="User Name"><br>
            <label>Password</label>
            <input type="password" name="pass" required placeholder="Password"><br>
            <br>
            <button type="submit" name="login_submit">Login</button><br>
        </form>
        <div class="create">
        <a href="New.php">Create New User</a>
    </div>
    
</div>
    </div>
</div>


</body>
</html>