<?php
include 'process control.php';
if(isset($_POST['signin']))

{
$usern = $_POST['uname'];
$email = $_POST['email'];
$pass = $_POST['password'];
}
// Hash password for security (recommended)
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// Insert data into the database
$sql = "INSERT INTO user (uname, email , password) VALUES ('$usern', '$email' , '$hashed_password')";

if ($con->query($sql) === TRUE) 
//if(mysqli_query($con,$sql))                //new code that changes
{
    echo "<script>alert('Registration successful!')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
    //echo "Error:".mysqli_error($con);     //new code that changes
}
mysqli_close($con);   //new included code

// Close connection
$con->close();
?>