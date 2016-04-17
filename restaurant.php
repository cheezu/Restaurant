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
                    <li><a href="home.php">Home</a></li>
                    <li><a href="directory.php">Directory</a></li>
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

        <?php
        if(isset($_GET['rateResult'])) {
          extract($_GET);
          if($rateResult==1) {
            echo '<br/><center><span style="color: red">Thank You for Your Rating</span></center>';
          }
          else {
            echo '<br/><center><span style="color: red">Rating Unsuccessful</span></center>';
          }
        }

       ?>
       <div class="row">
           <div class="col-sm-6">
              <div class="container-fluid">
                  <?php
              echo '<div>';

                  $con = mysqli_connect("localhost", "root", "dbproject", "db_proj");

                  if (!$con) {
                      echo "Error: Unable to connect to MySQL." . PHP_EOL;
                      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                      exit;
                  }

                  if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
                      $id = mysqli_real_escape_string($con, $_REQUEST['id']);
                      $sql = "SELECT *, avg(ambience) as avg_ambience, avg(vfm) as avg_vfm, avg(fq) as avg_fq, avg(service) as avg_service FROM rest NATURAL JOIN rating WHERE res_id=$id";
                      $r_query = mysqli_query($con, $sql);
                      $row = mysqli_fetch_array($r_query, MYSQLI_ASSOC);
                      echo "<br>";
                      echo "Restaurant Name: " . $row['name'];
                      echo "<br>";
                      echo "Location: " . $row['location'];
                      echo "<br>";
                      echo "Cuisine: " . $row['cuisine'];
                      echo "<br>";
                      echo "Phone Number: " . $row['ph_no'];
                      echo "<br>";
                      echo "Email: " . $row['mail'];
                      echo "<br>";
                      echo "<strong>Average Rating: </strong>";
                      echo "<br>";
                      echo "Ambience: " . round($row['avg_ambience'], 2);
                      echo "<br>";
                      echo "Food Quality: " . round($row['avg_fq'], 2);
                      echo "<br>";
                      echo "Value for Money: " . round($row['avg_vfm'], 2);
                      echo "<br>";
                      echo "Service: " . round($row['avg_service'], 2);
                      echo "<br>";
                      echo "<br>";
                      echo '
                      <p>
                          <a href="rate.php?id=' . $id . '" class="btn btn-primary" role="button">Rate Us</a>
                      </p>
                      ';
                  }
                  mysqli_close($con);


            echo  '</div>';

        ?>
      </div>
    </div>

      <div class="col-sm-6">
          <div class="container-fluid">
            <?php
              echo "<strong>Reviews: </strong>";
              echo "<br>";
                  $con = mysqli_connect("localhost", "root", "dbproject", "db_proj");

                  if (!$con) {
                      echo "Error: Unable to connect to MySQL." . PHP_EOL;
                      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                      exit;
                  }

                  if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
                      $id = mysqli_real_escape_string($con, $_REQUEST['id']);
                      $sql = "SELECT review FROM rating WHERE res_id=$id";
                      $r_query = mysqli_query($con, $sql);
                      while($row = mysqli_fetch_array($r_query, MYSQLI_ASSOC)) {
                          echo $row['review'];
                          echo "<br>";
                          echo "<br>";
                      }
                  }
            ?>
          </div>
      </div>
    </div>

            <footer class="container-fluid text-center footer">
                <p class="text-muted">Restaurant Database &#169; Shayna &#38; Mayank.</p>
            </footer>


        <script src="js/bootstrap.min.js"></script>

</body>

</html>
