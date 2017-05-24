<?php
session_start();
if (isset($_SESSION['uid']))
{
  $post = $post_title = $post_dsc = $post_img = $post_imgTmpLoc = $errorMsg = $target = "";

  //session variables
  $uid = $_SESSION['uid'];
  require('../db.php');
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

  }

  if (isset($_POST['task']))
  {
    //initializing empty variables
    $post = $post_title = $post_dsc = $post_img = $post_imgTmpLoc = $errorMsg = "";
    // validation function
    function validate($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      $data = addslashes($data);
      return $data;
    }

    //the path to store the uploaded FilesystemIterator

    // collecting form data
      $post_title = validate($_POST['title']);
      $post_dsc = validate($_POST['description']);
      // $post_img = $_FILES['file']['name'];
      // $postimgTmpLoc = $_FILES['file']['tmp_name'];

      //form validation
      if (empty($post_title) && empty($post_dsc))
      {
        echo "<span class='error-msg'> Post fields cannot be empty </span>";
        exit();
      }
      elseif (empty($post_title))
      {
        echo "<span class='error-msg'> Please enter a title for your post </span>";
        exit();
      }
      elseif (empty($post_dsc))
      {
        echo "<span class='error-msg'> Please describe your post </span>";
        exit();
      }

      if (!empty($post_img))
        {
          //database connection
          require_once('../db.php');
          $sql = "INSERT INTO post (PostID, Username, PostTitle, PostText, Images)" . " VALUES('', '$username',  '$post_title', '$post_dsc', '$post_img') ";
          if (mysqli_query($conn, $sql))
          {
            $target = "images/"."posts/".$username.'_'.$post_img;
            //validating image file

            // moving the uploaded file to the image folder in the server
              move_uploaded_file($post_img, $target);

            echo "<span class='success'> Post updated successfully </span>";
          }
          else
          {
            echo "<span class='error-msg'> Oops! Something went wrong please try again </span>";
            exit();
          }
        }
        else
        {
          //database connection
          require_once('../db.php');
          $sql = "INSERT INTO post (PostID, Username, PostTitle, PostText)" . " VALUES('', '$username',  '$post_title', '$post_dsc') ";
          if (mysqli_query($conn, $sql)) {
            echo "<span class='success'> Post updated successfully </span>";
          }
          else
          {
            echo "<span class='error-msg'> Oops! Something went wrong please try again </span>";
            exit();
          }
        }
  }
  else
  {
    header('location: ../home.php');
  }
}
else
{
  header('location: ../login.php');
  exit();
}

 ?>
