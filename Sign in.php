<!doctype html>
<html lang="en">
    <?php
    session_start();
    include("databaseconn.php");
    $errorMessage = " ";
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
                    $_SESSION['email'] = $email1; // Store email in session
                    header("Location: dashboard.php");
                    exit();
                    
                } else {
                    // Invalid password
                    $errorMessage = "Invalid password.";
                }
            } else {
                // Invalid email
                $errorMessage = "Invalid Email.";
            }
        } else {
            // Query execution error
            echo "Error executing query: " . mysqli_error($con);
        }
    
        // Close the database connection
        // mysqli_close($con);
    }
    /*else{
        
        header("location:create account.php");
    } */
    ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body style="overflow-x: hidden; background: black;">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row w-100 border p-4 rounded shadow">
            <div class="col-md-6 " >
                <form action="" method="post" class=" border p-4 rounded shadow" >
                    <h3 class="text-center">Sign in</h3>
                    <h5 class="text-center">or use your account</h5>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="iname" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="ipass" placeholder="Password" required>
                    </div>
                    <div class="mb-3 text-center">
                        <a href="#" class="text-decoration-none">Forget your password?</a>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary  custom-button1" name="logbtn">Login</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center border p-4 rounded shadow" style="background: linear-gradient(to bottom,#f79533, #f37055);">
                <h5>Hello, Friend!</h5>
                <p>Enter your personal details and start your journey with us.</p>
                <button type="button" class="btn btn-secondary custom-button" onclick="location.href='create account.php'">SIGN UP</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>

<style>
.custom-button {
    transition: background-color 0.3s;
    padding-left:50px;
    padding-right:50px;
    border-radius: 20px;
    border:2px transparent;
    background:transparent;
}

.custom-button:hover {
    background: linear-gradient(to bottom,#f79533, #f37055);/* Darker shade of secondary */
    color: black; /* Change text color on hover */
    
}
.custom-button1 {
    transition: background-color 0.3s;
    padding-left:50px;
    padding-right:50px;
    border-radius: 20px;
    border:2px black;
    background: transparent;
}

.custom-button1:hover {
    background-color:rgb(6, 135, 233); /* Darker shade of secondary */
    color: black; /* Change text color on hover */
    
}

</style>