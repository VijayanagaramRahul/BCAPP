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
  <title>Building Constructions App||My Favirate</title>
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
</style><body style="background:white;" >
   
   
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
  

  <a href="joinwithus.php" >Join With Us</a>
  
  <a href="myorders.php" >My Orders</a>

  <a href="services.php" >Services</a>
    
  <a href="wishlist.php" style="color:white;">My Favourites</a>
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
  
    <!-- ordered list -->
    <div id='list' style="width:100%;"> 
    
    

<?php
$id= $_SESSION['mailormno'] ;
        
        $query="select * from `whishlist` where `customermailid`='$id'" ;
       $getdata=mysqli_query($conn, $query);
       
   
      
  
    if(mysqli_num_rows($getdata)>0){
   
 echo "<div style='padding:20px;'>";
  echo '<h3 align="center" style="color:black;">My Favourites</h3>';
   
    while($row=mysqli_fetch_array($getdata, MYSQLI_ASSOC)){
          echo '  <div class="card btn-no-waves" style="width:100%;margin-top:10px;background:#012461;">
  
  <div class="card-body">

     ';
      $query2 = "SELECT * FROM userdetails WHERE mailormno='$mailid'";  
    $result = mysqli_query($conn, $query2);  
    while($img = mysqli_fetch_array($result))  
    {  
    echo '<img src="data:image/jpeg;base64,'.base64_encode($img['image'] ).'" height="100" width="100" class="rounded-circle"  style="padding:10px;margin-left:30%;"> ';  
        
    }  
          
     echo '<h3 align="center" style="color:white;">'. $row['name'].'</h3>';
               echo ' <form method="POST" action="profileofemployee.php">
           <input type="hidden" name="profilelogin" value='.$id.' >
           <p align="center">
           <input type="submit"  name="profilebtn" class="btn btn-warning" value="View Profile">
           </p>
           </form>';
      echo "<br>";
       
           echo " 
  </div>
</div>";
         }
         echo "
</div>";    

    }
     else{
        echo '<h3 align="center" style="color:Orange">NO Wishlists Found!</h3>';
    }

?>     
    </div>
 
</div>
<footer align="center" style="color:white;background:#012461;position:fixed;bottom:0px;padding:10px;width:100%;">

</footer>

</body>
</html>

 