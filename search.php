<?php
$db_hostname = '127.0.0.1';
$db_username = 'root';
$db_password = 'dbproject';
$db_database = 'db_proj';

// Database Connection String
$con = mysqli_connect($db_hostname,$db_username,$db_password, $db_database);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error("nlah"));
  }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Search Results</title>
        <link rel="stylesheet" href="waterstyle.css">
    </head>

    <body>

        <?php
  if (!empty($_REQUEST['term'])) {
  $term = mysqli_real_escape_string($con, $_REQUEST['term']);
  $sql = "SELECT * FROM rest WHERE name LIKE '%".$term."%'";
  $r_query = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($r_query, MYSQLI_ASSOC)
?>

            <h1>Searching for <?php echo $term;?></h1>
            <h2>Results</h2>

            <?php
  echo 'Name: ' .$row['name'];
  echo '<br /> Location: ' .$row['location'];
  echo '<br /> Cuisine: '.$row['cuisine'];
  echo '<br /> Rating: '.$row['avg_rat'];
  echo '<br /> Phone: '.$row['ph_no'];
}
?>
    </body>

    </html>
