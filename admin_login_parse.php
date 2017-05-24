<?php

// declaring variables
  $errorMsg = $username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // validation function
  function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  // collecting form data
      $username = validate($_POST['username']);
      $password = validate($_POST['password']);

    //connecting to the database
    require('db.php');
    $sql1 = "SELECT * FROM admin WHERE Username = '".$username."' AND Password = '".$password."' LIMIT 1";
    $res = mysqli_query($conn, $sql1) or die(mysql_error());

  // fetching data from database
  if (mysqli_num_rows($res) == 1) {
    $row = mysqli_fetch_assoc($res);
    $_SESSION['adminID'] = $row['AdminID'];
    $_SESSION['username'] = $row['Username'];
    $_SESSION['password'] = $row['Password'];
    $_SESSION['firstname'] = $row['FirstName'];
    $_SESSION['lastname'] = $row['LastName'];
    $_SESSION['gender'] = $row['Gender'];
    $_SESSION['avatar'] = $row['Avatar'];
    $_SESSION['email'] = $row['Email'];
    $_SESSION['city'] = $row['City'];
    $_SESSION['country'] = $row['Country'];

    header('location: admin.php');

  } else {
    $row = mysqli_fetch_assoc($res);
    $_SESSION['adminID'] = $row['AdminID'];
    $_SESSION['username'] = $row['Username'];
    $_SESSION['password'] = $row['Password'];
    $_SESSION['firstname'] = $row['FirstName'];
    $_SESSION['lastname'] = $row['LastName'];
    $_SESSION['avatar'] = $row['Avatar'];
    $_SESSION['city'] = $row['City'];
    $_SESSION['country'] = $row['Country'];

    //validating form
    if (empty($username) || empty($password) ) {
        $errorMsg ="<span class='error-msg'> &nbsp; &nbsp;Fields cannot be empty &nbsp;&nbsp;&nbsp; </span>";
    } elseif (($username != $row['username']) || ($password != $row['password'])) {
        $errorMsg ="<span class='error-msg'> Invalid username/password </span>";
    }
  }

}

 ?>
