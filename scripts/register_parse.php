<?php

  if (isset($_POST['username']))
  {
    // validate function
    function validate($data)
    {
      $data = trim($data);
      // $data = strip_tags($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $username = validate($_POST['username']);
    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $password = validate($_POST['password']);
    $email = validate($_POST['email']);
    $confirm = validate($_POST['confirm']);
    $file = $_POST['image'];
    $default = "\user.png";

    //checking for empty fields
    if (empty($username) && empty($firstname) && empty($lastname) && empty($password) && empty($email) && empty($confirm))
    {
      echo "<span class='error-msg'> Please fill in all fields to register </span>";
      exit();
    }
    else
    {
      if (empty($firstname))
      {
        echo "<span class='error-msg'> Please enter your Firstname </span>";
        exit();
      }
      elseif (empty($lastname))
      {
        echo "<span class='error-msg'> Please enter your lastname </span>";
        exit();
      }
      elseif (empty($email))
      {
        echo "<span class='error-msg'> Please enter your email </span>";
        exit();
      }
      elseif (empty($username))
      {
        echo "<span class='error-msg'> Username field is empty </span>";
        exit();
      }
      elseif (empty($password))
      {
        echo "<span class='error-msg'> Password field is empty </span>";
        exit();
      }
      elseif (empty($confirm))
      {
        echo "<span class='error-msg'> Please confirm your password </span>";
        exit();
      }
      elseif (empty($username) || empty($firstname) || empty($lastname) || empty($password) || empty($email) || empty($confirm))
      {
        echo "<span class='error-msg'> Some fields are empty please check the fields and try again </span>";
        exit();
      }
    }

    $filepath = "images/"."users/"."user.png";
    move_uploaded_file($file, $filepath);

    // fetching data from database
    require('../db.php');

    // query for username and password
    $sql2 = "SELECT Username, Email FROM users where Username = '".$username."' AND Email = '".$email."' ";
    $res2 = mysqli_query($conn, $sql2) or die(mysql_error());
    $row2 = mysqli_fetch_assoc($res2);

    if (mysqli_num_rows($res2) == 1)
    {
      $dbusername = $row2['Username'];
      $dbemail = $row2['Email'];
      // validating form  email
      if ($username == $dbusername && $email == $dbemail)
      {
        echo "<span class='error-msg'> Username  and email already taken</span>";
      }
      $conn->close();
      exit();
    }

    // checking email existance
    $sql = "SELECT Email FROM users where Email = '".$email."'";
    $res = mysqli_query($conn, $sql) or die(mysql_error());
    $row = mysqli_fetch_assoc($res);
    // fetching data from database
    if (mysqli_num_rows($res) == 1)
    {
      $dbemail = $row['Email'];
      // validating form  email
      if ($email == $dbemail)
      {
        echo "<span class='error-msg'> Email already exist </span>";
      }
      $conn->close();
      exit();
    }


    // query for username
    $sql1 = "SELECT Username FROM users where Email = '".$username."'";
    $res1 = mysqli_query($conn, $sql1) or die(mysql_error());
    $row1 = mysqli_fetch_assoc($res1);

    if (mysqli_num_rows($res1) == 1)
    {
      $dbusername = $row1['Username'];
      // validating form  email
      if ($username == $dbusername)
      {
        echo "<span class='error-msg'> Username  already taken</span>";
      }
      $conn->close();
      exit();
    }

    //checking if password match
    if ($password != $confirm)
    {
      echo "<span class='error-msg'>Password does not match</span>";
      exit();
    }
    else
    {
      $encpass = password_hash($password, PASSWORD_DEFAULT);
      //inserting into database
      $sql3 = "INSERT INTO users (UserID, LastName, FirstName, Username, Email, Password, Avatar) " . "VALUES('', '$lastname', '$firstname', '$username', '$email', '$encpass', '$default')";

      if (mysqli_query($conn, $sql3))
      {
        echo "<span class='success'><i class='fa fa-check'></i> &nbsp; Registration successful <a href='login.php'> &nbsp;&nbsp;Login</a> to access your account </span>";

        $conn->close();
        exit();
      }
      else
      {
         echo "<span class='error-msg'>Something went wrong" . mysql_error() . "</span>";
         exit();
      }
    }

  }

?>
