
<?php
session_start();
require '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <!-- <link rel="stylesheet" href="styles/style.css"> -->
</head>
<body>
  <div class="container-form">
    <a href="home.php">back</a>
    <form action="" method="POST">
        <h3>Add An Employee Here</h3>
        <hr>
        <p>
            <label for="">Names</label><br>
            <input type="text" name="names">
        </p>
        <p>
            <label for="">Email</label><br>
            <input type="email" name="email">
        </p>
        <p>
            <label for="">Password</label><br>
            <input type="password" name="password">
        </p>
        <input type="submit" name="add_empo">
    </form>
  </div>  
  <?php
  if(isset($_POST['add_empo'])){
      $email=$_POST['email'];
      $names=$_POST['names'];
      $password=$_POST['password'];
    if($names==""){
        echo "User's Names Are Required!";
    }
    else if($password==""){
        echo "Password Can't Be Empty!";
    }
    else{
        $query="INSERT into users values(null,'$names','employee','$email','$password')";
        $execute=mysqli_query($connect,$query);
        if($execute){
            echo "Success .";
        }
       

    }

    
  }
  ?>
</body>
</html>