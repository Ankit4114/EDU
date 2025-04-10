<!doctype html>
<html lang="en">
    <?php
    session_start();
    include("databaseconn.php");
    
    if (isset($_POST['signin'])) {
        $usern = $_POST['uname'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
    
        // Check if the email already exists
        $checkEmailQuery = "SELECT * FROM `udetails` WHERE Email = '$email'";
        $checkEmailResult = mysqli_query($con, $checkEmailQuery);
    
        if (mysqli_num_rows($checkEmailResult) > 0) {
            //die("Error: Email already exists. Please use a different email.");
            echo "<script>alert('Error: Email already exists. Please use a different email.');</script>";
        } else {
            // Hash the password
            $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
    
            // Prepare the insert query
            $query = "INSERT INTO `udetails` (Name, Mobile, Email, Passwor) VALUES ('$usern', '$mobile', '$email', '$hashedPassword')";
            $run = mysqli_query($con, $query);
    
            if ($run) { // Check if the query was successful
                
               
                
                header("location: Login.php") ;
                
            } else {
                die("Error: " . mysqli_error($con)); // Show the error if the query fails
            }
        }
    }
    ?> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>create </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body style="overflow-x: hidden; background: black;">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row w-100 border p-4 rounded shadow">
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center border p-4 rounded shadow"
                style="background: linear-gradient(to bottom,#f79533, #f37055);">
                <h5>Welcome Back!</h5>
                <p>To keep connected with us please login</p>
                <p1>with your personal info</p1>
                <br></br>
                <button type="button" class="btn btn-secondary  custom-button" onclick="location.href='sign in.php'">Login</button>
            </div>
            <div class="col-md-6 border p-4 rounded shadow">
            <form action="" method="post">
                <h3 class="text-center">Create Account</h3>
                
                
                <div class="mb-2">
                    <input type="text" class="form-control" name="uname" placeholder="Name" required>
                </div>
                <div class="mb-2">
                    <input type="number" class="form-control" name="mobile" placeholder="Mobile No." required>
                </div>
                <div class="mb-2">
                    <input type="Email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="mb-2">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                
                <div class="mb-3 text-center">
                    <button  class="btn btn-primary  custom-button1" name="signin">SIGN UP</button>
                </div>
                </form>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous">
    
    
    
function openWin() {
  window.open("Sign in.php");
}
</script>
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
    background: linear-gradient(to bottom,#f79533, #f37055);
    /* Darker shade of secondary */
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