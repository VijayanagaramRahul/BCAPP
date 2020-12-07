<?php
session_start();
require_once('config.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['submit_btn']))
	{
	    $mail =$_POST['mailormno'];
	    $password =$_POST['pass'];
	    if(!empty($mail) && !empty($password))
	    {
	        $id_check = "SELECT * FROM `userdetails` WHERE `mailormno`='$mail'";
	        $check_query = mysqli_query($conn, $id_check);
	        if(mysqli_num_rows($check_query) == 1)
	        {
	            $fetch = mysqli_fetch_assoc($check_query);
	            $h_pass=$fetch['pass'];
	            if( md5($password) == $h_pass )
	            {      
	                
	                $_SESSION['name'] = $fetch['name'];
				    $_SESSION['mailormno'] = $fetch['mailormno'];
				    $_SESSION['pass'] = $fetch['pass'];
				    $_SESSION['role'] = $fetch['role'];
				     if($fetch['role']=='customer')
				    {
				        if(isset($_POST['check']))
					{
						setcookie('mailormno',$mail,time()+(86400 * 30));
						setcookie('pass',$password,time()+(86400 * 30));
					}
				        header("location:index.php");
				    }
				    else if($fetch['role']=='Admin')
				    {
				        header("location:Admin/dashboard.php");
				    }
				    else
				    {
				        header("location:logoutforclients.php");
				    }
			
	                
	            }
				else
				{
				    echo '<script>alert("Invalid  Password")</script>';
					$msg = "<h3 align='center' style='color:orange;padding:5px;'>Invalid  Password</h3>";
					$_SESSION['message']=$msg;
				}
			}
			else
			{
			     echo '<script>alert("User Not Registered! Please Try Again")</script>';
				$msg = "<h3 align='center' style='color:red;padding:5px;'>User Not Registered! Please Try Again</h3>";
				$_SESSION['message']=$msg;
			}
		}

	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Building Constructions App||BCAPP Login page</title>
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
       
       
   </style>
   
   

        </head>
<body style="background: white;" >
   
   
   <div id="mySidenav" class="sidenav" style="background:#08193D">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php" >Home</a>
  <a href="Signup.php" >Sign up</a>
   <a href="login.php" style="color:white;">Login</a>
   <a href="About.php">About Us</a>
  
</div>


<div class=" navbar-fixed-top"  style="position: -webkit-sticky;width: 100%;
  position: sticky;
  top: 0;width:100%;background:#012461;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);padding:2px;">
   <p style="margin-top:15px;"> <span style="font-size:30px;cursor:pointer;color:white;margin-left:10px;" onclick="openNav()">&#9776; BCAPP</span>
</p>
   
<h6 align="center" style="color:white;margin-top:15px;margin-left:15px;"></h6>
 
</div>
  <form method="POST" style="width:65%;color:white;margin-left:18%;margin-top:15%;">
      <h3 align="center" style="color:red;">Login</h3>
       <input type="text" class="form-control" name="mailormno" required="required" placeholder="Enter Your Mailid/Mobile No."   value="<?php echo @$_COOKIE['mailormno']; ?>">
       <input type="password" class="form-control" required="required" name="pass" placeholder="Enter a New password" value="<?php echo @$_COOKIE['pass']; ?>">
       <br>
    <div class="checkbox" align="center">
        <label style="color:rgb(19,0,18)">
            <input type="checkbox"   name="check" >Save Login id And Password</label>
    </div>
     
 <br>
 <input type="submit" class="btn btn-success" value="Login" style="margin-left:20%;width:60%;" name="submit_btn">
  </form>
  <br>
  <h4 align="center" style="color:black;">Not Have An Account?</h4>
  <br>
  <p align="center"><a href="Signup.php" class="btn btn-danger">Signup </a> </p>
 
<?php
if(isset($_SESSION['message']))
{
echo 	$_SESSION['message'] ;
}?>
<footer align="center" style="color:white;background:#012461;position:fixed;bottom:0px;padding:10px;width:100%;">
  

</footer>
</body>
</html>

