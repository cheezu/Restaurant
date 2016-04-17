<?php

  $con=mysqli_connect("localhost", "root", "dbproject", "db_proj");

  if (!$con) {
      echo "Error: Unable to connect to MySQL." . PHP_EOL;
      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      exit;
  }

    session_start();

$res_id = mysqli_real_escape_string($con, $_POST['res_id']);
$user = mysqli_real_escape_string($con, $_SESSION['login_user']);
$ambience = mysqli_real_escape_string($con, $_POST['ambience']);
$res_serv = mysqli_real_escape_string($con, $_POST['res_serv']);
$food_qual = mysqli_real_escape_string($con, $_POST['food_qual']);
$vfm = mysqli_real_escape_string($con, $_POST['vfm']);
$review = mysqli_real_escape_string($con, $_POST['review']);


$sql="INSERT INTO RATING (res_id, pat_id, ambience, service, fq, vfm, review) VALUES ('$res_id', '$user', '$ambience', '$res_serv', '$food_qual', '$vfm', '$review')";

  if(mysqli_query($con, $sql)) {
    echo "Added";
    header("Location:../restaurant.php?id=$res_id&rateResult=1");
  }
  else {
    $error = "\"" . mysqli_error($con) . "\"" ;
    echo "<script>console.log($error);</script>";
    header("Location:../restaurant.php?id=$res_id&rateResult=-1");
  }

  mysqli_close($con);
  ?>
