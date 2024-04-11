<?php
include "../connection.php";
if(!isset($_GET['pid'])){
    header("location:home.php");
}
$pid=$_GET['pid'];
$query="DELETE from stock where id='$pid'";
$execute=mysqli_query($connect,$query);
if($execute){
    header("location:home.php");
}
?>