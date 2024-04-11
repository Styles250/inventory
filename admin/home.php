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
    <script src="../scripts/jquery-3.6.0.js"></script>
    <script src="../scripts/home.js"></script>
</head>
<body>
   <div class="menu">
    <ul>
        <li>
            <a href="add-employee.php">Add Employee</a>
        </li>
        <li>
            <a id="" href="home.php">Stock</a>
        </li>
        <li>
            <a id="report" href="report.php">Report</a>
        </li>
        <li>
            <a id="" href="../logout.php">Logout</a>
        </li>
    </ul>
   </div>
   <div class="display_table">
    <?php
    $id=12;
    $query="SELECT * from stock";
    $_SESSION['session_query']=$query;
    ?>
    <table border="1" width="100%">
        <tr>
            <th colspan="100">
                <span>Available Stock</span>
                <a href="stock-pdf.php" target="_target"><button>Generate Report-pdf</button></a>
                <a href="sample-pdf.php" target="_target"><button>Sample Report-pdf</button></a>
        </th>
    </tr>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total-Price</th>
    </tr>
    <?php
        $execute=mysqli_query($connect,$query);
        $no=1;
        $total_value=0;
        while($stock=mysqli_fetch_array($execute)){
            $total_price=$stock['price']*$stock['quantity'];
            ?>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $stock['name'];?></td>
                <td><?php echo $stock['price'];?> Rwf</td>
                <td><?php echo $stock['quantity'];?></td>
                <td><?php echo ($total_price);?> Rwf</td>
            </tr>
            <?php
            $total_value=$total_value+$total_price;
            $no++;
        }
        ?>
        <tr>
            <th colspan="3">total-Stock-Value</th>
            <th colspan="2"><?php echo $total_value;?> Rwf</th>
        </tr>
    </table>
   </div> 
</body>
</html>