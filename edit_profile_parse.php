<?php

// declaring variables
  $errorMsg = $fname = $lname = $user = $pass = $form_email = $form_city = $form_skill= $form_country = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // validation function
  function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  // collecting form data
    $comfirm = validate($_POST['comfirmPassword']);
    $pass = validate($_POST['password']);
    $user = validate($_POST['username']);
    $lname = validate($_POST['lname']);
    $fname = validate($_POST['fname']);
    $form_email = validate($_POST['email']);
    $form_skill = validate($_POST['skill']);
    $form_city = validate($_POST['city']);
    $form_country = validate($_POST['country']);

      //validating form
      if (empty($fname) || empty($email) || empty($form_skill) || empty($form_country) || empty($form_city) || empty($lname) || empty($user) || empty($pass)){
          $errorMsg = "<span class='error-msg'> Fields cannot be empty </span>";

      } elseif ($pass != $comfirm) {
          $errorMsg = "<span class='error-msg'> Password does not match </span>";

      }  else {
          //connecting to the database
          require('db.php');
          $sql = "UPDATE users set LastName = '$lname', FirstName = '$fname', Username = '$user', Email = '$form_email', Password = '$pass' where UserID = $uid";

          if (mysqli_query($conn, $sql)){
            $errorMsg = "<span class='success'><i class='fa fa-check'></i> &nbsp; Profile updated succcessfully";
            Header('location: profile.php');

            $conn->close();
          } else {
             die(mysql_error());
          }
        }

}

 ?>
