<?php
  require $_SERVER['DOCUMENT_ROOT'] . "/pentracode/defines.php";
  require 'timeago.php';
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
  <title>Pentracode | Profile</title>
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
            <a href="profile.php" id="imglink">
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
          <li><a href="images.php"><i class="fa fa-camera icon "></i>  Photos </a></li>
          <li><a href="videos.php"><i class="fa fa-film icon"></i> Videos </a></li>
          <li><a href="profile.php"><i class="fa fa-group icon"></i> Account </a></li>
        </ul>
      </nav>

    </header>

    <!-- content -->
    <div class="content">

      <!-- aside left -->
      <aside class="asideLeft">

      </aside>

      <!-- middle-section -->
      <section id="user-section">
        <!-- article: will house the articles, discussions and so forth -->
        <article id="user-article">
          <?php
          if (isset($_GET['user'])) {
            $uname = $_GET['user'];
            require 'db.php';
            $sql4 = "SELECT * FROM users where Username = '".$uname."' ";
            $res4 = mysqli_query($conn, $sql4) or die(mysql_error());
            if (mysqli_num_rows($res4) == 1) {
              $row4 = mysqli_fetch_assoc($res4);
              $uuid = $row4['UserID'];
              $uimg = $row4['Avatar'];
              $ufname = $row4['Firstname'];
              $ulname = $row4['Lastname'];
              $ucity = $row4['City'];
              $ucountry = $row4['Country'];
              $ulevel = $row4['Level'];
              $ujoined = $row4['Joined'];
              $uskill = $row4['Skills'];
              $ugender = $row4['Gender'];

              if ($uuid == $_SESSION['uid'])
              {
                header('location: profile.php');
              }
              else
              {
                 ?>

                 <div class="user-info">
                    <div class="user-details">
                      <div class="user-pic">
                        <a href='<?php echo 'images/'.'users/'.$uimg; ?>' target='_blanc'>
                          <img src="<?php echo 'images/'.'users/'.$uimg; ?>" alt="user image" width="200" height="200"/>
                        </a>
                      </div>
                      <div class="user-information">
                        <div class="details">
                          <div class="subject">
                            <h4>Name&nbsp;&colon;</h4>
                          </div>
                          <div class="udetails">
                            <h4><?php echo $ufname . " &nbsp;&nbsp;" .$ulname; ?></h4>
                          </div>
                        </div>
                        <div class="details">
                          <div class="subject">
                            <h4>Gender&nbsp;&colon;</h4>
                          </div>
                          <div class="udetails">
                            <h4><?php echo $ugender?></h4>
                          </div>
                        </div>
                        <div class="details">
                          <div class="subject">
                            <h4>Location&nbsp;&colon;</h4>
                          </div>
                          <div class="udetails">
                            <h4><?php echo $ucity.'&comma;' . " &nbsp;&nbsp;" .$ucountry; ?></h4>
                          </div>
                        </div>
                        <div class="details">
                          <div class="subject">
                            <h4>Skills&nbsp;&colon;</h4>
                          </div>
                          <div class="udetails">
                            <h4><?php echo $uskill; ?></h4>
                          </div>
                        </div>
                        <div class="details">
                          <div class="subject">
                            <h4>Level&nbsp;&colon;</h4>
                          </div>
                          <div class="udetails">
                            <h4><?php echo $ulevel; ?></h4>
                          </div>
                        </div>
                        <div class="details">
                          <div class="subject">
                            <h4>Joined&nbsp;&colon;</h4>
                          </div>
                          <div class="udetails">
                            <h4><?php echo time_ago($ujoined); ?></h4>
                          </div>
                        </div>
                      </div>
                      <!-- user post information -->
                      <div class="user-post-info">

                      </div>
                    </div>
                  </div>

          <?php
              }

            }
          }
          else
          {
            # code...
          }
        ?>

        </article>
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
