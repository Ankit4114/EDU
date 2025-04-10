<?php
$con = mysqli_connect('localhost', 'root', '', 'user');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}/*else{
    echo "connection successful!";
}*/
?>