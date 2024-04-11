<?php
session_start();
require("../connection.php");
if(!isset($_SESSION['user'])){
header("location:../login.php");
}
$pid=$_GET['pid'];
$query_data="SELECT * from stock where id='$pid'";
$execute_data=mysqli_query($connect,$query_data);
$user_data=mysqli_fetch_array($execute_data);
$ex_name=$user_data['name'];
$ex_price=$user_data['price'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <div class="container-form">
        <a href="home.php">back</a>
        <form action="" method="POST">
            <h3>Update Product Here</h3>
            <hr>
            <p>
                <label for="">Product Name</label><br>
                <input type="text" name="name" value="<?php echo $ex_name?>">
            </p>
            <p>
                <label for="">Product Price</label><br>
                <input type="number" name="price" value="<?php echo $ex_price?>">
            </p>
            <p>
                <input type="submit" name="update_product">
            </p>
        </form>
    </div>
    <?php
    if(isset($_POST['update_product'])){
        $name=$_POST['name'];
        $price=$_POST['price'];
        if($name===""){
            echo "Name of Product is required!";
        }
        else{
            if($price==""){
                $price=0;
            }
            $query_update="UPDATE stock set name='$name',price='$price'";
            $execute=mysqli_query($connect,$query_update);
            if($execute){
                header("location:home.php");
            }
        }

    }
    ?>
</body>
</html>