<?php
include 'Connection.php';
if(isset($_POST['name']))
{
    $uname = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $msg = $_POST['message'];
    $s = "select * from `users` where Name = '$uname'";
    
    $res =mysqli_Query($con,$s);
    $num=mysqli_num_rows($res);
    if($num ==1)
    {
        echo "Username Already Taken";
    }
    else
    {
        $reg="insert into `users`(Name, Email, password,Message)values('$uname','$email','$password','$msg')";
        mysqli_query($con, $reg);
        echo"Regester Successfully";
    }
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>booking Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: floralwhite">
<nav style="position: fixed">
    <div class=menu>
        <div class="logo">
            <a href="#">TazaBakery</a>
        </div>
        <ul>
            <li><a href="index.html">Home</a> </li>
            <li><a href="#">Menu</a> </li>
            <li><a href="contact.html">Contact</a> </li>
            <li><a href="Booking.php">Book a table</a> </li>
        </ul>
    </div>
</nav>
<div class="container first_half">
    <h2>
        Book A Table
    </h2>
    <p> Whatever the occasion, we’re certain that you can make it special at TAZA Bakery. </p>
        <form class="form" method="post">
            <label for="Name"><b>Name</b> </label>
            <input type="text" name="name" id="fname" required>
            <label for="email"><b>Email</b> </label>
            <input type="text"  name="email"  id="email" required>
            <label for="pass"><b>Password</b> </label>
            <input type="password" name="pass"  id="pass" required>
            <label for="message"><b>Message</b> </label>
            <input type="text" name="message"  id="msg" required>
            <button data-v-2f409ee5="" data-v-b3d4fae2="" type="submit" name="submit" class="btn">Submit</button>
        </form>
    </div>
<div style="border-radius:.5em" class="second_half ">
    <img src="imgs/bakery.jpg" height="700" width="1280"/>
</div>
</body>
</html>

