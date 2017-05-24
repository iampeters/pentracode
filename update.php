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
      $country = $row['Gender'];

      if ($row['City'] != "" || $row['Country'] != "" || $row['Gender'] != "")
      {
        header('location: home.php');
      }
    }
  }
  else
  {
    header('location: login.php');
  }

  require("update_script.php");
 ?>



<!DOCTYPE html>
<html>

<head>
  <title>Pentracode | Update Profile</title>
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
  <style>

  </style>
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
            <div class="img"><img src="images/user.png" ></div>
          </h3>
        </div>
      </div>
      <hr>
      <!-- nav -->
      <nav>
        <i id="fa"class="fa fa-bars" aria-hidden="true"></i>
        <ul>
          <li><a href="home.php"><i class="fa fa-code icon"></i> Discussion </a></li>
          <li><a href="profile.php"><i class="fa fa-user icon"></i> Profile </a></li>
        </ul>
      </nav>

    </header>

    <!-- content -->
    <div class="content" id="content">

      <!-- aside left -->
      <aside class="asideLeft">
        <div class="asideLeft-text">
          <h2> Profile </h2>
          <h5> Complete your registration </h5>
        </div>
        <div id="nav-wrap">
          <ul id="side-nav">
            <li><a href="change_profile_picture.php" >Change Profile Picture</a></li>
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

              <h4>Please complete your registration</h4>
              <div id="user-img-input">
                  <label for="user-img" id="for-user-img">
                    <i class="fa fa-upload"></i> &nbsp;
                    <span>Choose your image</span>
                  </label>
                  <input type="file" name="avatar" id="user-img" <?php if (isset($_POST['avatar'])){ echo 'value="', $_POST['avatar'], '"';} ?> />
                </div>

              <!-- line break -->
              <tr><td></td></tr>
              <tr><td></td></tr>

              <!--  gender -->
              <tr>
                <td>
                  <label for="skill">Enter your gender</label>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="gender" id="gender" placeholder="Enter your gender" <?php if (isset($_POST['gender'])){ echo 'value="', $_POST['gender'], '"';} ?>/>
                </td>
              </tr>


              <!-- line break -->
              <tr><td></td></tr>
              <tr><td></td></tr>

              <!--  skill -->
              <tr>
                <td>
                  <label for="skill">Enter your skills</label>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="skill" id="skill" placeholder="Enter your skills"<?php if (isset($_POST['skill'])){ echo 'value="', $_POST['skill'], '"';} ?>/>
                </td>
              </tr>

              <!-- line break -->
              <tr><td></td></tr>
              <tr><td></td></tr>

              <!-- city -->
              <tr>
              <td>
                <label>Enter your city</label>
              </td>
              </tr>
              <tr>
              <td>
                <input type="text" name="city" id="city" placeholder="Enter your city" <?php if (isset($_POST['city'])){ echo 'value="', $_POST['city'], '"';} ?>/>
              </td>
              </tr>

              <!-- line break -->
              <tr><td></td></tr>
              <tr><td></td></tr>

              <tr>
                <td>
                  <label for="country">Enter your country</label>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="country" id="country" placeholder="Enter your country" <?php if (isset($_POST['country'])){ echo 'value="', $_POST['country'], '"';} ?>/>
                </td>
              </tr>
              <tr><td></td></tr>
              <tr><td></td></tr>

              <tr>
                <td>
                  <input type="submit" id="update" value="Save" />
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
