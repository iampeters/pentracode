<?php

  // starting session
  session_start();
  if (!isset($_SESSION['uid'])) {
    header('location: login.php');
  }

  $uid = $_SESSION['uid'];
  $firstname = $_SESSION['firstname'];
  $lastname = $_SESSION['lastname'];
  $username = $_SESSION['username'];
  $avatar = $_SESSION['avatar'];
  $city = $_SESSION['city'];
  $skills = $_SESSION['skills'];
  $country = $_SESSION['country'];

  require("change_user_picture_script.php");
 ?>



<!DOCTYPE html>
<html>

<head>
  <title>Pentracode | Change Profile Picture</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/main_style.css" >
  <link rel="stylesheet" type=" text/css" href="css/layout.css" >
  <link rel="stylesheet" type=" text/css" href="css/mediaquery.css" >
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
  <script src="js/jquery.js"></script>
  <script src="js/script.js"></script>

  <script lang="javascript">
  $(function(){

    var file = $(this)[0].file;
  // file upload script

  $("#user-img").on("change", function(e){
    var filename = e.target.value.split('\\').pop();
    $('#for-user-img span').text(filename);
  });



  });

  </script>
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
            <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
            <div class="img"><img src="<?php echo  'images\\'."users\\".$avatar;  ?>" alt='user image'></div>
          </h3>
        </div>
      </div>
      <hr>
      <!-- nav -->
      <nav>
        <i id="fa"class="fa fa-bars" aria-hidden="true"></i>
        <ul>
          <li><a href="home.php"><i class="fa fa-code icon"></i> Discussion </a></li>
          <li><a href="images.php"><i class="fa fa-camera icon "></i> Photos </a></li>
          <li><a href="videos.php"><i class="fa fa-film icon"></i> Videos </a></li>
          <li><a href="profile.php" class="active"><i class="fa fa-user icon"></i> Profile </a></li>
        </ul>
      </nav>

    </header>

    <!-- content -->
    <div class="content">

      <!-- aside left -->
      <aside class="asideLeft">
        <div class="asideLeft-text">
          <h2> Profile </h2>
          <h5> Complete your registration </h5>
        </div>
        <div id="nav-wrap">
          <ul id="side-nav">
            <li><a href="change_profile_picture.php" class="Active">Change Profile Picture</a></li>
            <li><a href="edit_profile.php">Edit Profile</a></li>
            <li><a href="#">Lorem ipsum</a></li>
          </ul>
        </div>
      </aside>

      <!-- middle-section -->
      <section>
        <div class="registration_details_form" align='center'>
          <!-- checking username and password error -->
          <div class="error"><?php echo $errorMsg;  ?></div>

          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
            <table>
              <br>
              <br>
              <tr>
                <td>
                  <label for="user-img" id="for-user-img">
                    <i class="fa fa-upload"></i> &nbsp;
                    <span>Choose your image</span>
                  </label>
                  <input type="file" name="avatar" id="user-img" />
                </td>
              </tr>

              <tr><td></td></tr>
              <tr><td></td></tr>

              <tr>
                <td>
                  <input type="submit" id="update" value="Change" />
                </td>
              </tr>
            </table>
          </form>
        </div>
        <!-- article: will house the articles, discussions and so forth -->
        <article></article>
      </section>

      <!-- aside right -->
      <aside class="asideRight">
        <!-- footer -->
        <footer>Copyright © 2010-2017  |  www.pentracode.com</footer>
      <div class="Right-aside-wrap">

        </div>
      </aside>
    </div>


  </div>

</body>
</html>
