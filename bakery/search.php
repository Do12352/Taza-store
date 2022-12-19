<?php
include "connection.php";
if(isset($_POST['btnSearch']))
{
$sch= $_POST['src'];

$myquery = "SELECT * FROM `products` where Name like '%$sch%'";
$result = mysqli_query($con, $myquery);


if(isset($_POST['btnSort']))
{
$sch= $_POST['sort'];
if($sch == "high")
{
$myquery = "SELECT * FROM `products` order by price desc";
$result = mysqli_query($con, $myquery);
}
else if($sch == "low") {
    $myquery = "SELECT * FROM `products` order by price Asc";
    $result = mysqli_query($con, $myquery);
} } }
    ?>
