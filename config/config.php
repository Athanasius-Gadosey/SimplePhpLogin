<?php

$hostname= "localhost";
$username= "root";
$password= "";
$dbname= "simplephplogin";

$conn = new mysqli($hostname, $username, $password, $dbname);

if($conn->connect_error) {
    die("Connection Passed:". $conn->connect_error);
}

?>
