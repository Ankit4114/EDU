<?php
 /*include 'databaseconn.php';

                              /*New code 17032025 signup verification 
if (isset($_POST['signin'])) {
    $usern = $_POST['uname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Check if the email already exists
    $checkEmailQuery = "SELECT * FROM `udetails` WHERE Email = '$email'";
    $checkEmailResult = mysqli_query($con, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        die("Error: Email already exists. Please use a different email.");
    } else {
        // Hash the password
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

        // Prepare the insert query
        $query = "INSERT INTO `udetails` (Name, Mobile, Email, Passwor) VALUES ('$usern', '$mobile', '$email', '$hashedPassword')";
        $run = mysqli_query($con, $query);

        if ($run) { // Check if the query was successful
            header("location:Login.php") ;
            exit(); 
        } else {
            die("Error: " . mysqli_error($con)); // Show the error if the query fails
        }
    }
}
       */ 

                        // new code


                        /*/17032025 commented  login verification

                        if ($_SERVER["REQUEST_METHOD"] == "POST"   && isset($_POST['logbtn'])) {
                            
                        
                            $email1 = $_POST['iname'];
                            $pass1 = $_POST['ipass'];
                        
                            
                            $email1 = mysqli_real_escape_string($con, $email1);
                        
                            // SQL query to check for matching email
                            $sql = "SELECT * FROM udetails WHERE Email='$email1'";
                            $result = mysqli_query($con, $sql);
                        
                            if ($result) {
                                if (mysqli_num_rows($result) > 0) {
                                    // Fetch the user data
                                    $user = mysqli_fetch_assoc($result);
                                    // Verify the password
                                    if (password_verify($pass1, $user['Passwor'])) {
                                        // Login successful
                                        session_start(); // Start the session
                                        $_SESSION['email'] = $email1; // Store email in session
                                        header("Location: dashboard.php");
                                        session_start(); 
                                    } else {
                                        // Invalid password
                                        echo "Invalid password.";
                                    }
                                } else {
                                    // Invalid email
                                    echo "Invalid email.";
                                }
                            } else {
                                // Query execution error
                                echo "Error executing query: " . mysqli_error($con);
                            }
                        
                            // Close the database connection
                            // mysqli_close($con);
                        }
                        else{
                            
                            header("location:create account.php");
                        }    */


    /*/dashboard Details  17032005
if (isset($_POST['Submit'])) {
    $fnm = $_POST['fnm'];
    $mnm = $_POST['mnm'];
    $lmn = $_POST['lmn'];
    $gen  = $_POST['gender'];
    $mobil = $_POST['mobile'];
    $addr = $_POST['addr'];
    $fatenm = $_POST['fatenm'];
    $mothnm = $_POST['mothnm'];

    $query = "INSERT INTO `dashdetail` (FirstN , MiddleN , LastN ,GENDER, Mobile , Address , FatherN , MotherN) VALUES ('$fnm' , '$mnm' , '$lmn' ,'$gen', '$mobil' , '$addr' , '$fatenm' , '$mothnm')";
    $run = mysqli_query($con, $query);

    if ($run) { // Check if the query was successful
        header("location:dashboard.php");
    } else {
        die("Error: " . mysqli_error($con)); // Show the error if the query fails
    }
}
   mysqli_close($con);*/
?>