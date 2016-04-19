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
        $sql = "SELECT sum(price * qty) as total FROM cart natural join product where pat_id = '$pat_id'";  //Get the total amount

        $r_query = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($r_query, MYSQLI_ASSOC);
        $total = $row['total'];

        $sql2 = "INSERT INTO delivery(pat_id, order_amount, order_datetime) VALUES ('$pat_id', $total, CURRENT_TIMESTAMP)";  //create order entry

        if(mysqli_query($con, $sql2)) {

          $sql3="SELECT * FROM delivery WHERE pat_id = '$pat_id' order by order_id desc";   //get order id
          $r_query = mysqli_query($con, $sql3);
          $row = mysqli_fetch_array($r_query, MYSQLI_ASSOC);
          $order_id =  $row['order_id'];

          $sql4 = "select * from cart where pat_id = '$pat_id'"; //get all p_id & qty from cart
          $r_query = mysqli_query($con, $sql4);
          while($row = mysqli_fetch_array($r_query, MYSQLI_ASSOC)) {
            $qty = $row['qty'];
            $p_id = $row['p_id'];
            $sql5 = "INSERT INTO delivery_prod(order_id, p_id, qty) VALUES($order_id, $p_id, $qty)";   //put them in delivery_prod tab}
            mysqli_query($con, $sql5);
          }

          $sql6 = "DELETE FROM cart WHERE pat_id = '$pat_id'";    //empty the cart
          mysqli_query($con, $sql6);

          echo "Bought";
          header("Location:../order.php?cartResult=1&order=$order_id");
        }
        else {
          $error = "\"" . mysqli_error($con) . "\"" ;
          echo "<script>console.log($error);</script>";
          header("Location:../order.php?cartResult=-1");
        }

    }



  }

    mysqli_close($con);
    ?>
