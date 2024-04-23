<?php

$sname = 'localhost';

$unmae= 'root';
$password = '';
$db_name = 'cart_db';

//$unmae= 'u232113837_';
//$password = '?Op6pDIp';
//$db_name = 'u232113837_card_db';


$conn = mysqli_connect($sname, $unmae, $password, $db_name);
$con = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}

?>

