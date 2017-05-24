<?php

$dbhost = "localhost";
$dbuser ="chikezie";
$dbpass = "iampeters91";
$dbname = "pentracode";

//connection
$conn = mysqli_connect("$dbhost", "$dbuser", "$dbpass", "$dbname");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 ?>
