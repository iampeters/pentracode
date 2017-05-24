<?php

  // starting session
  session_start();
  if (!isset($_SESSION['adminID'])) {
    header('location: admin_login.php');
  }

  $aid = $_SESSION['adminID'];
  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $avatar = $_SESSION['avatar'];
  $city = $_SESSION['city'];
  $country = $_SESSION['country'];
  $gender = $_SESSION['gender'];

 ?>

<DOCTYPE html>
<html>

<head>
  <title>Pentracode | Admin</title>
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
          <img src="images/logo.png" >
        </div>
        <div id="logout">
          <h3>
            <?php  echo "Welcome " . " | " . $firstname . " " . $lastname ;  ?>
            <a href="admin_logout.php"><i class="fa fa-sign-out"></i> Logout</a>
            <a href='admin_profile.php'>
              <div class="img">
                <img src="<?php echo  'images\\'."admin_pics\\".$avatar;  ?>" >
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
          <li><a href="admin.php" class="active"><i class="fa fa-code icon"></i> Discussion </a></li>
          <!-- <li><a href=".php"><i class="fa fa-film icon"></i>  </a></li> -->
          <li><a href="members.php"><i class="fa fa-group icon"></i>   Manage Users </a></li>
          <li><a href="admin_profile.php"><i class="fa fa-user icon "></i>  Profile </a></li>
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
