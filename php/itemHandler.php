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

    $pat_id = $_SESSION['login_user'];

    $op = mysqli_real_escape_string($con, $_POST['submit']);

    if(isset($_POST['p_id']) && isset($_POST['qty'])) {
      $p_id = mysqli_real_escape_string($con, $_POST['p_id']);
      $qty = mysqli_real_escape_string($con, $_POST['qty']);
    }

    if ($op == "add") {

      $select = "SELECT * FROM cart where p_id = $p_id";
      $r_query = mysqli_query($con, $select);

      if($row = mysqli_fetch_array($r_query, MYSQLI_ASSOC)) {
        $sql = "UPDATE cart SET qty = " . ($qty + $row['qty']) . " WHERE p_id = $p_id AND pat_id = '$pat_id'";
      }

      else {
        $sql = "INSERT INTO cart(pat_id, p_id, qty) VALUES ('$pat_id', $p_id, $qty)";
      }

      $res_id = $_POST['res_id'];

      if(mysqli_query($con, $sql)) {
        echo "Added";
        header("Location:../delivery.php?id=$res_id&cartResult=1");
      }
      else {
        $error = "\"" . mysqli_error($con) . "\"" ;
        echo "<script>console.log($error);</script>";
        header("Location:../delivery.php?id=$res_id&cartResult=-1");
      }

    }

    if ($op == "update") {

        $sql = "UPDATE cart SET qty = $qty WHERE p_id = $p_id AND pat_id = '$pat_id'";

        if(mysqli_query($con, $sql)) {
          echo "Updated";
          header("Location:../cart.php?cartResult=1");
        }
        else {
          $error = "\"" . mysqli_error($con) . "\"" ;
          echo "<script>console.log($error);</script>";
          header("Location:../cart.php?cartResult=-1");
        }

    }

    if ($op == "delete") {

        $sql = "DELETE FROM cart WHERE p_id = $p_id AND pat_id = '$pat_id'";

        if(mysqli_query($con, $sql)) {
          echo "Deleted";
          header("Location:../cart.php?cartResult=1");
        }
        else {
          $error = "\"" . mysqli_error($con) . "\"" ;
          echo "<script>console.log($error);</script>";
          header("Location:../cart.php?cartResult=-1");
        }

    }

    if ($op == "clear") {

        $sql = "DELETE FROM cart WHERE pat_id = '$pat_id'";

        if(mysqli_query($con, $sql)) {
          echo "Deleted";
          header("Location:../cart.php?cartResult=1");
        }
        else {
          $error = "\"" . mysqli_error($con) . "\"" ;
          echo "<script>console.log($error);</script>";
          header("Location:../cart.php?cartResult=-1");
        }

    }

    if ($op == "buy") {
        $sql = "SELECT sum(price * qty) as total FROM cart natural join product where pat_id = '$pat_id'";

        $r_query = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($r_query, MYSQLI_ASSOC);

        $total = $row['total'];

        $sql2 = "INSERT INTO delivery(pat_id, order_amount) VALUES ('$pat_id', $total)";


        if(mysqli_query($con, $sql2)) {
          echo "Deleted";
          header("Location:../cart.php?cartResult=1");
        }
        else {
          $error = "\"" . mysqli_error($con) . "\"" ;
          echo "<script>console.log($error);</script>";
          // header("Location:../cart.php?cartResult=-1");
        }

    }



  }

    mysqli_close($con);
    ?>
