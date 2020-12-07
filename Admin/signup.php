<?php
    session_start();
 require_once('config.php');
 if(!isset($_SESSION['name']) && !isset($_SESSION['mailormno']) && !isset($_SESSION['pass']))
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
  <link rel="stylesheet" href="socialmedia.css">
  <link rel = "icon" type = "image/png" href = "/tripleberrieslogo.png"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
  </script>
  

        </head>
<body style="background: rgb(19, 0, 26)" >
        <script>
        window.onload = () => {
    let el = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
    el.parentNode.removeChild(el);
}
  
   </script>
<div class=" navbar-fixed-top"  style="position: -webkit-sticky;width: 100%;
  position: sticky;
  top: 0;width:100%;background: rgb(19, 0, 26,0.8);box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
<h3 align="left" style="color:white;margin-top:15px;margin-left:15px;">BCAPP</h3>
 <h5 align="center" style="color:white;">Admin Signup</h5> 
</div>
  <form method="POST" style="width:60%;color:white;margin-left:20%;">
      <label>Name</label>
      <input type="text" class="form-control" required="required" name="name" placeholder="Enter Your Name">
      <label>Mailid/Mobile No</label>
      <input type="text" class="form-control"  required="required" name="mormno" placeholder="Enter Your Mailid/Mobile No.">
      <label>Password</label>
      <input type="password" class="form-control" required="required" name="pass" placeholder="Enter a New password">
      
     <label>Confirm Password</label>
      <input type="password" class="form-control" required="required"  name="cpass" placeholder="Confirm password">
    <div class="form-group">
  <label for="sel1">Role</label>
  <select class="form-control" name="role" required="required"  id="sel1">
    <option >Admin</option>
 
    
    
  </select>
</div>
 
 <br>
 <input type="submit" class="btn btn-success" value="submit" style="margin-left:30%" name="submit_btn">
  </form>
  <?php
  
if(isset($_POST['submit_btn']))
{
   $username =$_POST['name'];
  
   $mailormno =$_POST['mormno'];
   $password =$_POST['pass'];
   
   $cpassword =$_POST['cpass'];
   $role=$_POST['role'];
   
   if($password == $cpassword){
       $encrypted_password=md5($password);
       $query="select * from userdetails WHERE mailormno='$mailormno'";
       $query_run=mysqli_query($conn,$query);
       if(mysqli_num_rows($query_run)>0)
       {
           echo 
          ' <script type=
          "text/javascript"> alert("User Already Exists")</script>';
          
       }
       else  {
           $query="insert into userdetails values('$username','$mailormno','$encrypted_password','$role')";
           $query_run=mysqli_query($conn,$query);
           
       if($query_run) {
          
           echo 
          ' <script type=
          "text/javascript"> alert("User Registered")</script>'; 
           
       }
       else{
           
           echo 
          ' <script type=
          "text/javascript"> alert("User Not Registered!  Try Again...")</script>';
       }
   }
   } #password validation if clause ends here
   else{
       echo'<script type="text/javascript"> alert("Password wont match")</script>';
   
   }
    #password validation  else clause ends here

} #isset statement block ends here
?>
<footer style="position:fixed;bottom:0px;padding:10px;">
    <a href="dashboard.php" style="background: rgb(19, 0, 26,0.8);color:white;"><h4>Home</h4></a>
</footer>
</body>
</html>

