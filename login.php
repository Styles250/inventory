
<?php
session_start();
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Page</title>
    <!-- <link rel="stylesheet" href="styles/style.css"> -->
</head>
<body>
  <div class="container-form">
    <form action="" method="POST">
        <h3>Login Here</h3>
        <hr>
        <p>
            <label for="">Email</label><br>
            <input type="email" name="email">
        </p>
        <p>
            <label for="">Password</label><br>
            <input type="password" name="password">
        </p>
        <input type="submit" name="login">
    </form>
  </div>  
  <?php
  if(isset($_POST['login'])){
    $password=$_POST['password'];
    $email=$_POST['email'];
    
    $check_email="SELECT * from users where email='$email'";
    $execute=mysqli_query($connect,$check_email);
    if(mysqli_num_rows($execute)==0){
        echo "Account Not Found!";
    }
    else{
        $check_all="SELECT * from users where email='$email' and password='$password'";
        $execute=mysqli_query($connect,$check_all);
        if(mysqli_num_rows($execute)==0){
            echo "Incorrect Password!";
        }
        else{
            $user_info=mysqli_fetch_array($execute);
            $user_id=$user_info['id'];
            $role=$user_info['role'];
            $_SESSION['user']=$user_id;
            if($role=="admin"){
                header("location:admin/home.php");
            }
            else{
                header("location:workers/home.php");
            }
        }
    }
  }
  ?>
</body>
</html>