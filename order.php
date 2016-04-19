<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="utf-8">
    <meta name="viewpport" content="width-device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="This is a really, really, REALLY page about food in Manipal. Not.">
    <meta name="author" content="Shayna Maree Lee Fung Hwa">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/waterstyle.css">

    <title>Manipal Delights</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>

<body>

  <?php
    session_start();
  ?>

        <div id="logo">
        </div>
        <div class="container-fluid" style="background-color:#455a64;color:#fff;height:200px;">
            <h1>Manipal Delights</h1>
            <h4>FOOD RIGHT AT YOUR DOORSTEP</h4>
            <p>It's cooler. It's faster. It's better than ever before.</p>
            <p>Register now to become a part of Manipal's Foodie Community.</p>
        </div>

        <!--Navigation Bar-->

        <nav class="navbar navbar-inverse" id="topnav">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="directory.php"><span class="glyphicon glyphicon-book"></span> Directory</a></li>
                    <?php
                        if(isset($_SESSION['login_user'])) {
                          echo "<li><a href=\"cart.php\"><span class=\"glyphicon glyphicon-shopping-cart\"></span> Cart</a></li>";
                        }
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
        <?php
            if(isset($_SESSION['login_user'])) {
              echo "<li><a href=\"user.php\"><span class=\"glyphicon glyphicon-user\"></span> My Account</a></li>";
              echo "<li><a href=\"php/logoutHandler.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Logout</a></li>";
            }
            else {
              header("Location:./login.php");
            }
        ?>
                </ul>
            </div>
        </nav>
      <div class="container-fluid">
        <?php
            if(isset($_GET['cartResult'])) {
              extract($_GET);
              if($cartResult==1) {

                  $con=mysqli_connect("localhost", "root", "dbproject", "db_proj");

                  if (!$con) {
                      echo "Error: Unable to connect to MySQL." . PHP_EOL;
                      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                      exit;
                  }

                  echo '<div class="row">';

                  echo '<div class="col-sm-6">';
                    echo '
                      <h4><strong>Billing Details</strong></h4>
                      <br>
                    ';
                    $id = $_SESSION['login_user'];
                    $sql = "SELECT * FROM user WHERE pat_id='$id'";
                    $r_query = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($r_query, MYSQLI_ASSOC);
                      echo "<strong>Name: </strong>" . $row['pat_name'];
                      echo "<br>";
                      echo "<strong>Date of Birth: </strong>" . $row['pat_bday'];
                      echo "<br>";
                      echo "<strong>Phone Number: </strong>" . $row['pat_phone'];
                      echo "<br>";
                      echo "<strong>Email: </strong>" . $row['pat_mail'];
                      echo "<br>";
                      echo "<strong>Address: </strong>" . $row['pat_addr'];
                      echo "<br>";


                  echo '</div>';

                  echo '<div class="col-sm-6">';
                      $sql = "select *, rest.name as rest_name, product.name as p_name from delivery_prod natural join product join rest using(res_id) where order_id=$order";
                      $r_query = mysqli_query($con, $sql);
                      echo '
                      <h4><strong>Order Details</strong></h4>
                      <br>
                      <table class="table">
                      <thead>
                        <tr>
                          <th>Restaurant Name</th>
                          <th>Item Name</th>
                          <th>Item Type</th>
                          <th>Unit Price</th>
                          <th>Quantity</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
                      ';
                      while($row = mysqli_fetch_array($r_query, MYSQLI_ASSOC)) {
                        echo '
                        <tr>
                            <td>' . $row['rest_name'] . '</td>
                            <td>' . $row['p_name'] . '</td>
                            <td>' . $row['type'] . '</td>
                            <td>' . $row['price'] . '</td>
                            <td>' . $row['qty'] . '</td>
                            <td>' . $row['price']*$row['qty'] . '</td>
                       </tr>
                        ';
                      }

                      echo '</tbody>
                            </table>';

                    $sql = "SELECT order_amount from delivery where order_id = $order";  //Get the total amount
                    $r_query = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($r_query, MYSQLI_ASSOC);
                    $total = $row['order_amount'];
                    echo "<strong>Total Price:</strong> $total<br>";

                  echo '</div>';
              }

              else {
                echo '<br/><center><span style="color: red">Easter Egg: Ujjwal Arora Sux</span></center>';
              }

            }
        ?>
      </div>
        <footer class="container-fluid text-center footer">
            <p class="text-muted">Restaurant Database &#169; Shayna &#38; Mayank.</p>
        </footer>


        <script src="js/bootstrap.min.js"></script>

</body>

</html>
