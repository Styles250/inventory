<?php
session_start();
require("../connection.php");
if(!isset($_SESSION['user'])){
header("location:../login.php");
}
if(!isset($_GET['pid'])){
    header("location:home.php");
}
$pid=$_GET['pid'];
$query_data="SELECT * from stock where id='$pid'";
$execute_data=mysqli_query($connect,$query_data);
$product_data=mysqli_fetch_array($execute_data);
$ex_name=$product_data['name'];
$ex_price=$product_data['price'];
$ex_quantity=$product_data['quantity'];
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
            <h3>Export Product Here</h3>
            <hr>
            <p>
                <label for="name">Product Name</label><br>
                <input readonly type="text" name="name" value="<?php echo $ex_name?>" >
            </p>
            <p>
                <label for="">Product Price</label><br>
                <input readonly type="number" name="price" value="<?php echo $ex_price?>" >
            </p>
            <p>
                <label for="">Date</label><br>
                <input type="date" name="date">
            </p>
            <p>
                <label for="">Quantity</label><br>
                <input type="number" name="quantity">
            </p>
            <p>
                <input type="submit" name="export_product">
            </p>
        </form>
    </div>
    <?php
    if(isset($_POST['export_product'])){
        $quantity=$_POST['quantity'];
        $date=$_POST['date'];
        // move export
        if($quantity==""){
            echo "quantity is required";
        }
        else{
            if($ex_quantity<$quantity){
                echo "Failed, Possible max-quantity is (".$ex_quantity.")";
            }
            else
            {
                $query_update_stock="UPDATE stock set quantity=(quantity-$quantity) where id='$pid'";
                $execute_update=mysqli_query($connect,$query_update_stock);
            if($execute_update){
                $query_record="INSERT into operation values(null,'out','$pid','$quantity','$date')";
                $execute_record=mysqli_query($connect,$query_record);
                if($execute_record){
                    header("location:home.php");
                } 
            }
            }
        }
        

    }
    ?>
</body>
</html>