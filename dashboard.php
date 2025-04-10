<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EDUC</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
session_start();
include("databaseconn.php");

if (isset($_POST['Submit'])) {
    $fnm = $_POST['fnm'];
    $mnm = $_POST['mnm'];
    $lmn = $_POST['lmn'];
    $gen  = $_POST['gender'];
    $mobil = $_POST['mobile'];
    $addr = $_POST['addr'];
    $fatenm = $_POST['fatenm'];
    $mothnm = $_POST['mothnm']; 
    $email = $_SESSION['email']; // Get the logged-in user's email

    // Handle file upload
    $target_dir = "images/"; // Directory to save uploaded images
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo " Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo " Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Save the image path to the database
            $query = "INSERT INTO `dashdetail` (FirstN, MiddleN, LastN, GENDER, Mobile, Address, FatherN, MotherN, Email, ImagePath) 
                      VALUES ('$fnm', '$mnm', '$lmn', '$gen', '$mobil', '$addr', '$fatenm', '$mothnm', '$email', '$target_file')";
            $run = mysqli_query($con, $query);

            if ($run) { // Check if the query was successful
                header("location:EducationalD.php");
                exit(); // Always exit after a header redirect
            } else {
                die("Error: " . mysqli_error($con)); // Show the error if the query fails
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>


  </head>

<body style="overflow-x: hidden;">
  <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">EDUC</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
          <li>
            <i class="bi bi-house-door"></i>
          </li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="30" fill="white" class="bi bi-house-door"
            viewBox="0 0 16 16">
            <path
              d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
          </svg>
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="EducationalD.php">Your Class</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Details
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="yourdetails.php">YOUR DETAILS</a></li>
              <li><a class="dropdown-item" href="All Details.php">ALL DETAILS</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <span style="color:white; margin:7px;"><?php  echo $_SESSION['email']; ?></span>
        <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" id="darkModeSwitch" checked>
        </div>
        <button class="btn btn-outline-danger" type="submit" onclick="confirmLogout()" >LOGOUT</button>
        <script> function confirmLogout() {
          // Show a confirmation dialog
          var result = confirm("Are you sure you want to log out?");
          if (result) {
              // If the user confirms, redirect to the logout page
              window.location.href = "logout.php"; // Change this to your logout URL
          }
          
      }</script>

      </div>
    </div>
  </nav>

  <form action=" " method="post" enctype="multipart/form-data">
    <div class="  mb-3" style="  margin-top: 55px;padding:10px;border:4px solid rgb(250, 163, 2);text-align:center;">

      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="fnm">
        <label for="floatingInput">First Name</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="mnm">
        <label for="floatingInput">Middle Name</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="lmn">
        <label for="floatingInput">Last Name</label>
      </div>

      <div  style="margin:8px;border:2px solid rgb(102, 102, 206);">
        <label style="margin:10px;margin-right:35px;">GENDER</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="inlineRadio1" value="Male" name="gender">
          <label class="form-check-label" for="inlineRadio1">MALE</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="inlineRadio2" name="gender"value="Female">
          <label class="form-check-label" for="inlineRadio2">FEMALE</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" id="inlineRadio3"  name="gender" value="Others">
          <label class="form-check-label" for="inlineRadio3">OTHERS</label>
        </div>
      </div>
      <div class="form-floating mb-3">
        <input type="number" class="form-control" id="floatingInput" placeholder="Name">
        <label for="floatingPassword">Mobile Number</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="fatenm"required>
        <label for="floatingPassword">Father Name</label>
      </div>
      <div class="form-floating mb-3 ">
        <input type="text" class="form-control" id="floatingInput" placeholder="Name"name="mothnm"required>
        <label for="floatingInput">Mother Name</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="addr"required>
        <label for="floatingInput">Address</label>
      </div>
      <label class="form-label" for="customFile"name="imge">Upload A picture</label>
      <input type="file" class="form-control"  name="fileToUpload" id="fileToUpload" value="Upload Image" />
      <br></br>

      <button class="btn btn-outline-success" style="width:210px;border-radius: 20px;" type="submit" name="Submit" >SUBMIT</button>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"

    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous">
  </script>
</body>

</html>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const htmlElement = document.documentElement;
    const switchElement = document.getElementById('darkModeSwitch');

    // Set the default theme to dark if no setting is found in local storage
    const currentTheme = localStorage.getItem('bsTheme') || 'dark';
    htmlElement.setAttribute('data-bs-theme', currentTheme);
    switchElement.checked = currentTheme === 'dark';

    switchElement.addEventListener('change', function () {
        if (this.checked) {
            htmlElement.setAttribute('data-bs-theme', 'dark');
            localStorage.setItem('bsTheme', 'dark');
        } else {
            htmlElement.setAttribute('data-bs-theme', 'light');
            localStorage.setItem('bsTheme', 'light');
        }
    });
});
</script>