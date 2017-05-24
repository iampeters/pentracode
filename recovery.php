<?php

  // starting session
  session_start();
  if (isset($_SESSION['uid'])) {
    header('location: home.php');
  }

 ?>





<!DOCTYPE html>
<html>
<head>
<title>Pentracode | password Recovery</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <link rel="stylesheet" type="text/css" href="css/main_style.css" > -->
<link rel="stylesheet" type=" text/css" href="css/layout.css">
<link rel="stylesheet" type="text/css" href="css/main_style.css">
<link rel="stylesheet" type="text/css" href="css/login_style.css">
<link rel="stylesheet" type=" text/css" href="css/mediaquery.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
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
        <img src="images/logo.png">
      </div>
    </div>
    <hr>
    <!-- nav -->
    <nav>
      <i id="fa" class="fa fa-bars" aria-hidden="true"></i>

      <ul>
        <li><a href="login.php"><i class="fa fa-sign-in icon"></i> Login </a></li>
        <li><a href="register.php" ><i class="fa fa-key icon"></i> Register </a></li>
        <li><a href="recovery.php" class="active"><i class="fa fa-lock icon "></i>  Forgot Password </a></li>
      </ul>
    </nav>

  </header>

  <!-- content -->
  <div id="content">
      <div class="content-text">
        <hr style="width: 150px;">
        <h3>Account recovery</h3>
        <h6>Enter your registerd email address to receive your password</h6>
        <hr style="width: 150px;">
      </div>
        <div class="form-wrap" align="center">
          <!-- checking if the user has been registered -->
          <div></div>

          <form action="/pentracode/register.php" method="post">
            <table>
                <!-- email -->
               <tr>
                 <td>
                   <label for="">Email</label>
                 </td>
               </tr>
               <tr>
                 <td>
                   <input type="email" name="email" id="email" placeholder="Enter recovery email" required="">
                 </td>
               </tr>
               <!-- submit button -->
                <!-- break line for table -->
                <tr><td></td></tr>
                <tr><td></td></tr>

                <tr>
                  <td>
                    <input type="submit" name="recover" id="submit" value="Send" />
                  </td>
                </tr>

                <!-- break line for table -->
                <tr><td></td></tr>
                <tr><td></td></tr>

              </table>



          </form>

        </div>


  </div>

</div>
<!-- footer -->
<footer id="footer">Copyright © 2010-2017  |  www.pentracode.com</footer>
</body>
</html>
