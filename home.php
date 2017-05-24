<?php

  // starting session
  session_start();
  if (isset($_SESSION['uid']))
  {
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
      // $city = $row['City'];
      $skills = $row['Skills'];
      // $country = $row['Country'];
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



  $post = $post_title = $post_dsc = $post_img = $post_imgTmpLoc = $errorMsg = "";
 ?>


<DOCTYPE html>
<html>
<head>
  <title>Pentracode | Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/main_style.css"?t = <?php echo time(); ?> />
  <link rel="stylesheet" type=" text/css" href="css/layout.css"?t = <?php echo time(); ?> />
  <link rel="stylesheet" type=" text/css" href="css/mediaquery.css"?t = <?php echo time(); ?> />
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
  <link rel="stylesheet" type="text/css" href="css/home.css"/>
  <script src="js/jquery.js"></script>
  <script src="js/script.js" ?t = <?php echo time(); ?> ></script>
  <script src="js/post.js" ?t = <?php echo time(); ?> ></script>
</head>
<body>
  <!-- overall-wrap -->
  <div class="overall-wrap" id="overall-wrap">

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
          <li><a href="index.php" id="active"><i class="fa fa-code icon"></i> Discussion </a></li>
          <li><a href="images.php"><i class="fa fa-camera icon "></i>  Photos </a></li>
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
        <div class="news-feed">
          <div class="user-form-holder">
            <form id="user-form" action="" method="post" enctype="multipart/form-data">
              <div class="error"></div>
              <div class="user-post-field-holder">
                  <div class="user-img-holder">
                    <img src="<?php echo 'images/'."users/".$avatar; ?>" alt="user image" />
                  </div><span><h3 style="margin:25px 0 0 80px; font-size:17px; color:rgba(5,5,5,.5);">Ask a Question or Post an Article</h3></span>
                  <div class="user-post-field">

                      <table id="table">
                        <tr class="tr">
                          <td class="td">
                            <textarea name="title" id="post_title" placeholder="Title"><?php if (isset($_POST['title'])){ echo $_POST['title'];} ?></textarea>
                          </td>
                        </tr>
                        <tr class="tr">
                          <td class="td">
                            <textarea name="post_dsc" id="post-content" placeholder="Description"><?php if (isset($_POST['post_dsc'])){ echo  $_POST['post_dsc']; } ?></textarea>
                          </td>
                        </tr>
                      </table>
                  </div>
              </div>
              <div class="post-options-holder">
                <ul>
                  <li><input type='submit' id="post" value="Post" name="post"/></li>
                  <li>
                    <label for="post-img"><i class="fa fa-camera"></i></label>
                    <input type="file" name="file" id="post-img"/>
                  </li>
                  <li style=" margin:0; width: 370px; word-wrap: break-word; text-align: right;"><span id="post-img-label"></span></li>
                  <!-- <li>Lorem ipsum</li> -->
                </ul>
              </div>
            </form>
          </div>
          <!-- article: will house the articles, discussions and so forth -->
          <article id="post-holder">
            <!-- post will be displayed here -->
            <?php

              $form = "";
              require_once('timeago.php');
              require('db.php');

              $sql = "SELECT * from post  order by PostID desc limit 5";
              $res = mysqli_query($conn, $sql) or die(mysql_error());

              if (mysqli_num_rows($res) > 0)
              {
                while ($row = mysqli_fetch_assoc($res))
                {
                  $pid = $row['PostID'];
                  $author = $row['Username'];
                  $p_title = $row['PostTitle'];
                  $text = $row['PostText'];
                  $likes = $row['Likes'];
                  $dislikes = $row['Dislikes'];
                  $time = $row['PostTime'];
                  $p_img = $row['Images'];
                  $comments = $row['comments'];

                // echo '
                ?>

                  <?php echo '<div class="post-field-holder">'; ?>
                  <?php echo '  <div class="post-header">'; ?>
                  <?php echo '<table>'; ?>
                              <?php
                                require('db.php');
                                $sql1 = "SELECT * from users where Username = '".$author."'";
                                $res1 = mysqli_query($conn, $sql1);
                                if (mysqli_num_rows($res1)) {
                                  $row1 = mysqli_fetch_assoc($res1);
                                  $city = $row1['City'];
                                  $country = $row1['Country'];
                                  $fname = $row1['Firstname'];
                                  $lname = $row1['Lastname'];
                                  $user_img = $row1['Avatar'];
                                }

                                ?>
                        <?php echo ' <tr> '; ?>
                        <?php echo ' <td>'; ?>
                        <?php echo ' <div class="user-pic-holder">'; ?>
                            <?php echo    '<img src="' . "images/"."users/" .$user_img . '" alt="user image" />'; ?>
                        <?php echo ' </div>
                            </td>
                            <td> '; ?>
                            <?php echo  '<h4><a href="users.php?user='.$author . '">'. $lname ." ". $fname . '</a></h4>' ; ?>
                            <?php echo  '<h6>' . $city.', '. $country . '</h6>'; ?>
                          <?php echo  '  </td>
                            <td><h1></h1></td>
                            <td>'; ?>
                            <?php echo '<h5>' . time_ago($time).'</h5>'; ?>
                            <?php echo '</td>
                          </tr>
                        </table>
                    </div>
                    <div class="post-content">
                      <div class="post-title">';?>
                      <?php echo '<h4>'. $p_title. '</h4>
                      </div>
                      <div class="post-desc">'; ?>
                      <?php echo  '<p>' . $text. '</p>
                      </div>';?>
                      <?php echo '<p align="center"; style="margin:0 auto; padding: 0; height:300px; overflow: hidden"><a href="images/original.png" target="_blanc"><img src="images/original.png" width="auto" height="100%"/></a></p>'; ?>
                      <?php echo  '
                      <div class="post-reactions">
                        <table>
                          <tr>
                            <td>
                              <p>'; ?>
                              <?php echo '&nbsp;&nbsp;  <i id="like" class="fa fa-thumbs-o-up"></i> &nbsp;<span>'. $likes. ' ' .'Likes</span>
                              </p>
                            </td>
                            <td></td>
                            <td>
                              <p>
                                &nbsp;&nbsp;<i id="dislike" class="fa fa-thumbs-o-down"></i> &nbsp;<span>'. $dislikes. ' ' .'Dislikes</span>
                              </p>
                            </td>
                            <td><h1></h1></td>
                            <td>
                              <p>
                                <i class="fa fa-comments-o"></i> <span>' .$comments.' ' . 'Comments</span>
                              </p>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <form action="" method="post" id="comments-form">
                      <!-- user comments will be here -->
                      <div class="post-reply">
                        <table>
                          <tr>
                            <td>
                              <textarea name="comment" id="comment" placeholder="Reply" rows="3"></textarea>
                            </td>
                            <td></td>
                            <td>
                              <div class="btn">
                                <input type="submit" id="reply" name="reply_btn" value="Reply"/>
                              </div>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </form>
                  </div>
            ' ;?>
                  <!-- '; -->
            <?php
                }
              }
              else
              {
                echo "<p align='center'; style='font-size:20px; font-weight:500px;color: #a1a1a1; margin-top: 50px'>There are no posts to display</p>";
              }

            ?>


          </article>
        </div>
        <div class="information">
        </div>
        <!-- <div class="test">hohohao</div> -->
      </section>

      <!-- aside right -->
      <aside class="asideRight">
        <!-- footer -->
        <footer>Copyright © 2010-2017  |  www.pentracode.com</footer>
      <div class="Right-aside-wrap">

        </div>
      </aside>
    </div>

    <!-- footer -->
    <footer class="foot">Copyright © 2010-2017  |  www.pentracode.com</footer>
  </div>
  <script lang="javascript">
  $(function(){

    var file = $(this)[0].file;
  // file upload script
  $("#post-img").on("change", function(e){
    var filename = e.target.value.split('/').pop();
    $('#post-img-label').text(filename);
  });



  });

  </script>
</body>
</html>
