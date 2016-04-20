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
                    <li class="active"><a href="directory.php"><span class="glyphicon glyphicon-book"></span> Directory</a></li>
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
          echo "<li><a href=\"signup.php\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>";
          echo "<li><a href=\"login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
        }
        ?>
                </ul>
            </div>
        </nav>

        </div>
        <header>
            <h1>Restaurant Index</h1>
        </header>


        <?php
      $con=mysqli_connect("localhost", "root", "dbproject", "db_proj");

      if (!$con) {
          echo "Error: Unable to connect to MySQL." . PHP_EOL;
          echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
          echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
          exit;
      }

      if (isset($_REQUEST['term']) && !empty($_REQUEST['term'])) {
        $term = mysqli_real_escape_string($con, $_REQUEST['term']);
        $sql = "SELECT * FROM rest WHERE name LIKE '%".$term."%' OR location LIKE '%".$term."%' OR cuisine LIKE '%".$term."%'";
      }
      else {
        $sql= "select * from rest";
      }
      $r_query = mysqli_query($con, $sql);

      echo '<div id = "directory">';

      while($row = mysqli_fetch_array($r_query, MYSQLI_ASSOC)) {
        echo "<a style=\"width: 50%; padding: 15px; \" href=\"restaurant.php?id=" . $row['res_id'] . "\" class=\"btn btn-default\" role=\"button\">" . $row['name'] . "</a><br>";
      }

      echo '</div>';

      mysqli_close($con);
     ?>


            <footer class="container-fluid text-center footer">
                <p class="text-muted">Restaurant Database &#169; Shayna &#38; Mayank.</p>
            </footer>

            <script src="js/jquery-2.2.3.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

</body>

</html>
