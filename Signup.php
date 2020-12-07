<?php
require_once('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Building Constructions App||BCAPP Signup Page</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="socialmedia.css">
  <link rel = "icon" type = "image/png" href = "/tripleberrieslogo.png"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
  </script>
   <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="sidebar.css">
 
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
   
        <script>
        window.onload = () => {
    let el = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
    el.parentNode.removeChild(el);
}
  
   </script>
   
   
<style>
     input[type="text"]
       {
           background: #012461;
       }
       input[type="password"]
       {
           background: #012461;
       }
       input[type="file"]
       {
           background: #012461;
       }
      
      
</style>
<!--<link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/wtf-forms.css">-->
        </head>
<body style="background: white;width:100%;" >
   
   
   <div id="mySidenav" class="sidenav" style="background:#08193D;color:white;">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php" >Home</a>
  <a href="Signup.php" style="color:white;">Sign up</a>
   <a href="login.php" >Login</a>
   <a href="About.php" >About Us</a>
  
</div>
<div class=" navbar-fixed-top"  style="position: -webkit-sticky;width: 100%;
  position: sticky;
  top: 0;width:100%;background:#012461;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);padding:2px;">
   <p style="margin-top:15px;"> <span style="font-size:30px;cursor:pointer;color:white;margin-left:10px;" onclick="openNav()">&#9776; BCAPP</span>
</p>
   
<h6 align="center" style="color:white;margin-top:15px;margin-left:15px;"></h6>
 
</div>
    <form  method="post" style="width:65%;color:white;margin-left:18%;margin-top:10%;"  enctype="multipart/form-data">
         <h3 align="center" style="color:black;">Signup</h3>
    
             <input type="text" class="form-control" required="required" name="name" placeholder="Enter Your Name">
      
      <input type="text" class="form-control"  required="required" name="mormno" placeholder="Enter YourMailid/Mobile No.">
     
      <input type="password" class="form-control" required="required" name="pass" placeholder="Enter a New password">
      
       <label align="center" style="color:white;padding:2px;background:#012461" >Insert You Profile Photo  <br>
        <input type="file" name="image" class="form-control" required >
       </label> 
        <input type="submit" name="submit" value="submit"  class="btn btn-primary" style="margin-left:18%;width:60%;" >
          <h3 align="center" style="color:black;padding:10px;">Already Have An Account?</h3>
  <p align="center"><a href="login.php" class="btn btn-success">Login </a> </p>
 
    </form>
   
    <?php
if(isset($_POST["submit"])){
    
   $username =$_POST['name'];
  
   $mailormno =$_POST['mormno'];
   $password =$_POST['pass'];
   $encrypted_password=md5($password);
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        /*
         * Insert image data into database
         */
        
        //DB details
        $dbHost     = 'localhost';
        $dbUsername = 'id10927729_bcbuildingappbc';
        $dbPassword = 'bcbuildingappbc';
        $dbName     = 'id10927729_bcbuildingappbc';
        
     
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
       
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        $dataTime = date("Y-m-d H:i:s");
        
        
        $insert = $db->query("INSERT into userdetails (image, dateandtimeofregister,name,mailormno,pass,role) VALUES ('$imgContent', '$dataTime','$username','$mailormno','$encrypted_password','customer')");
        if($insert){
            echo "<h3 align='center' style='color:green'>File uploaded successfully.</h3>";
        }else{
             echo "<h3 align='center' style='color:red'>File upload failed, please try again</h3>";
        } 
    }else{
          echo "<h3 align='center' style='color:orange'>Please select an image file to upload.</h3>";
        
    }
}
?>
<footer align="center" style="color:white;background:#012461;position:fixed;bottom:0px;padding:10px;width:100%;">


</footer>
</body>
</html>

