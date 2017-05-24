<?php

// declaring variables
  $errorMsg = $userskills = $usercity = $usercountry = $userimg = $target = $userPic = "";

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    // validation function
    function validate($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    //the path to store the uploaded FilesystemIterator
    $target = "images/" . "users/".$userPic;

    // collecting form data
    $userimg = $_FILES['avatar']['name'];
    $filetype = $_FILES['avatar']['type'];
    $fileTmpLoc = validate($_FILES['avatar']['tmp_name']);
    $kaboom = explode(".", $userimg);
    $fileExt = end($kaboom);
    $userPic = $username .".". $fileExt;
    $usercity = validate($_POST['city']);
    $usergender = validate($_POST['gender']);
    $userskills = validate($_POST['skill']);
    $usercountry = validate($_POST['country']);

    $genderarr  = array("male", "Male", "MALE", "FEMALE", "female", "Female" );
    if (empty($usercity) || empty($userimg) || empty($usercountry) || empty($userskills) || empty($usergender)) {
        $errorMsg ="<span class='error-msg'> &nbsp; &nbsp;Fields cannot be empty &nbsp;&nbsp;&nbsp; </span>";
    } elseif (!in_array($usergender, $genderarr)) {
        $errorMsg ="<span class='error-msg'> &nbsp; &nbsp;Gender can only be male or female &nbsp;&nbsp;&nbsp; </span>";
    } else {
        // moving the uploaded file to the image folder in the server
          $move = move_uploaded_file($_FILES['avatar']['tmp_name'], $target);
          if ($move) {
            $errorMsg ="<span class='success'> &nbsp; &nbsp; File moved successfully &nbsp;&nbsp;&nbsp; </span>";
          } else {
            $errorMsg ="<span class='error-msg'> &nbsp; &nbsp; An unknown error occurred &nbsp;&nbsp;&nbsp; </span>";
          }

          $move = move_uploaded_file($_FILES['avatar']['tmp_name'], $target);
      //connecting to the database
      require('db.php');
      $sql = "UPDATE  users SET Avatar = '".$userPic."', City = '".$usercity."', Skills = '".$userskills."', Country = '".$usercountry."', Gender = '".$usergender."' WHERE UserID = '".$uid."' ";

      if (mysqli_query($conn, $sql)) {
        $errorMsg ="<span class='success'> &nbsp; &nbsp;Updated successfully &nbsp;&nbsp;&nbsp; </span>";
        move_uploaded_file($userTmpLoc, $target);
        header('location: profile.php');
      }
    }
  }


 ?>
