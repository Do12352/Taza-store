<?php
include 'Connection.php';
if(isset($_POST['submit']))
{
    $file=$_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName= $_FILES['file']['tmp_name'];
    $fileSize= $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));
    $fileNameNew = uniqid('', true).".".$fileActualExt;
    $fileDestination = 'images/'.$fileNameNew;
    move_uploaded_file($fileTmpName,$fileDestination);

    $name = $_POST['name'];
    $cat = $_POST['category'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $qu = "insert into `products` (name, category, description, price, image) values('$name','$cat' ,'$desc', '$price','$fileNameNew')";
    mysqli_query($con, $qu);
    echo "Added Successfully";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<form class="form"  method="post" enctype="multipart/form-data">
<label>Select  Product Name:</label>
<input type="text" name="name">
<label>Select  Product category:</label>
<input type="text" name="category">
<label>Select  Product description:</label>
<input type="text" name="description">
<label>Select  Product Price:</label>
<input type="text" name="price">

<input type="file" name="file">
<input type="submit" name="submit" value="Upload">
</form>

</form>

</body>
</html>
