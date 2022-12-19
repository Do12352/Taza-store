<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bakery";

$con = mysqli_connect($servername,$username,$password,$dbname);



/**if (!$con)
{
    die("connectionfailed: " .$con->connect_error);
}
else{
    echo "connection_sucess";}
?>**/