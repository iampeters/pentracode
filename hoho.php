
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
                <?php echo    '<img src=" "images\\"."users\\"'.$user_img . '" alt="user image" />'; ?>
            <?php echo ' </div>
                </td>
                <td> '; ?>
                <?php echo  '<h4><a href="profile.php">'. $lname ." ". $fname . '</a></h4>' ; ?>
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
          </div>
          <div class="post-reactions">
            <table>
              <tr>
                <td>
                  <p>'; ?>
                  <?php echo '&nbsp;&nbsp;  <i id="like" class="fa fa-thumbs-o-up"></i> &nbsp;<span>'. $likes. 'Likes</span>
                  </p>
                </td>
                <td></td>
                <td>
                  <p>
                    &nbsp;&nbsp;<i id="dislike" class="fa fa-thumbs-o-down"></i> &nbsp;<span>'. $dislikes. 'Dislikes</span>
                  </p>
                </td>
                <td><h1></h1></td>
                <td>
                  <p>
                    <i class="fa fa-comments-o"></i> <span>' .$comments. 'Comments</span>
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
    echo "<p align='center'; style='color: gray; margin-top: 50px'>There is nothing to display</p>";
  }

 ?>
