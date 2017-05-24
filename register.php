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
<title>Pentracode | Register</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <link rel="stylesheet" type="text/css" href="css/main_style.css" > -->
<link rel="stylesheet" type=" text/css" href="css/layout.css">
<link rel="stylesheet" type="text/css" href="css/main_style.css">
<link rel="stylesheet" type="text/css" href="css/register_style.css">
<link rel="stylesheet" type=" text/css" href="css/mediaquery.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<script src="js/jquery.js"></script>
<script src="js/register_script.js"></script>
<script src="js/script.js"></script>
</head>

<body>

<!-- overall-wrap -->
<div class="overall-wrap">

  <!-- header -->
  <header>

    <div class="header" id="header">
      <div class="logo" id="logo">
        <a href='index.php'> <img src="images/logo.png"></a>
      </div>

    </div>
    <hr>
    <!-- nav -->
    <nav>
      <i id="fa" class="fa fa-bars" aria-hidden="true"></i>

      <ul>
        <!-- <li><a href="login.php"><i class="fa fa-sign-in icon"></i> Login </a></li> -->
        <!-- <li><a href="register.php" class="active"><i class="fa fa-key icon"></i> Register </a></li> -->
        <!-- <li><a href="recovery.php"><i class="fa fa-lock icon "></i>  Forgot Password </a></li> -->
      </ul>
    </nav>

  </header>

  <!-- content -->
  <div class="content">
      <div class="content-text">
        <hr style="width: 150px;">
        <h3>Create an account</h3>
        <h6>Register to join in the discussion</h6>
        <hr style="width: 150px;">
      </div>
        <div class="form-wrap" align="center">
          <!-- checking if the user has been registered -->
          <div class="error"></div>

          <form action="" method="post" id="register-form">
            <table>
               <tr>
                 <td>
                   <label for="fname">First Name</label>
                 </td>
                 <td class="hide">
                   <label for="lname">Last Name</label>
                 </td>
               </tr>
               <tr>
                 <td>
                   <input type="text" name="fname" id="fname" placeholder="Enter your first name"  <?php if (isset($_POST['fname'])){ echo 'value="', $_POST['fname'], '"';} ?>/>
                 </td>
                 <td class="show">
                   <label for="lname">Last Name</label>
                 </td>
                 <td>
                   <input type="text" name="lname" id="lname" placeholder="Enter your last name"  <?php if (isset($_POST['lname'])){ echo 'value="', $_POST['lname'], '"';} ?>/>
                 </td>
               </tr>

               <!-- break line for table -->
               <tr><td></td></tr>
               <tr><td></td></tr>

               <!-- email -->
               <tr>
                 <td>
                   <label for="email">Email</label>
                 </td>
                 <td class="hide">
                   <label for="username">Username</label>
                 </td>
               </tr>
               <tr>
                 <td>
                   <input type="email" name="email" id="email" placeholder="Enter your email"  <?php if (isset($_POST['email'])){ echo 'value="', $_POST['email'], '"';} ?>/>
                 </td>
                 <td class="show">
                   <label for="username">Username</label>
                 </td>
                 <td>
                   <input type="text" name="username" id="username" placeholder="Enter username"  <?php if (isset($_POST['username'])){ echo 'value="', $_POST['username'], '"';} ?>/>
                 </td>
               </tr>
               <!-- username exit error -->
               <tr></tr>

               <!-- break line for table -->
               <tr><td></td></tr>
               <tr><td></td></tr>

               <!-- password input field -->
               <tr>
                 <td>
                   <label for="password">Password</label>
                 </td>
                 <td class="hide">
                   <label for="confirm">Confirm Password</label>
                 </td>
               </tr>
               <tr>
                 <td>
                   <input type="password" name="password" id="password" placeholder="Enter password"  />
                 </td>
                 <td class="show">
                   <label for="confirm">Confirm Password</label>
                 </td>
                 <td>
                   <input type="password" name="confirm" id="confirm" placeholder="Confirm password"  /><span class="passmatched"></span>
                   <input type="hidden" id='file' name="file" <?php echo 'value="', "\user.png", '"'; ?> />
                 </td>
               </tr>

               <!-- password no match error -->
               <tr></tr>

               <!-- break line for table -->
               <tr><td></td></tr>

               <!-- submit button -->
               <tr>
                 <td colspan="2">
                   <kbd>By registering you agree to our<a href="terms.php"> Terms &amp; conditions</a>
                   </kbd>
                 </td>
               </tr>

                <!-- break line for table -->
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr>
                  <td colspan="3 ">
                    <input type="submit" name="register" id="submit" value="Create Account"> <span style="color:#fff;">&nbsp;  &nbsp; Already have an account? &nbsp;<a href="login.php">Sign in</a></span>
                  </td>
                </tr>

                <!-- break line for table -->
                <tr><td></td></tr>
                <tr><td></td></tr>

              </table>
          </form>

        </div>


  </div>

  <!-- footer -->
  <footer id="footer">Copyright © 2010-2017  |  www.pentracode.com</footer>
</div>
</body>
</html>
