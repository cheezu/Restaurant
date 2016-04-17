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


      <div class="container-fluid">
              <?php
          echo '<div>';

              $con=mysqli_connect("localhost", "root", "dbproject", "db_proj");

              if (!$con) {
                  echo "Error: Unable to connect to MySQL." . PHP_EOL;
                  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                  exit;
              }

              if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
                  $id = mysqli_real_escape_string($con, $_REQUEST['id']);
                  echo'
                  <div class="container-fluid" id="rateForm">
                      <form action="php/rateHandler.php" role="form" method="POST">
                          <div class="form-group">
                            <input type="hidden" class="form-control" name="res_id" required>
                          </div>
                          <div class="form-group">
                              <label for="ambience ">Ambience:     </label>
                              <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default"><input type="radio" class="form-control" name="ambience" value=5 required>Excellent</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="ambience" value=4 required>Good</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="ambience" value=3 required>Average</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="ambience" value=2 required>Decent</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="ambience" value=1 required>Horrible</label>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="res_serv">Restaurant Services:     </label>
                              <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default"><input type="radio" class="form-control" name="res_serv" value=5 required>Excellent</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="res_serv" value=4 required>Good</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="res_serv" value=3 required>Average</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="res_serv" value=2 required>Decent</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="res_serv" value=1 required>Horrible</label>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="food_qual">Food Quality:     </label>
                              <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default"><input type="radio" class="form-control" name="food_qual" value=5 required>Excellent</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="food_qual" value=4 required>Good</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="food_qual" value=3 required>Average</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="food_qual" value=2 required>Decent</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="food_qual" value=1 required>Horrible</label>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="vfm">Value for Price:     </label>
                              <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default"><input type="radio" class="form-control" name="vfm" value=5 required>Excellent</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="vfm" value=4 required>Good</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="vfm" value=3 required>Average</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="vfm" value=2 required>Decent</label>
                                <label class="btn btn-default"><input type="radio" class="form-control" name="vfm" value=1 required>Horrible</label>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="review">Review: </label>
                              <textarea class="form-control" rows="5" name="review"></textarea>
                          </div>
                          <input type = "hidden" name = "res_id" value = "' . $_REQUEST['id'] . '">
                          <button type="submit" name="submit" class="btn btn-default">Submit</button>
                      </form>
                  </div>
                  ';
              }
              mysqli_close($con);


        echo  '</div>';

    ?>

        <footer class="container-fluid text-center footer">
            <p class="text-muted">Restaurant Database &#169; Shayna &#38; Mayank.</p>
        </footer>

    </div>

        <script src="js/jquery-2.2.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>


        </body>

</html>
