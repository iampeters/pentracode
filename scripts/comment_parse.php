<?php
session_start();
if (isset($_SESSION['uid']))
{
  $post = $post_title = $post_dsc = $post_img = $post_imgTmpLoc = $errorMsg = "";

  //session variables
  $uid = $_SESSION['uid'];
  require('..\db.php');
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
      return $data;
    }

    //the path to store the uploaded FilesystemIterator

    // collecting form data
      $comment = validate($_POST['comment']);
      // $post_imgTmpLoc = $_FILES['post_img']['tmp_name'];
      // $post_img = $_POST['file'];
      // $kaboom = explode(".", $post_img);
      // $Ext = end($kaboom);
      // $img = $username.".".$Ext;

      // $target = "images/"."posts/".$username.$post_img;
      //validating image file
      // if (!empty($post_img))
      // {
      //   $kaboom = explode(".", $post_img);
      //   $Ext = end($kaboom);
      //   $img = $username.".".$Ext;
      //
      // // moving the uploaded file to the image folder in the server
      //   move_uploaded_file($post_img, $target);
      // }

      //form validation
      if (empty($comment))
      {
        echo "error";
        exit();
      }
      else
      {
        //database connection
        require_once('..\db.php');
        $sql = "INSERT INTO comments (CommentID, PostID, Username, Comment)" . " VALUES('', '$postid', '$username',  '$comment') ";
        if (mysqli_query($conn, $sql))
        {
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
    header('location: ..\home.php');
  }
}
else
{
  header('location: ..\login.php');
  exit();
}

?>
