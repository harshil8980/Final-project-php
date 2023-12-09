<?php
//connection logic
$host = "localhost";
$username = "root";
$password = "";
$dbname = "finalproject";
$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>



