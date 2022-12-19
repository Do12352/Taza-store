<?php
include 'connection.php';
$myquery= "select * from `products`  ";
$result= mysqli_query($con,$myquery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
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
    }
    ?>








    </body>
</html>