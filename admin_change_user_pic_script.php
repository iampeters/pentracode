<?php

if (!isset($_SESSION['adminID'])) {
  header('location: admin_login.php');
}

// declaring variables
  $errorMsg =  $userimg = $target = $userTmpLoc = "";

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    // validation function
    function validate($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    //the path to store the uploaded FilesystemIterator
    $target = "images/"."admin_pics/".basename($_FILES['avatar']['name']);

    // collecting form data
    $userimg = $username.'_'.validate($_FILES['avatar']['name']);
    $userTmpLoc = $_FILES['avatar']['tmp_name'];
    $kaboom = explode(".", $userimg);
    $Ext = end($kaboom);
    $img = $username.".".$Ext;
    if (empty($userimg)) {
        $errorMsg ="<span class='error-msg'> &nbsp; &nbsp;Please select an image &nbsp;&nbsp;&nbsp; </span>";
    } else {
        require('db.php');
        $sql1 = "SELECT Avatar from admin where AdminID = '$aid' LIMIT 1";
        $res1 = mysqli_query($conn, $sql1) or die(mysql_error());
        if (mysqli_num_rows($res1) == 1) {
          $row1 = mysqli_fetch_assoc($res1);
          $user_img = $row1['Avatar'];
          if ($user_img != "") {
            $userimgLoc = "images\\"."admin_pics\\".$user_img;
            if (file_exists( $userimgLoc)) {
              unlink($userimgLoc);
            } else {
              move_uploaded_file($userTmpLoc, $userimgLoc);
            }
            move_uploaded_file($userTmpLoc, $userimgLoc);
          }
          }
          //connecting to the database
          require('db.php');
          $sql = "UPDATE  admin SET Avatar = '".$img."' WHERE AdminID = '".$aid."' ";
          if (mysqli_query($conn, $sql)) {
            $errorMsg ="<span class='success'> &nbsp; &nbsp;Updated successfully &nbsp;&nbsp;&nbsp; </span>";
            header('location: admin_profile.php');
        }
      }
  }


 ?>
