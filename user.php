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
        <div class="container-fluid" style="background-color:#ffa000;color:#fff;height:200px;">
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
              echo "<li class=\"active\"><a href=\"user.php\"><span class=\"glyphicon glyphicon-user\"></span> My Account</a></li>";
              echo "<li><a href=\"php/logoutHandler.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Logout</a></li>";
            }
            else {
              header("location: home.php");
            }
        ?>

                </ul>
            </div>
        </nav>

        <?php
            if(isset($_GET['updateResult'])) {
              extract($_GET);
              if($updateResult==1) {
                echo '<br/><center><span style="color: red">Successfully Updated</span></center>';
              }
              else {
                echo '<br/><center><span style="color: red">Unsuccessful </span></center>';
              }
            }
        ?>

        <?php

            $con=mysqli_connect("localhost", "root", "dbproject", "db_proj");

            if (!$con) {
                echo "Error: Unable to connect to MySQL." . PHP_EOL;
                echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                exit;
            }

            if (isset($_SESSION['login_user'])) {
                $id = $_SESSION['login_user'];

                $sql = "SELECT * FROM user WHERE pat_id='$id'";
                $r_query = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($r_query, MYSQLI_ASSOC);
                echo '<div class="wrapper">';
                echo '<div class="row" style="margin-right: 0px; margin-left: 0x;">';

                echo '
                    <div class="col-sm-6">
                        <div class="container-fluid" id="signForm">
                          <h3><strong>My Profile</strong></h3>
                            <form action="php/updateUserHandler.php" method="POST">
                                <div class="form-group">
                                    <label for="user">Username</label>
                                    <input type="text" class="form-control" name="user" value="' . $row['pat_id'] . '" id="user" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" name="pwd" id="pwd" >
                                </div>
                                <div class="form-group">
                                    <label for="pwd2">Confirm Password:</label>
                                    <input type="password" class="form-control" name="pwd2" id="pwd2" onchange="passValidate()"  >
                                </div>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" name="name" value="' . $row['pat_name'] . '" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth:</label>
                                    <input type="date" class="form-control" name="dob" value="' . $row['pat_bday'] . '" id="dob" required>
                                </div>
                                <div class="form-group">
                                    <label for="mail">Email:</label>
                                    <input type="email" class="form-control" name="mail" value="' . $row['pat_mail'] . '" id="mail" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number:</label>
                                    <input type="tel" class="form-control" name="phone" value="' . $row['pat_phone'] . '" id="phone" required>
                                </div>
                                <div class="form-group">
                                    <label for="addr">Address:</label>
                                    <input type="text" class="form-control" name="addr" value="' . $row['pat_addr'] . '" id="addr" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary" onclick="return passValidate()  " name="submit">Update</button>
                            </form>
                        </div>
                      </div>

                    ';
                    echo '<div class="col-sm-6">
                        <div class="container-fluid">
                    ';
                      echo '<h3><strong>Order History</strong></h3>';
                      echo '<br>';
                      $sql = "SELECT * from delivery where pat_id = '$id' order by order_id desc";
                      $r_query = mysqli_query($con, $sql);

                      while($row = mysqli_fetch_array($r_query, MYSQLI_ASSOC)) {
                        $order = $row['order_id'];
                        $amount = $row['order_amount'];
                        $time = $row['order_datetime'];
                        echo "<a style=\"width: 600px; \" href=\"order.php?cartResult=1&order=$order\" class=\"btn btn-default\" role=\"button\">Order ID: $order<br>Date: $time<br>Total Cost: $amount</a>";
                        echo '<br>';
                        echo '<br>';
                      }
                    echo '</div>';
                  echo '</div>';
                echo '</div>';
                echo '</div>';
            }

            mysqli_close($con);
       ?>


       <div class="footer">
         <footer class="container-fluid text-center footer" style="padding: 250px 0 0;">
             <p class="text-muted">Restaurant Database &#169; Shayna &#38; Mayank.</p>
         </footer>
       </div>

       <script src="js/jquery-2.2.3.min.js"></script>
       <script src="js/bootstrap.min.js"></script>
       <script src="js/passValidate.js"></script>

   </body>

</html>
