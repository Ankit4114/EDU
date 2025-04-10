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
       
       
       
        
        <!-- Bootstrap CSS v5.2.1 -->
        
    </head>
      
         
  

<?php
session_start();
include("databaseconn.php");

// Check if user is logged in
if (!isset($_SESSION["email"])) {
    header("Location: Login.php");
    exit();
}

$email = $_SESSION["email"];

// Fetch user data from dashdetails
$sql = "SELECT * FROM dashdetail WHERE Email='$email'";
$dataResult = mysqli_query($con, $sql);
$userData = mysqli_fetch_assoc($dataResult);
?>
    
   
    <form action=" process control.php" method="post">  
 
    
    <nav>
      <div class="nav-links" >
        
            
            <a  class="navlinks"   href="dashboard.php">Home</a>
            <a  class="navlinks" href="#your-class">Your Class</a>
            
            <span class="username"><?php  echo $_SESSION['email']; ?></span>
        
        <a  class="logout" onclick="confirmLogout()">Logout</a>
       </div>
    </nav> 
    <body > 
     <div class="side-menu">
      <li>  <a  href="">Your Details  </a> </li>
      <li>  <a  href="All Details.php">All Details </a>  </li>
      <li>  <a  href="">Your Details  </a> </li> 

      
      </div>   

      
        <div class="loginsec">
        <h2>Your Personal Details</h2>
        <br></br>
           <table class="table">
            <tr> 

            <?php if(!empty ($userData)  && is_array($userData)):?>
                <th>First Name</th>  <td> <?php echo $userData['FirstN']; ?> </td>
            </tr>
            <tr>
                <th>Middle Name</th>  <td> <?php echo $userData['MiddleN']; ?> </td>
            </tr>
            <tr>  
                <th>Last Name</th>    <td><?php echo $userData['LastN']; ?>  </td>
             </tr>
             
             <tr>  
                <th>Gender</th>        <td><?php echo $userData['GENDER']; ?>  </td>
             </tr>
             <tr>  
                <th>Mobile Number</th>   <td>  <?php echo $userData['Mobile']; ?></td>
             </tr>
             <tr>  
                <th>Address</th>        <td>  <?php echo $userData['Address']; ?></td>
             </tr>
             <tr>  
                <th>Father's Name</th>    <td> <?php echo $userData['FatherN']; ?> </td>
             </tr>
             <tr>  
                <th>Mother's Name</th>   <td>  <?php echo $userData['MotherN']; ?></td>
             </tr>
             <?php else: ?>
                
        <td   class="no_data" colspan="10" >
            <br></br>
        <a  href="dashboard.php">Tap to Enter Details</a>
             </td>
                
    <?php endif; ?>
             </table>
                   
               <div>

             <?php if (!empty($userData['ImagePath'])) :?>
                 <img src="<?php echo htmlspecialchars($userData['ImagePath']); ?>" alt="Uploaded Image" class="pic"  >
            <?php else: ?>
            <a href="dashboard.php" class="pic" ></a>
                
            <?php endif; ?>
               
            </div>
</div>   
    </form>
    </body>
</html>

<script>
        function confirmLogout() {
            // Show a confirmation dialog
            var result = confirm("Are you sure you want to log out?");
            if (result) {
                // If the user confirms, redirect to the logout page
                window.location.href = "logout.php"; // Change this to your logout URL
            }
            
        }

</script>


     
<style>



body{
            
            
            background:grey;
            overflow-x: hidden;
            display: flex;
            width: 1345px;
           
        }
        nav{
            height: 45px;
            background: #000;
            flex-direction: row;
            border: 2px solid rgb(184, 45, 45);
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            position: fixed;
            width: 1345px;
            top:0;
            left:0;
            z-index: 1000;
        }
        
        
        
        
        .nav-links{
            
           margin: 5px;
           align-items: center;
           font-family: Arial, Helvetica, sans-serif;
           font-weight: bolder;
           font-size: larger;
           gap: 30px;
           
        
        }
        
        
        .nav-links a{
            color: white;
            font-size: larger;
            align-items: center;
            text-decoration: none;
            margin-bottom: 4px;
            padding-top: 10x;
            padding-right: 15px;
            padding-left: 10px;
            
        
        }
        .navlinks:hover{
            color: blue;
            text-decoration: dotted;
            
          
        }
        .username {
            color: white;
            font-weight: bold;
            padding-left: 800px;
          
}
        
.nav-links a.logout {
            background-color: rgb(12, 12, 12);
            color: rgb(252, 4, 4);
            padding: 8px ;
            padding-top: 0px ;
            border-radius: 20px;
            padding-top: 0px;
            padding-bottom:  3px;
            text-decoration: none;
            float:  right;
            align-items: center;
        }
        .nav-links a.logout:hover{
            background-color: rgb(250, 12, 12);
            border-radius:30px;
            padding:8px;
            padding-top:2px;
            padding-bottom:2px;
            color: rgb(247, 244, 244);
        }
        .side-menu{
            background:rgb(37, 35, 35);
            border:3px solid #f37055;
            float: left;
            align-items: center;
            height:590px;
            width:200px;
            margin-top:40px;
            position: fixed;
            top:9px;
            left:0px;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
        li{
            padding:5px;
            display:flex;
            flex-direction:column;
            margin:5px;
            align-items:center;
        
            
        }
        .side-menu a{
            flex-direction: column;
            gap:20px;
            font-size:25px;
            color:white;
            text-decoration: none;
            
            

        }
        .side-menu a:hover{
        color:white;
        font-size:23px;
        text-decoration: underline;
        }
        .loginsec{
           background:rgb(181, 187, 187);
            width: 1109px;
            height:1500px;
            flex-direction: column;
            border:3px solid #f37055;
            float: right;
           
            padding-top: 15px;
            padding-left: 15px;
            padding-right: 15px;
            margin-top: 40px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            margin-left:198px;
           
            
        } 
        h2{
            text-align:center;
            font-weight: bolder;
            color:blue;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            
        }
        table, tr, th, td {
  border:1px solid black;

}
td{
    text-align:center;
}
   
        .table{
           
            color: black;
            font-size: larger;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            height:450px;
            width:1100px;
            border-color: #000;
            background:rgb(7, 7, 7);
            
        }
        .table tr{
            color:black;
            background:rgb(233, 228, 228);
        }
        .table th{
            width:200px;
            
        }
        .table tr th{
            align-items:left;
            text-align: center;
        }
        button{
                 color: black;
                 background-color:white;
                 margin: 55px;
                 margin-left:500px;
                 border-radius: 30px; 
                 height: 35px;
                 width: 255px;
                 font-family: Arial, Helvetica, sans-serif;

        }
        .button:hover{
                 background-color:green;
                 font-size: larger;
                 font-weight: bold;
                 cursor: grab;
                 width: 355px;
                 margin-left:450px;

        }

        .pic{
            border:3px solid black;
            border-radius:8px;
            height:250px;
            width:200px;
            margin-top:15px;
            position:absolute;
            object-fit: fill;
            display: flex;
            justify-content: center;
            background-size: cover;
            z-index: 1;
            position:relative;
            box-shadow: 5px 5px red;
            align-items: center;
            background-image: url('no pic.jpg');
            background-size: 250px 250px;
            background-position: center;
            background-repeat: no-repeat;
        }
        .no_data{
        background-image: url('no data found.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-size: 1050px 550px;
      
     }
        </style>
