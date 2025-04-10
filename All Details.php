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
$stmt = $con->prepare("SELECT * FROM dashdetail  WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$dataResult = $stmt->get_result();
$userData = $dataResult->fetch_assoc();
$stmt->close();

$stmt = $con->prepare("SELECT * FROM education  WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$dataResult = $stmt->get_result();
$userData1 = $dataResult->fetch_assoc();
$stmt->close();
?>
    
   
    <form action=" process control.php" method="post">  
 
    
    <nav>
      <div class="nav-links" >
        
            
            <a  class="navlinks"   href="dashboard.php">Home</a>
            <a  class="navlinks" href="#your-class">Your Class</a>
            
            <span class="username"><?php echo htmlspecialchars($_SESSION['email']); ?></span>
        
        <a  class="logout" onclick="confirmLogout()">Logout</a>
       </div>
    </nav> 
    <body > 
     <div class="side-menu">
      <li>  <a  href="yourdetails.php">Your Details  </a> </li>
      <li>  <a  href="All Details.php">All Details </a>  </li>
      <li>  <a  href="">Your Details  </a> </li> 

      
      </div>   

      
         <div class="loginsec">
           <h2>Your All Personal Details</h2>
           <br></br>
           
           <table>
            <tr class="title"> 
                <th>ID</th>
                <th>EMAIL</th>
                <th>FIRST NAME</th>
                <th>MIDDLE NAME</th>
                <th>LAST NAME</th>
                <th>GENDER</th>
                <th>MOBILE</th>
                <th>ADDRESS</th>
                <th>FATHER NAME</th>
                <th>MOTHER NAME</th>
            </tr>
            <tr>
    <?php if (!empty($userData) && is_array($userData)): ?>
        <td><?php echo htmlspecialchars($userData['ID']); ?></td>
        <td><?php echo htmlspecialchars($userData['Email']); ?></td>
        <td><?php echo htmlspecialchars($userData['FirstN']); ?></td>
        <td><?php echo htmlspecialchars($userData['MiddleN']); ?></td>
        <td><?php echo htmlspecialchars($userData['LastN']); ?></td>
        <td><?php echo htmlspecialchars($userData['GENDER']); ?></td>
        <td><?php echo htmlspecialchars($userData['Mobile']); ?></td>
        <td><?php echo htmlspecialchars($userData['Address']); ?></td>
        <td><?php echo htmlspecialchars($userData['FatherN']); ?></td>
        <td><?php echo htmlspecialchars($userData['MotherN']); ?></td>
        
        
    <?php else: ?>
        <td  colspan="10" >No data available</td>
    <?php endif; ?>
</tr>
        </table>
           <br></br>
           <div>
                  <h2>EDUCATIONAL DETAILS</h2>
                  <br></br>
                  
                  <table>
                  <tr class="title"> 
                
                <th>SCHOOL NAME</th>
                <th>SCHOOL ADDRESS</th>
                <th>MARKS OBTAINED</th>
                <th>MARKS %</th>
            </tr>
            <tr>
    <?php if (!empty($userData1) && is_array($userData1)): ?>
        <td><?php echo htmlspecialchars($userData1['SchoolN']); ?></td>
        <td><?php echo htmlspecialchars($userData1['SchoolA']); ?></td>
        <td><?php echo htmlspecialchars($userData1['SmarksO']); ?></td>
        <td><?php echo htmlspecialchars( $userData1['Spercentage']); ?></td>
        
        
        
    <?php else: ?>
        <td  colspan="10" >No data available</td>
    <?php endif; ?>
</tr>
                  </table>
            </div>
            <br></br>


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
        var result = confirm("Are you sure you want to log out?");
        if (result) {
            window.location.href = "logout.php"; // Change this to your logout URL
        }
    }

</script>  

        

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
        table{
            border-collapse: collapse;
            border:2px solid black;
            width:100%;
            
            margin-top:-30px;
        }
        .title{
            color:black;
            background:  rgba(248, 184, 9, 0.81);
           
            
        }
        th, td {
            border-bottom: 2px solid black;
            background:  rgba(248, 213, 116, 0.73);
            padding:6px;
            text-align:center;
            
        }
       
        tr:hover {
            background-color:rgb(203, 218, 218);
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
        
    
        </style>
