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
                    <li class="active"><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
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
          echo "<li><a href=\"signup.php\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>";
          echo "<li><a href=\"login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
        }
      ?>
                </ul>
            </div>
        </nav>

        <?php

  if(isset($_GET['signupResult'])) {
    extract($_GET);
    if($signupResult==1) {
      echo '<br/><center><span style="color: red">Successfully Registered</span></center>';
    }
    else {
      echo '<br/><center><span style="color: red">Unsuccessful </span></center>';
    }
  }

  if(isset($_GET['loginResult'])) {
    extract($_GET);
    if($loginResult==1) {
      echo '<br/><center><span style="color: red">Welcome, '  . $_SESSION['login_user'] . '</span></center>';
    }
    else {
      echo '<br/><center><span style="color: red">Unsuccessful </span></center>';
    }
  }

 ?>
<div id="cour">
 <div id="myCarousel" class="carousel slide myCour" data-ride="carousel">
     <!-- Indicators -->
     <ol class="carousel-indicators">
       <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
       <li data-target="#myCarousel" data-slide-to="1"></li>
       <li data-target="#myCarousel" data-slide-to="2"></li>
     </ol>

     <!-- Wrapper for slides -->
     <div class="carousel-inner" role="listbox">
       <div class="item active">
         <img src="images/banner1.jpg" alt="Image">
         <div class="carousel-caption">
           <h3>Think No More</h3>
           <p>Dine at some of the finest restaurants.</p>
         </div>
       </div>

       <div class="item">
         <img src="images/banner2.jpg" alt="Image">
         <div class="carousel-caption">
           <h3>Whenever, Wherever</h3>
           <p>Delivery service available 24/7.</p>
         </div>
       </div>

       <div class="item">
         <img src="images/banner3.jpg" alt="Image">
         <div class="carousel-caption">
           <h3>Craving Sweets?</h3>
           <p>Manipal offers some of the best desserts around.</p>
         </div>
       </div>
     </div>

     <!-- Left and right controls -->
     <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
       <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
     </a>
     <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
       <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>
 </div>
</div>

            <!--Search-->

            <div class="container-fluid text-center">
                <div class="jumbotron">
                    <header>
                        <h2>Search over 100 Restaurants in Manipal</h2>
                    </header>

                    <div class="container-fluid" id="find">
                        <form action="directory.php" id="search" method="GET" role="form">
                            <div class="form-group">
                                <label for="term"><span class="glyphicon glyphicon-search"></span>Search</label>
                                <input type="search" class="form-control" name="term" placeholder="Search by restaurant name, location or cuisine..." maxlength="100" autocomplete="off">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--Footer-->

            <footer class="container-fluid text-center footer">
                <p class="text-muted">Restaurant Database &#169; Shayna &#38; Mayank.</p>
            </footer>

            <script src="js/jquery-2.2.3.min.js"></script>
            <script src="js/bootstrap.min.js"></script>


</body>

</html>
