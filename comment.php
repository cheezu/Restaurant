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
                    <li class="active"><a href="directory.php">Directory</a></li>
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

        <div class="container-fluid">
            <h2>Reviews</h2>
            <p>Space has been provided in the space below for comments.</p>
            <form role="form">
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" placeholder="Please enter comments here..." id="comment"></textarea>
                    <br><a href="#" class="btn btn-primary" role="button">Submit</a>
                </div>
            </form>
        </div>
        <footer class="container-fluid text-center footer">
            <p class="text-muted">Restaurant Database &#169; Shayna &#38; Mayank.</p>
        </footer>

        <script src="js/jquery-2.2.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

</body>

</html>
