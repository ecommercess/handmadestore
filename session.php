<?php  
    include('Config.php');
    session_start();
    $logged = false;
    
    if(isset($_SESSION['logged']))
    {
        if ($_SESSION['logged'] == true)
        {
            $logged = true ;
            $username = $_SESSION['username'];
        }
    }
    else
        $logged=false;

    if($logged != true)
    {
        $username = "";
        if (isset($_POST['username']) && isset($_POST['pass']))
        {
            $username=$_POST['username'];
            $password=$_POST['pass'];            
              
            
            $sql = "SELECT * FROM userdata WHERE username='$username' AND Pass='$password' ";

            $result = mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);

            if ($count == 1) {
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                $_SESSION['logged']=true;
                $_SESSION['username'] = $username;
                $_SESSION['uid']=$row['id'];
                $_SESSION['account']="user";
                header("Location:index.php");
            }
            else
                {

            echo "<script>
            alert('Invalid User!');
            window.location.href='login.php';
            </script>";
                }
        }
    }
?>