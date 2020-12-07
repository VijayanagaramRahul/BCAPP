<?php
require_once('config.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Building Constructions App||User/client Dashboard</title>
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
    
</style>
<body style="background:white;" >
   
   
   <div id="mySidenav" class="sidenav" style="background:#08193D">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php
 if(isset($_SESSION['mailormno']))
{ echo ' 
   
 
  <a href="index.php" >Home</a>
  

  <a href="profile.php" >Profile</a>
  

  <a href="joinwithus.php" >Join With Us</a>
  
  <a href="myorders.php" >My Orders</a>

  <a href="services.php" >Services</a>
    
  <a href="wishlist.php" >My Favourites</a>
   <a href="About.php" style="color:white; >About Us</a>
 
  
   <a href="logout.php" >Logout</a>';
}
else
{
     echo ' <a href="index.php">Home</a>
  <a href="Signup.php" >Sign up</a>
   <a href="login.php" >Login</a>
   <a href="#" style="color:white;" >About Us</a>';
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
    <div id='list' style="width:100%;"> 
    
    
</div>
<div id="main">
<h1 align="center">About Us </h1>
                                                
<p align="left" style="padding:20px;"><strong>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This application is used to solve the problem of identification of  best  and experienced engineers, Architecture,
    contractor& head mastri(mason)&carpenters, electricians, plumbers, painters, flooring works(tails, kadapa stones,
    granite flooring, gate works, window works, glass and aluminium works, elevation glass works, interior building
    works(wood),etc building construction A to Z works are available hear We are connecting customer to construction
    professionals.</strong>
</p>
 </div>
 
<footer align="center" style="color:white;background:#012461;position:fixed;bottom:0px;padding:10px;width:100%;">


</footer>
</body>
</html>

 