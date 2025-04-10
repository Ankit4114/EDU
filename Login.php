<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        
        <?php
session_start();
include("databaseconn.php");

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
 
?>
      
        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>  
   <form action="Login.php " method="post">   
    <div class="container1">
        <div class="loginsec">
        <h2>Login </h2>
        <label>Enter your Email
        <input type="email" class="box1" placeholder="Email" name="iname"required></label>

        <label>Enter your Password
        <input type="password"  class="box1" placeholder="Password"  name="ipass" required></label>
        
        <button type="submit" class="button" name="logbtn" >Login</button>
        </div>
    </div>
    </form>
</body>
</html>

<style>
 body{
    align-items: center;
    padding-left: 300px;
    padding-right: 300px;
    padding-bottom: 300px;
    padding-top: 100px;
    background:black;
    overflow: hidden;
}
    .container1{
        margin-top: 50px;
   margin-bottom: 100px;
   margin-left: 200px;
   margin-right: 200px;
        height: 400px;
        width: 400px;
        background: linear-gradient(to bottom,#f79533, #f37055);
        border: 2px solid white;
        border-radius: 10px;  
    }

    /*  width: 100%;
    display: flex;
    margin: auto;
    border: 1px solid white;
    color:white;
    box-shadow: 0px 0px 10px 20px rgba(255, 255, 255, 0.2),0px 0px 0px 10px rgba(255, 252, 252, 0.19);
    border-radius: 20px;
    height: 400px;
    width: 600px;
   margin-top: 100px;
   margin-bottom: 100px;
   margin-left: 350px;
   margin-right: 200px;
   */
    .loginsec{
    display: flex;
    flex-direction: column;
    align-content: center;
}

h2{
    align-items: center;
    text-align: center;

}
label{
    margin:20px;
    padding-right: 10px;
    padding-left: 10px;
    display: flex;
    flex-direction: column;
    font-weight: bold;
}
.box1{
     margin:0px;
     height: 25px;
     border-radius:5px;
     text-align: center;

     
}
button{
    color: black;
    background-color:white;
    margin: 25px;
    border-radius: 30px; 
    height: 35px;
    font-family: Arial, Helvetica, sans-serif;

}
.button:hover{
    background-color:green;
    font-size: larger;
    font-weight: bold;
    cursor: grab;


}



</style>

