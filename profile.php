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
  <title>Building Constructions App||My Profile</title>
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
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
</script>
   
        <script>
        window.onload = () => {
    let el = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
    el.parentNode.removeChild(el);
}
  
   </script>
   <script>
       // JavaScript code 
function search_animal() { 
	let input = document.getElementById('searchbar').value 
	input=input.toLowerCase(); 
	let x = document.getElementsByClassName('services'); 
	
	for (i = 0; i < x.length; i++) { 
		if (!x[i].innerHTML.toLowerCase().includes(input)) { 
			x[i].style.display="none"; 
		} 
		else { 
			x[i].style.display="list-item";				 
		} 
	} 
} 

   </script>
   
   
<style>
    input[type='text']
    {
        background: rgb(19, 0, 26);
        color:blue;
    }
</style><body style="background:white" >
   
   
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
  
 
  <a href="profile.php"  style="color:white;" >Profile</a>
  

  <a href="joinwithus.php" >Join With Us</a>
  
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
  <div id="main">


    

<?php
        $id= $_SESSION['mailormno'] ;
        $query="select * from userdetails  WHERE mailormno='$id'" ;
       $getdata=mysqli_query($conn, $query);
       
    $query2 = "SELECT * FROM userdetails WHERE mailormno='$mailid'";  
    $result = mysqli_query($conn, $query2);  
    while($row = mysqli_fetch_array($result))  
    {  
    $_SESSION['image']=$row['image'];
    }  
   
      
  
    if(mysqli_num_rows($getdata)>0){
   

          
    while($row=mysqli_fetch_array($getdata, MYSQLI_ASSOC)){
        $_SESSION['name']=$row['name'];
        $_SESSION['loginid']=$row['mailormno'];
        $_SESSION['password']=$row['pass'];
        /*
echo '<div class="container services" style="padding:20px;" >
    <div class="notice notice-lg notice-success">
       
            <h3 align="left">Basic Details:</h3>
            
            <h5 align="left">Name:  '.$row['name'].'</h5>
           
            <h5 align="left">Loginid:  '.$row['mailormno'].'</h5>
            
            <p align="left"><strong>Password: </strong> '.$row['pass'].'</p>
           
           
           <p>Note:This is Your Encrypted password You Can <button class ="btn btn-link"  data-toggle="modal" data-target="#myModal">Change it</button></p>
       
     
    </div>
</div>
';
       */   }
           

    }
     else{
        echo '<h3 align="center" style="color:Orange">NO Records are Found!</h3>';
    }

?>
  

<?php


          $query="select * from workers where loginid='$id'" ;
       $getdata=mysqli_query($conn, $query);
       
  
    if(mysqli_num_rows($getdata)>0){
   

          
    while($row=mysqli_fetch_array($getdata, MYSQLI_ASSOC)){
    
 
        echo ' <div class="card btn-no-waves  class="services" " style="width:100%;margin-top:10px;background:#500189;opacity:0.8;">
  
  <div class="card-body">
   ';
    echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['image'] ).'" height="100" width="100" class="rounded-circle"  style="padding:10px;margin-left:30%;"> ';  
        
   echo '<h3 align="center" style="color:white">'.$row['name'].'</h3>
      <p align="left" style="color:white;"><strong>Loginid:  '.$_SESSION['loginid'].'</strong></p>
            
            <p align="left" style="color:white;"><strong>Password: </strong> '.$_SESSION['password'].'</p>
           
           
           <p style="color:orange;">Note:This is Your Encrypted password </p>
          <p align="center"> <button  class ="btn btn-outline-light"  data-toggle="modal" data-target="#myModal">Change My Password</button>
       </p>
   <h5 align="left" style="color:white">Gender :'.$row['gender'].'</h5>
  <h5 align="left" style="color:white">Mobile No :'.$row['mno'].'</h5>
  <h5 align="left" style="color:white">Date of Birth: '.$row['dob'].'</h5>
 
   <h3 align="left" style="color:yellow">My Experience</h3>
   <p align="center" style="color:white">'.$row['experience'].'</p>
     
      </div> 
  
 
</div>';
        

       
         }
           

    }
     else{
         
         //This else case is used to show basic details where he or she is not our employee
         
 
        echo ' <div class="card btn-no-waves  class="services" " style="width:100%;margin-top:10px;background:#500189;opacity:0.8;">
  
  <div class="card-body">';
   echo '<img src="data:image/jpeg;base64,'.base64_encode($_SESSION['image'] ).'" height="100" width="100" class="rounded-circle"  style="padding:10px;margin-left:30%;"> ';  
        
  echo '<h3 align="center" style="color:white">'.$_SESSION['name'].'</h3>
    
            <h3 align="left"  style="color:skyblue" >Login Details:</h3>
            
            
            <h5 align="left" style="color:white">Loginid:  '.$_SESSION['loginid'].'</h5>
            
            <h5 align="left" style="color:white"><strong>Password: </strong> '.$_SESSION['password'].'</h5>
           
           
           <p style="color:orange;">Note:This is Your Encrypted password </p>
          <p align="center"> <button  class ="btn btn-outline-light"  data-toggle="modal" data-target="#myModal">Change My Password</button>
       </p>
     
      </div> 
  
 
</div>';
    }

?>     
    </div>
  
</div>



<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change My Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form method="POST">
           <input type="password" placeholder="New Password" name="pass" class="form-control">
           
           <input type="password" placeholder="Confirm New Password" name="cpass" class="form-control">
           <br>
           <p align="center">
           <input type="submit" class="btn btn-success" value="CHANGE" name="changepass">
           </p>
       </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<?php
if(isset($_POST['changepass']))
{
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];

if($pass==$cpass)
{
     $encrypted_password=md5($pass);
      
    $query="UPDATE userdetails SET pass='$encrypted_password' where mailormno='$mailid'";
    $query_run=mysqli_query($conn,$query);
    if($query_run)
    {
        echo '<script>alert("UPDATED")</script>';
    }
    else
    {
         echo '<script>alert("NOT UPDATED")</script>';
    }
}
else
{
     echo '<script>alert("Password Wont Match")</script>';
}
}
?>







</div>
<br><br>
<footer align="center" style="color:white;background:#012461;position:fixed;bottom:0px;padding:10px;width:100%;">


</footer>
</body>
</html>

