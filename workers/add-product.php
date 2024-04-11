<?php
session_start();
require("../connection.php");
if(!isset($_SESSION['user'])){
header("location:../login.php");
}
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
            <h3>Add New Product Here</h3>
            <hr>
            <p>
                <label for="">Product Name</label><br>
                <input type="text" name="name">
            </p>
            <p>
                <label for="">Product Price</label><br>
                <input type="number" name="price">
            </p>
            <p>
                <input type="submit" name="add_product">
            </p>
        </form>
    </div>
    <?php
    if(isset($_POST['add_product'])){
        $name=$_POST['name'];
        $price=$_POST['price'];

        if($name==""){
            echo "Product Name is Required!";
        }
        else{
            if($price==""){
                $price=0;
            }
            $check_product="SELECT * from stock where name='$name'";
            if(mysqli_num_rows(mysqli_query($connect,$check_product))>0){
                echo "Product Already Added!";
            }
            else{

                $query="INSERT into stock values(null,'$name','$price',0)";
                $execute=mysqli_query($connect,$query);
                if($execute){
                    echo "success";
                }
            }
        }
        
       
    }
    ?>
</body>
</html>