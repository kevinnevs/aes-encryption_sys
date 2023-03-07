<?php
// This Sets the MySQL database information
$servername = "localhost";
$username = "myuser";
$password = "r00t";
$dbname = "mydatabase";

// Creates a connection to the MySQL database
$mysqli = new mysqli(hostname: $servername, 
                     username: $username,
                     password: $password,
                     database: $dbname);

// Checks if the connection was successful
if ($mysqli->connect_errno) {
  die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;
?>