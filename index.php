<?php
require_once('config.php');
session_start();
if(isset($_SESSION['mailormno']) && isset($_SESSION['pass']))
{
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
{
    $query = "SELECT * FROM userdetails WHERE mailormno='$mailid'";  
    $result = mysqli_query($conn, $query);  
    while($row = mysqli_fetch_array($result))  
    {  
    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="100" width="100" class="rounded-circle"  style="padding:10px;margin-left:5%;"> ';  
        
    }  
            
    echo ' 
   
 
  <a href="index.php" style="color:white;">Home</a>
  

  <a href="profile.php" >Profile</a>
  

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
    <div id='list' style="width:100%;"> 
    
    
</div>

<?php if(!isset($_SESSION['name']))
{
?>
<div id="main">

  <div style="width:100%;margin-top:30%;" align="center" >
<img src="BCAPPLOGO.gif" alt="BCAPP LOGO"    class=" rounded " style="width:80%;height:300px;">
<h4 align="center" style="color:black;margin-top:-70px;">Building Constructions</h4>

</div>
<div align="center">
<a href="login.php" class="btn btn-success"  style="margin-top:1%;">Login To Continue</a>
</div>

 
 </div>
<?php 
}
else
{
    ?>
    <div id="main">

       
<div id="carousel-example-2" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel" style="width:100%;">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="screenshots/1.jpg" alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">PLAN</h3>
        <p></p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="screenshots/2.jpg" alt="Second slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">WORK</h3>
        <p></p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="screenshots/3.jpg" alt="Third slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">HOUSE IS AN DREAM</h3>
        <p></p>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>



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
   
<br><br><br><br><br><br>
<?php
        $query="select * from Roles order by seq" ;
       $getdata=mysqli_query($conn, $query);
       
   
      
  
    if(mysqli_num_rows($getdata)>0){
   

          
    while($row=mysqli_fetch_array($getdata, MYSQLI_ASSOC)){
    
        echo "<div style='padding:20px;width:100%;list-style:none;' class='services'>";
        echo ' 
    <form method="POST"  action="list.php" style="width:100%;">
        <input type="hidden" value='.$row['roles'].'   name="role">
        <button align="center" style="padding:10px;color:white;" type="submit"   class="container" name="listbtn"> 
        <figure style="width:100%;">
 
         <img src="images/'.$row['roles'].'.jpg"   style="width:100%;">
         <figcaption style="margin-left:10%;margin-top:-20%;">
    
            <h5 align="center" style="padding:10px;color:black;background:rgb(0,0,0,0.8)"><strong>' .$row["roles"].'</strong></h5>
     </figcaption>
   
     </figure>
    </button>
        </form>
        
        
</div>';    
         }
           

    }
     else{
        echo '<h3 align="center" style="color:Orange">NO Records are Found!</h3>';
    }

?>     
 </div>

<?php } ?>


<br><br>

<?php

if(!isset($_SESSION['mailormno']) && !isset($_SESSION['pass']))
{
echo '<footer style="position:fixed;bottom:0px;color:white;background:#012461;width:100%;" >
<p align="center" style="padding:5px;"> Developed By BTAO TEAM</p>

     </footer>';
}
else{
        
echo '<footer style="position:fixed;bottom:0px;color:white;background:#012461;width:100%;" >

        <form class="form-inline md-form form-sm mt-0" style="margin-left:40px;margin-top:10%;" >
          <i class="fas fa-search" aria-hidden="true"></i>
          <input class="form-control form-control-sm ml-3 w-75"   id="searchbar"  type="text"  onkeyup="search_animal()" placeholder="Search" aria-label="Search">
         
        </form>

     </footer>';
    
}
     
 ?>
</body>
</html>

 