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

        <?php


            if(isset($_GET['cartResult'])) {
              extract($_GET);
              if($cartResult==1) {
                echo '<br/><center><span style="color: red">Item added to cart</span></center>';
              }
              else {
                echo '<br/><center><span style="color: red">Cannot add</span></center>';
              }
            }

           ?>

               <div class="container-fluid">
                   <?php
                          $con = mysqli_connect("localhost", "root", "dbproject", "db_proj");

                           if (!$con) {
                               echo "Error: Unable to connect to MySQL." . PHP_EOL;
                               echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                               echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                               exit;
                           }

                           $id = mysqli_real_escape_string($con, $_REQUEST['id']);
                           $sql = "select * from product where res_id = $id";
                           $r_query = mysqli_query($con, $sql);
                           echo '
                           <table class="table">
                           <thead>
                             <tr>
                               <th>Item Name</th>
                               <th>Item Type</th>
                               <th>Price</th>
                               <th>Quantity</th>
                               <th></th>
                             </tr>
                           </thead>
                           <tbody>
                           ';
                           while($row = mysqli_fetch_array($r_query, MYSQLI_ASSOC)) {
                             echo '
                             <tr>
                              <form action="php/itemHandler.php" role="form" method="POST">
                                 <div class="form-group">
                                 <input type=hidden name=p_id value=' . $row['p_id'] . '>
                                 <input type=hidden name=res_id value=' . $_REQUEST['id']. '>
                                 <td>' . $row['name'] . '</td>
                                 <td>' . $row['type'] . '</td>
                                 <td>' . $row['price'] . '</td>
                                 <td><input type="number" name="qty" value="1" required></td>
                                 <td><button class="btn btn-primary" type="submit" name="submit" value="add">Add to Cart</button></td>
                                 </div>
                              </form>
                            </tr>
                             ';
                           }
                           echo '
                                 </tbody>
                                 </table>
                           ';

                           mysqli_close($con);

                    ?>

        <footer class="container-fluid text-center footer">
            <p class="text-muted">Restaurant Database &#169; Shayna &#38; Mayank.</p>
        </footer>


        <script src="js/bootstrap.min.js"></script>

        </body>

    </html>
