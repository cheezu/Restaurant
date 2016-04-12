<?php

  $con=mysqli_connect("localhost", "root", "dbproject", "db_proj");

  if (!$con) {
      echo "Error: Unable to connect to MySQL." . PHP_EOL;
      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      exit;
  }
  if (!isset($_SESSION['login_user'])) {
    session_start();

    $user = mysqli_real_escape_string($con, $_POST['user']);
    $pwd = mysqli_real_escape_string($con, $_POST['pwd']);
    $pwdmd5 = md5($pwd);

    $sql = "SELECT * FROM user WHERE pat_id = '$user' and password = '$pwdmd5'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count= mysqli_num_rows($result);

    if($count == 1) {
      $_SESSION['login_user'] = $user;
      header("location: ../home.php?loginResult=1");
    }else {
      $error = "Your Login Name or Password is invalid";
      echo $error;
    }
  }


mysqli_close($con);
?>
