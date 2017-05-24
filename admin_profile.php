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
  <title>Pentracode | Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/main_style.css" >
  <link rel="stylesheet" type=" text/css" href="css/layout.css" >
  <link rel="stylesheet" type=" text/css" href="css/mediaquery.css" >
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
  <script src="js/jquery.js"></script>
  <script src="js/script.js"></script>

<!-- script -->
  <script lang="javascript">
  $(function(){

    var file = $(this)[0].file;
  // file upload script

  $('#update-img').css({"display":"none"});
  $("#user-img").on("change", function(e){
    var filename = e.target.value.split('\\').pop();
    $('#label span').text(filename);
    $('#update-img').css({"display":"block", "margin":"1px auto 0"});
    $('#label i').css({"display":"none"});
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
          <li><a href="admin.php"><i class="fa fa-code icon"></i> Discussion </a></li>
          <!-- <li><a href="images.php"><i class="fa fa-camera icon "></i> Photos </a></li> -->
          <li><a href="members.php"><i class="fa fa-group icon"></i>   Manage Users </a></li>
          <li><a href="admin_profile.php" id="active"><i class="fa fa-user icon"></i> Profile </a></li>
        </ul>
      </nav>

    </header>

    <!-- content -->
    <div class="content">

      <!-- aside left -->
      <aside class="asideLeft">
        <div class="asideLeft-text">
          <h2> Profile </h2>
          <h5> Manage your profile </h5>
        </div>
        <div id="nav-wrap">
          <ul id="side-nav">
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="edit_profile.php">Edit Profile</a></li>
            <li><a href="#">Lorem ipsum</a></li>
          </ul>
        </div>
      </aside>

      <!-- middle-section -->
      <section>
        <div class="user-data">
          <table align='center'>
            <tr>
              <td colspan="8">
                <div class="user-img-holder">
                    <img src="<?php echo 'images\\'."admin_pics\\".$avatar; ?>" alt="Profile Picture" width="130"/>
                    <div class="user-img-holder-overlay" align='center'>
                      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                              <?php require_once('admin_change_user_pic_script.php'); ?>
                              <label id="label" for="user-img" >
                                <i class="fa fa-plus"></i><br>
                                <span></span>
                              </label><br>
                              <input type="file" name="avatar" id="user-img" />
                              <input type="submit" id="update-img" value="Change" />
                      </form>
                    </div>
                </div>
              </td>
            </tr>
            <tr><td><h3></h3></td></tr>
            <tr><td><h3></h3></td></tr>
            <tr>
              <td><h4>Name:</h4></td>
              <td><h3><?php echo $lastname ." " .$firstname; ?> </h3></td>
            </tr>
            <tr>
              <td><h4>Gender:</h4></td>
              <td><h3><?php echo $gender; ?> </h3></td>
            </tr>
            <tr>
              <td><h4>Email:</h4></td>
              <td><h3><?php echo $email; ?> </h3></td>
            </tr>

            <tr>
              <td><h4>Skills:</h4></td>
              <td><h3><?php echo $skills; ?> </h3></td>
            </tr>

            <tr>
              <td><h4>Joined:</h4></td>
              <td><h3><?php echo $joined; ?> </h3></td>
            </tr>

            <tr>
              <td><h4>City:</h4></td>
              <td><h3><?php echo $city; ?> </h3></td>
            </tr>

            <tr>
              <td><h4>Country:</h4></td>
              <td><h3><?php echo $country; ?> </h3></td>
            </tr>
          </table>
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
