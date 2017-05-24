<?php


  // starting session
  session_start();
  if (isset($_SESSION['uid'])) {
    header('location: home.php');
  }
 ?>

<DOCTYPE html>
<html>

<head>
  <title>Pentracode | For the love of codes</title>
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
          <a href='index.php'> <img src="images/logo.png"></a>
        </div>
        <div id="navbar">
          <ul>
            <li style="color:#e6ac00;"><a href="login.php">Login </a>&nbsp; &bull; &nbsp;<a href="register.php">Register </a></li>
          </ul>
        </div>
      </div>
      <hr>
      <!-- nav -->
      <nav>
        <i id="fa"class="fa fa-bars" aria-hidden="true"></i>
        <ul>
          <!-- <li><a href="index.php" id="active"><i class="fa fa-code icon"></i> Discussion </a></li>
          <li><a href="login.php"><i class="fa fa-sign-in icon "></i>  Login </a></li>
          <li><a href="register.php"><i class="fa fa-key icon"></i> Register </a></li> -->
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
