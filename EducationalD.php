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
        // Collecting form data
        $Scnm = $_POST['Snm'];    // School Name
        $Scaa = $_POST['Sca'];    // School Address
        $sperc = $_POST['sper'];   // School Percentage
        $Stmrk = $_POST['Tm'];     // School Total Marks
        $Smrko = $_POST['Mo'];     // School Marks Obtained
        $cnm = $_POST['Cnm'];      // College Name
        $Cadd = $_POST['Cad'];     // College Address
        $Cperc = $_POST['Cper'];   // College Percentage
        $Ctmrk = $_POST['Ctm'];    // College Total Marks
        $Cmrko = $_POST['Cmo'];    // College Marks Obtained
        $email = $_SESSION['email']; // Get the logged-in user's email
    
        // Insert data into the database
        $query = "INSERT INTO `education` (SchoolN, SchoolA, Spercentage, StotalM, SmarksO, CollegeN, CollegeA, Cpercentage, CtotalM, CtotalO, Email) 
                  VALUES ('$Scnm', '$Scaa', '$sperc', '$Stmrk', '$Smrko', '$cnm', '$Cadd', '$Cperc', '$Ctmrk', '$Cmrko', '$email')";
        $run = mysqli_query($con, $query);
    
        if ($run) {
            header("location:yourdetails.php");
            exit(); // Always exit after a header redirect
        } else {
            die("Error: " . mysqli_error($con)); // Show the error if the query fails
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
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Your Class</a>
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
        <span style="color:white; margin:7px;">
          <?php  echo $_SESSION['email']; ?>
        </span>
        <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" id="darkModeSwitch" checked>
        </div>
        <button class="btn btn-outline-danger" type="submit" onclick="confirmLogout()">LOGOUT</button>
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

    <div class="mb-6" style="margin-top: 57px;padding:5px;text-align: center;"> 
      <div class="col-md-6 container d-flex justify-content-center align-items-center h" id="darkModeSwitch">
        <p class="text-warning-emphasis fs-4" style="margin: 5px;">EDUCATIONAL DETAILS</p>
      </div>
    </div>
    <div class="  mb-3" style="  margin-top: 2px;padding:10px;border:4px solid rgb(250, 163, 2);text-align:center;">
      <h class="text-info-emphasis fs-2" style="padding:10px;color: aqua;">SCHOOL DETAILS</h>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="Snm" placeholder="School Name"required>
        <label for="floatingInput">School Name</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="exampleFormControlInput1" name="Sca" placeholder="School Address"required>
        <label for="floatingInput">School Address</label>
      </div>
      <div class="column input-group mb-3 " style="gap:5px; align-content: center;">
        <label>Aggregated Marks</label>
        <input type="number" class="form-control "name="Mo" id="schoolMarksObtained" oninput="calculateSchoolPercentage()"  placeholder="Marks Obtained" aria-label="Marks Obtained" required>
        <input type="number" class="form-control " name="Tm" id="schoolTotalMarks" oninput="calculateSchoolPercentage()" placeholder="Total Marks" aria-label="Total Marks" required>
        <input type="text" class="form-control"  name="sper" id="schoolPercentage"placeholder="percentage%" aria-label="percentage" readonly>

      </div>
    </div>
    <div class="  mb-3" style="  margin-top: 55px;padding:10px;border:4px solid rgb(250, 163, 2);text-align:center;">
      <h class="text-info-emphasis fs-2" style="padding:10px;color: aqua;">COLLEGE DETAILS</h>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="Cnm" id="exampleFormControlInput1" placeholder="College Name">
        <label for="floatingInput">College Name</label>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="Cad" id="exampleFormControlInput1" placeholder="College Address">
        <label for="floatingInput">College Address</label>
      </div>
      <div class="column input-group mb-3 " style="gap:5px; align-content: center;">
        <label>Aggregated Marks</label>
        <input type="number" class="form-control" name="Cmo" id="collegeMarksObtained" oninput="calculateCollegePercentage()"placeholder="Marks Obtained" aria-label="Marks Obtained" required>
        <input type="number" class="form-control" name="Ctm" id="collegeTotalMarks" oninput="calculateCollegePercentage()" placeholder="Total Marks" aria-label="Total Marks" required>
        <input type="text" class="form-control"  name="Cper" id="collegePercentage" placeholder="percentage%" aria-label="percentage" readonly>

      </div>
    </div>
    <br></br>
    <div class="  mb-3" style="text-align:center;">
      <button class="btn btn-outline-success" style="width:210px;border-radius: 20px;text-align: center;" type="submit"
        name="Submit">SUBMIT</button>
    </div>
    <!-- Bootstrap 5 switch -->


  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  
</body>
</html>
<script>
    function confirmLogout() {
        var result = confirm("Are you sure you want to log out?");
        if (result) {
            window.location.href = "logout.php"; // Change this to your logout URL
        }
    }

    function calculateSchoolPercentage() {
        var totalMarks = parseFloat(document.getElementById('schoolTotalMarks').value);
        var marksObtained = parseFloat(document.getElementById('schoolMarksObtained').value);
        var percentageField = document.getElementById('schoolPercentage');

        if (!isNaN(totalMarks) && !isNaN(marksObtained) && totalMarks > 0) {
            var percentage = (marksObtained / totalMarks) * 100;
            percentageField.value = percentage.toFixed(2); // Set the percentage with 2 decimal places
        } else {
            percentageField.value = ''; // Clear the field if inputs are invalid
        }
    }

    function calculateCollegePercentage() {
        var totalMarks = parseFloat(document.getElementById('collegeTotalMarks').value);
        var marksObtained = parseFloat(document.getElementById('collegeMarksObtained').value);
        var percentageField = document.getElementById('collegePercentage');

        if (!isNaN(totalMarks) && !isNaN(marksObtained) && totalMarks > 0) {
            var percentage = (marksObtained / totalMarks) * 100;
            percentageField.value = percentage.toFixed(2); // Set the percentage with 2 decimal places
        } else {
            percentageField.value = ''; // Clear the field if inputs are invalid
        }
    }
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
<style>
  :root {
    --background-color: white;
    --text-color: black;
}

[data-bs-theme='dark'] {
    --background-color: black;
    --text-color: white;
}

body {
    background-color: var(--background-color);
    color: var(--text-color);
}

.h {
    font-size: 32px;
    color: var(--text-color);
    border-style: outset;
    
}

</style>