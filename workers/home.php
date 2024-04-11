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
    <title>Document</title>
</head>
<body>
<div class="menu">
    <ul>
        <li>
            <a href="add-product.php">Add Product</a>
        </li>
        <li>
            <a href="../logout.php">Logout</a>
        </li>
    </ul>
   </div> 
   <div class="table-display">
    <table width="100%" border="1">
        <thead>
            <tr>
            <th>#</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total-Price</th>
            <th>Action</th>
            </tr>
        </thead>
        <?php
        $query="SELECT * from stock";
        $execute=mysqli_query($connect,$query);
        while($product=mysqli_fetch_array($execute)){
            ?>
            <tr>
            <td><?php echo $product['id'];?></td>
            <td><?php echo $product['name'];?></td>
            <td><?php echo $product['quantity'];?></td>
            <td><?php echo $product['price'];?></td>
            <td><?php echo ($product['quantity']*$product['price']);?></td>
            <td>
                <a href="delete-product.php?pid=<?php echo $product['id'];?>" onclick="return confirm('Are sure about deleting <?php echo $product['name']?>?')">delete</a>
                <a href="stockin.php?pid=<?php echo $product['id'];?>">import</a>
                <a href="stockout.php?pid=<?php echo $product['id'];?>">export</a>
            </td>
            </tr>
            <?php

        }
        ?>
    </table>
   </div>
</body>
</html>