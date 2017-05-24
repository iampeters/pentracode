<?php

  // starting session
  session_start();
  if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
    require('db.php');
    $sql = "SELECT * from users where UserID = '".$uid."' ";
    $res = mysqli_query($conn, $sql) or die(mysql_error());

    if (mysqli_num_rows($res) == 1)
    {
      $row = mysqli_fetch_assoc($res);
      $firstname = $row['Firstname'];
      $lastname = $row['Lastname'];
      $username = $row['Username'];
      $email = $row['Email'];
      $avatar = $row['Avatar'];
      $city = $row['City'];
      $skills = $row['Skills'];
      $country = $row['Country'];
      $gender = $row['Gender'];
      $joined = $row['Joined'];

      if ($row['City'] == "" || $row['Country'] == "" || $row['Gender'] == "")
      {
          header('location: update.php');
      }
    }
  }
  else
  {
    header('location: login.php');
  }

 ?>




<DOCTYPE html>
<html>

<head>
  <title>Pentracode | Images</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/main_style.css" >
  <link rel="stylesheet" type=" text/css" href="css/layout.css" >
  <link rel="stylesheet" type=" text/css" href="css/mediaquery.css" >
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
  <script src="js/jquery.js"></script>
  <script src="js/script.js"></script>
</head>

<body>
  <!-- overall-wrap -->
  <div class="overall-wrap">

    <!-- header -->
    <header>

      <div class="header">
        <div class="logo">
          <a href="home.php"><img src="images/logo.png" ></a>
        </div>
        <div id="logout">
          <h3>
            <?php  echo "Welcome " . " | " . $firstname . " " . $lastname ;  ?>
            <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
            <a href="profile.php">
              <div class="img">
                <img src="<?php echo  'images/'."users/".$avatar;  ?>" alt="user image">
              </div>
            </a>
          </h3>
        </div>
      </div>
      <hr>
      <!-- nav -->
      <nav>
        <i id="fa"class="fa fa-bars" aria-hidden="true"></i>
        <ul>
          <li><a href="home.php"><i class="fa fa-code icon"></i> Discussion </a></li>
          <li><a href="images.php" class="active"><i class="fa fa-camera icon "></i>  Photos </a></li>
          <li><a href="videos.php"><i class="fa fa-film icon"></i> Videos </a></li>
          <li><a href="profile.php"><i class="fa fa-user icon"></i> Profile </a></li>
        </ul>
      </nav>

    </header>

    <!-- content -->
    <div class="content">

      <!-- aside left -->
      <aside class="asideLeft">

      </aside>

      <!-- middle-section -->
      <section>

        <!-- article: will house the articles, discussions and so forth -->
        <article></article>
      </section>

      <!-- aside right -->
      <aside class="asideRight">
        <div class="Right-aside-wrap">

        </div>
      </aside>
    </div>

    <!-- footer -->
    <footer>Copyright © 2010-2017  |  www.pentracode.com</footer>
  </div>

</body>
</html>
