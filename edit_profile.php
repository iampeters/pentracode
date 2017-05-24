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

  require('edit_profile_parse.php');

?>



<DOCTYPE html>
<html>

<head>
  <title>Pentracode | Edit Profile</title>
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
            <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
            <a href="profile.php">
              <div class="img">
                <img src="<?php echo  'images\\'."users\\".$avatar;  ?>" alt="user image">
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
          <h5> Manage your profile </h5>
        </div>
        <div id="nav-wrap">
          <ul id="side-nav">
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="edit_profile.php" class="Active">Edit Profile</a></li>
            <li><a href="#">Lorem ipsum</a></li>
          </ul>
        </div>
      </aside>

      <!-- middle-section -->
      <section style="background:#808080;">
        <div class="registration_details_form" align='center'>
          <!-- checking username and password error -->
          <div style="width:600px; margin-bottom:20px;" class="error"><?php echo $errorMsg;  ?></div>

          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
            <table>

              <h4 style="margin-bottom:10px; margin-top:-20px; background: #5f5f5f; width:600px; color: #fff; padding: 10px;">Update your profile</h4>
              <tr>
                <td>
                  <label for="fname">Edit your firstname</label>
                </td>
                <td>
                  <label for="fname">Edit your lastname</label>
                </td>
              </tr>
              <tr>
                <td>
                  <input style="background:#f5f5f5;" type="text" name="fname" id="fname" <?php  echo 'value="', $firstname, '"'; ?> />
                </td>
                <td>
                  <input style="background:#f5f5f5;" type="text" name="lname" id="fname" <?php  echo 'value="', $lastname, '"'; ?> />
                </td>
              </tr>

              <!-- line break -->
              <tr><td></td></tr>
              <tr><td></td></tr>


              <tr>
                <td>
                  <label for="fname">Edit your username</label>
                </td>
                <td>
                  <label for="fname">Edit your email</label>
                </td>
              </tr>
              <tr>
                <td>
                  <input style="background:#f5f5f5;" type="text" name="username" id="username" <?php  echo 'value="', $username, '"'; ?> />
                </td>
                <td>
                  <input style="background:#f5f5f5;" type="text" name="email" id="email" <?php  echo 'value="', $email, '"'; ?> />
                </td>
              </tr>

              <!-- line break -->
              <tr><td></td></tr>
              <tr><td></td></tr>

              <tr>
                <td>
                  <label for="fname">Enter new password</label>
                </td>
                <td>
                  <label for="fname">Confirm password</label>
                </td>
              </tr>
              <tr>
                <td>
                  <input style="background:#f5f5f5;" type="password" name="password" id="password" placeholder="Enter new password"/>
                </td>
                <td>
                  <input style="background:#f5f5f5;" type="password" name="comfirmPassword" id="cpassword" placeholder="Confirm new password"/>
                </td>

              </tr>

              <!-- line break -->
              <tr><td></td></tr>
              <tr><td></td></tr>

              <!--  gender -->
              <tr>
                <td>
                  <label for="skill">Edit your gender</label>
                </td>
                <td>
                  <label for="skill">Edit your skills</label>
                </td>
              </tr>
              <tr>
                <td>
                  <input style="background:#f5f5f5;" type="text" name="gender" id="gender" placeholder="Enter your gender" <?php  echo 'value="', $gender, '"'; ?>/>
                </td>
                <td>
                  <input style="background:#f5f5f5;" type="text" name="skill" id="skill" placeholder="Edit your skills"<?php echo 'value="', $skills, '"'; ?>/>
                </td>
              </tr>


              <!-- line break -->
              <tr><td></td></tr>
              <tr><td></td></tr>

              <!-- city -->
              <tr>
                <td>
                  <label>Edit your city</label>
                </td>
                <td>
                  <label for="country">Edit your country</label>
                </td>
              </tr>
              <tr>
                <td>
                  <input style="background:#f5f5f5;" type="text" name="city" id="city" placeholder="Enter your city" <?php echo 'value="', $city, '"'; ?>/>
                </td>
                <td>
                  <input style="background:#f5f5f5;" type="text" name="country" id="country" placeholder="Enter your country" <?php echo 'value="', $country, '"'; ?>/>
                </td>
              </tr>

              <!-- line break -->
              <tr><td></td></tr>
              <tr><td></td></tr>

              <tr>
                <td>
                  <input style="background:#5f5f5f; border-color:#5f5f5f;" type="submit" id="update" value="Save" />
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
