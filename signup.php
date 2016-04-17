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
          header("location: home.php");
        }
        else {
          echo "<li class=\"active\"><a href=\"signup.php\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>";
          echo "<li><a href=\"login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
        }
      ?>
                </ul>
            </div>
        </nav>

        <!--Forms-->

        <div class="row">
            <div class="col-sm-6">
                <div class="container-fluid" id="signForm">
                    <form action="php/signupHandler.php" method="POST">
                        <div class="form-group">
                            <label for="user">Username</label>
                            <input type="text" class="form-control" name="user" placeholder="eg:shayna47" id="user" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="pwd" placeholder="Enter password without any spaces" id="pwd" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd2">Confirm Password:</label>
                            <input type="password" class="form-control" name="pwd2" placeholder="Retype password made above" id="pwd2" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="eg: Shayna Lee" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" class="form-control" name="dob" id="dob" required>
                        </div>
                        <div class="form-group">
                            <label for="mail">Email:</label>
                            <input type="email" class="form-control" name="mail" placeholder="eg: blah@mail.com" id="mail" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number:</label>
                            <input type="tel" class="form-control" name="phone" placeholder="eg: 999 999 9999" id="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="addr">Address:</label>
                            <input type="text" class="form-control" name="addr" placeholder="eg: MIT, Manipalu, Kanartaka" id="addr" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="container-fluid">
                    <h3>Your Benefits at Manipal Delights</h3><br>
                    <p>&nbsp; Delivery within 45 Minutes</p><br>
                    <p>&nbsp; Online Deals and Promotions</p><br>
                    <p>&nbsp; Best Local Service Providers</p><br>
                    <p>&nbsp; Reach More Categories</p><br>
                    <p>&nbsp; Multiple Service Ordering</p><br>
                    <p>&nbsp; Service Deliver to Doorstep</p><br>
                    <p>&nbsp; Dedicated Customer Support</p><br>
                </div>
            </div>
          </div>

            <footer class="container-fluid text-center footer">
                <p class="text-muted">Restaurant Database &#169; Shayna &#38; Mayank.</p>
            </footer>


            <script src="js/bootstrap.min.js"></script>

</body>

</html>
