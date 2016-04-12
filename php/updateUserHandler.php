<?php

  $con=mysqli_connect("localhost", "root", "dbproject", "db_proj");

  if (!$con) {
      echo "Error: Unable to connect to MySQL." . PHP_EOL;
      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      exit;
  }

  $user = mysqli_real_escape_string($con, $_POST['user']);
  $pwd = mysqli_real_escape_string($con, $_POST['pwd']);
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $dob = mysqli_real_escape_string($con, $_POST['dob']);
  $mail = mysqli_real_escape_string($con, $_POST['mail']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $addr = mysqli_real_escape_string($con, $_POST['addr']);

  if(!empty($pwd)) {

    $pwdmd5 = md5($pwd);
    $sql="UPDATE USER SET password='$pwdmd5', pat_name='$name', pat_bday='$dob', pat_mail='$mail', pat_phone='$phone', pat_addr='$addr' WHERE pat_id='$user'";
  }

  else {
      $sql="UPDATE USER SET pat_name='$name', pat_bday='$dob', pat_mail='$mail', pat_phone='$phone', pat_addr='$addr' WHERE pat_id='$user'";
  }

  if(mysqli_query($con, $sql)) {
    echo "Added";
    header("Location:../user.php?updateResult=1");
  }
  else {
    $error = "\"" . mysqli_error($con) . "\"" ;
    echo "<script>console.log($error);</script>";
    header("Location:../user.php?updateResult=-1");
  }

  mysqli_close($con);
?>
