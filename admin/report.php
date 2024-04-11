
<?php
session_start();
require '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <!-- <link rel="stylesheet" href="styles/style.css"> -->
</head>
<body>
    <div class="container-form">
        <a href="home.php">back</a>
        <form action="" method="POST">
            <h3>View Operation Report</h3>
            <hr>
            <p>
                <label for="">Operation-Type</label><br>
                <select name="type">
                    <option value="all"></option>
                    <option value="in">Import</option>
                    <option value="out">Export</option>
                </select>
            </p>
        <p>
            <label for="">Date</label><br>
            <input type="date" name="date">
        </p>
        <p>
            <label for="">From</label><br>
            <input type="date" name="date1">
        </p>
        <p>
            <label for="">To</label><br>
            <input type="date" name="date2">
        </p>
    
        <input type="submit" name="view_report" value="View Report">
    </form>
  </div>  <hr>
  <?php
  $query="SELECT * from stock,operation where stock.id=operation.id";
  $execute=mysqli_query($connect,$query);
  if(isset($_POST['view_report'])){
    $date=$_POST['date'];
    $date1=$_POST['date1'];
    $date2=$_POST['date2'];
    $type=$_POST['type'];

  }

  ?>
  <div class="table-display">
    <table width="100%" border="1">
    <tr>
            <th colspan="100">
                <span>Stock Opertion Movement</span>
                <a href="report-pdf.php" target="_target"><button>Generate Report-pdf</button></a>
        </th>
    </tr>
        <tr>
            <th>#</th>
            <th>operation</th>
            <th>Date</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php
        while($report=mysqli_fetch_array($execute)){
            ?>
            <tr>
            <th><?php echo $no;?></th>
            <th><?php echo $report['type']?></th>
            <th><?php echo $report['date']?></th>
            <th><?php echo $report['name']?></th>
            <th><?php echo $report['price']?></th>
            <th><?php echo $report['quantity']?></th>
        </tr>
        <?php
        }
        ?>
    </table>

  </div>
</body>
</html>