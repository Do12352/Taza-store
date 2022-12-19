<?php
include 'connection.php';
$myquery= "select * from `products`  ";
$result= mysqli_query($con,$myquery);
?>
<?php
    while($row = mysqli_fetch_array($result))
{
    ?>
<!--<div class="col-lg-4 col-sm-4">
    <div class="box_main">
        <h4 class="shirt_text"><?php echo $row['Name'];?></h4>
        <p class="price_text">Price <span style="color:beige;"> $?></span></p>
        <div class ="tshirt_img"><img src="imgs/"><?php echo $row['img'];?>'></div>
        <div> class="btn_main">
            <div class="buy_bt"><a href="#">Buy Now</a></div>
            <div class="seemore_bt"><a href="#">See More</a></div>
        </div> </div> </div> }-->


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Menu Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/menu.css">
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
<nav style="position: relative">
    <div class=menu>
        <div class="logo">
            <a href="#">TazaBakery</a>
        </div>
        <ul>
            <li><a href="index.html">Home</a> </li>
            <li><a href="Menu.php">Menu</a> </li>
            <li><a href="contact.html">Contact</a> </li>
            <li><a href="Booking.php">Book a table</a> </li>
        </ul>
    </div>
</nav>
<div id="search">
    <form method="post"> <input type="text" name="src" placeholder="search" size="60" required>
        <button name="btnSearch"> Go </button>
    </form>
    <?php
    if(isset($_POST['btnSearch'])){
        $sch=$_POST['src'];
        $myquery="select * from `products` where Name like '%$sch%'";
        $result=mysqli_query($con,$myquery);
    }
    ?>
</div>





<form id="right" method="post"> <label> Sort By:</label>
    <select style="margin: 20px" name="sort" required>
        <option style="margin: 20px"> --Select Option-- </option>
        <option value="low"> Price: Low to High </option>
        <option value="high"> Price: High to Low </option>
        <option> category: </option>
    </select>
    <input type="submit" Value="Sort_Your_Products" name="btn2">
</form> <br><br><br><br>
<?php
if(isset($_POST['btn2'])){
    $sch= $_POST['sort'];
    if($sch == "high")
    {
        $myquery = "SELECT * FROM `products` order by price desc";
        $result = mysqli_query($con, $myquery);
    }
    else if($sch == "low")
    {
        $myquery = "SELECT * FROM `products` order by price Asc";
        $result = mysqli_query($con, $myquery);
    }
    else{
        $myquery = "SELECT * FROM `products` order by category Asc";
        $result = mysqli_query($con, $myquery);

    }

}



?>

<?php
while ($row=mysqli_fetch_array($result)){
    ?>
    <div style="display: inline-block" class="btngan">
        <div style="width: 600px" class="card">
            <img src=" images/<?php echo $row['image'];?>">

            <h4 class="shirt text"><?php echo $row['name'] ;?> </h4>
            <p class="pricetext	"><?php echo $row['category'];?>   </p>
            <p class="pricetext	"><?php echo $row['description'];?>   </p>
            <p class="pricetext	"><?php echo $row['price'];?>   </p>




        </div>
    </div>
    <?php
} }
?>

</body>
</html>
