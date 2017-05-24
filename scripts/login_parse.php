<?php

// declaring variables
  $errorMsg = $username = $password = "";

  if (isset($_POST['username']) && isset($_POST['password']))
  {
    // validation function
    function validate($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    // collecting form data
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);


      //validating form
      if (empty($username) && empty($password) ) {
          echo "<span class='error-msg'> Please enter your username and password </span>";
          exit();
      }
      else
      {
        if (empty($username))
        {
          echo "<span class='error-msg'> Please enter your username </span>";
          exit();
        }
        elseif (empty($password))
        {
          echo "<span class='error-msg'> Please enter your password </span>";
          exit();
        }
      }


      //connecting to the database
      require('../db.php');
      $sql1 ="SELECT * FROM users where Username = '".$username."'";
      $res1 = mysqli_query($conn, $sql1) or die(mysql_error());
      if (mysqli_num_rows($res1) == 1)
      {
        $row = mysqli_fetch_assoc($res1);
        $hash_pass = $row['Password'];
        $hash = password_verify($password, $hash_pass);

        if ($hash == 0)
        {
          echo "<span class='error-msg'> Invalid Password  </span>";
          exit();
        }
        else
        {
          //connecting to the database
          require('../db.php');

          $sql = "SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$hash_pass."'";
          $res = mysqli_query($conn, $sql) or die(mysql_error());

          // fetching data from database
          if (mysqli_num_rows($res) == 1)
          {
            $row = mysqli_fetch_assoc($res);

            if (($username != $row['Username']) && ($hash_pass != $row['Password']))
            {
              echo "<span class='error-msg'> Incorrect username/password </span>";
              exit();
            }
            elseif ($username != $row['Username'])
            {
              echo "<span class='error-msg'> Username does not exist </span>";
              exit();
            }
            elseif ($hash_pass != $row['Password'])
            {
              echo "<span class='error-msg'> Password is incorrect </span>";
              exit();
            }
            else
            {
              session_start();
              $_SESSION['uid'] = $row['UserID'];
              echo "success";
            }
            $conn->close();
          }
          else
          {
            echo "<span class='error-msg'> Invalid Username and Password  </span>";
          }
        }
      }
      else
      {
        echo "<span class='error-msg'> Invalid Username and Password  </span>";
      }

  }

?>
