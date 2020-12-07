<?php
require_once('config.php');
session_start();

 if(!isset($_SESSION['mailormno']) && !isset($_SESSION['pass']))
{
     	header("location:login.php");
}

 else{
     $username=$_SESSION['name'];
     $mailid=$_SESSION['mailormno'];
     $query="select * from  userdetails Where mailormno='$mailid' ";
     $getdata=mysqli_query($conn, $query) ;
     $fetch = mysqli_fetch_assoc($getdata);
  

 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BCAPP</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel = "icon" type = "image/png" href = "/tripleberrieslogo.png"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
  
  </script>
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
   
   

        </head>
<body style="background: white" >
   
   
   <div id="mySidenav" class="sidenav" style="background:#08193D">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
   <?php
 if(isset($_SESSION['mailormno']))
{
    
    $query = "SELECT * FROM userdetails WHERE mailormno='$mailid'";  
    $result = mysqli_query($conn, $query);  
    while($row = mysqli_fetch_array($result))  
    {  
    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="100" width="100" class="rounded-circle"  style="padding:10px;margin-left:5%;"> ';  
        
    }  
  
    echo ' 
   
 
  <a href="index.php" >Home</a>
  

  <a href="profile.php" >Profile</a>
  

  <a href="joinwithus.php" style="color:white;" >Join With Us</a>
  
  <a href="myorders.php" >My Orders</a>

  <a href="services.php" >Services</a>
    
  <a href="wishlist.php" >My Favourites</a>
   <a href="About.php" >About Us</a>
 
  
   <a href="logout.php" >Logout</a>';
}
else
{
     echo ' <a href="index.php" style="color:white;">Home</a>
  <a href="Signup.php" >Sign up</a>
   <a href="login.php" >Login</a>
   <a href="#" >About Us</a>';
}
?>
 
</div>
<div class=" navbar-fixed-top"  style="position: -webkit-sticky;width: 100%;
  position: sticky;
  top: 0;width:100%;background:#012461;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);padding:2px;">
   <p style="margin-top:15px;"> <span style="font-size:30px;cursor:pointer;color:white;margin-left:10px;" onclick="openNav()">&#9776; BCAPP</span>
</p>
   
<h6 align="center" style="color:white;margin-top:15px;margin-left:15px;"></h6>
 
</div>
 
  
<?php
  
if(isset($_POST['submit_btn']))
{
   $name =$_POST['fname'];
     $mno =$_POST['mno'];
  $loginid=   $fetch['mailormno'];
   $email =$_POST['email'];
   $role =$_POST['role'];
    $dob =$_POST['dob'];
   $gender =$_POST['gender'];
   $rand=rand(1,100);
  $exp=$_POST['exp'];
   $dataTime = date("Y-m-d H:i:s");
        
        
    
       
           $query="insert into `workers` (`name`,`email`,`mno`,`role`,`gender`,`dob`,`loginid`,`experience`,`ran`,`dateandtimeofjoined`) values('$name','$email','$mno','$role','$gender','$dob','$loginid','$exp','$rand','$dataTime')";
           $query_run=mysqli_query($conn,$query);
           
       if($query_run) {
          
          echo "<h3 align='center' style='color:green;background-color:white;padding:20px;'><strong>Joined Succesfully! </strong></3>";
       }
       else{
           
             echo "<h3 align='center' style='color:red;background-color:white;'>Not Joined! Try Again</h3>";
       }
   

} #isset statement block ends here
?>
<br>
<form align="center" method="POST" style="width:60%;height:20%;margin-left:20%;background:#012461;opacity:0.8;padding:20px;">
     <h3 align="center" style="color:yellow;"><strong>Join With us</strong></h3>
 
    <input type="text" class="form-control" name="fname" placeholder="Full Name" required  > 
    <input type="email" class="form-control" name="email" required placeholder="email">
    <input type="number" class="form-control" name="mno" required placeholder="Mobile Number">
 
  <select class="form-control"  placeholder="Role" name="role" required id="sel1">
    <option readonly>Role</option>
    <option>Engineer</option>
    <option>Architecture</option>
    <option>Contractor</option>
    <option>Head Mastri(Mason)</option>
     <option>Mastri(Mason)</option>
      <option>Carpenter</option>
       <option>Electrician</option>
        <option>Plumber</option>
         <option>Painter</option>
          <option>Gate Work</option>
           <option>Foundation Work(Tails)</option>
            <option>Design Work</option>
             <option>Guntur slate work</option>
              <option>Glass Work,Elevation</option>
               <option>Aluminium Work</option>
  </select>

    
 
  <select class="form-control"  placeholder="Role" name="gender" required id="sel1">
    <option readonly>Gender</option>
    <option>Male</option>
    <option>Female</option>
  </select>
  
    <input type="date" class="form-control" name="dob" required placeholder="Date of Birth"><br>
    <div class="form-group">
  <label for="comment" style="color:white;">Share Your Work Experience in a few words:</label>
  <textarea class="form-control" rows="5" id="comment"  name="exp" required placeholder="Experience"></textarea>
</div>
         
 
  <input type="submit" value="Join Now" name="submit_btn" class="btn btn-success">  
</form>

</div>
<br>

<footer align="center" style="color:white;background:#012461;position:fixed;bottom:0px;padding:10px;width:100%;">


</footer>
</body>
</html>

