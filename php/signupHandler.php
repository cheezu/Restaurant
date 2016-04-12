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

  $pwdmd5 = md5($pwd);

$sql="INSERT INTO USER (pat_id, password, pat_name, pat_bday, pat_mail, pat_phone, pat_addr) VALUES ('$user', '$pwdmd5', '$name', '$dob', '$mail', '$phone', '$addr')";

if(mysqli_query($con, $sql)) {
  echo "Added";
  header("Location:../home.php?signupResult=1");
}
else {
  $error = "\"" . mysqli_error($con) . "\"" ;
  echo "<script>console.log($error);</script>";
  header("Location:../home.php?signupResult=-1");
}

mysqli_close($con);
?>
