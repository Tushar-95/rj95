<?php
require "config.php";
session_start();

   if(isset($_POST['submit']))
  {
     $myemail=mysqli_real_escape_string($conn,$_POST['email']); 
     $mypassword=mysqli_real_escape_string($conn,$_POST['password']); 
     $sql="SELECT * FROM user WHERE email='$myemail' AND password='$mypassword'";
     print_r($sql);
     $result=$conn->query($sql);
     $row=$result->fetch_assoc();
     //$active=$row['active'];
     $type=$row['type'];
     $count=mysqli_num_rows($result);
    if($count>0)
    {
     $_SESSION['login_user']=$myemail;
     $_SESSION['login_password']=$mypassword;
     $_SESSION['user_type']=$type;
     if ($type=='admin') {
        header("location: dashboardadmin.php");
     }
     else{
     	header("location:userdashboard.php");
     }
    }
    else 
    { 
    	echo "Your Email or Password is invalid";
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<form method="POST">
	<div class="col-md-12">
		<div class="col-md-6">
			<div class="row" style="padding-top:140px">
			    <div class="col-md-3">
			    </div>				
			    <div class="col-md-6 input-group">
			    	<span class="input-group-addon"><i class="glyphicon
			    		glyphicon-user"></i>
			    	</span> 
			    	<input type="text" name="email"class="form-control"
			    	placeholder="Email">
			    </div>
			</div>
			<div class="row" style="padding-top:20px;">
				<div class="col-md-3"></div>
				<div class="col-md-6 input-group">
				    <span class="input-group-addon"><i class="glyphicon 
				    glyphicon-lock"></i></span>
				    <input type="password" name="password"class="form-control"
			    	placeholder="password">
				    <span class="input-group-addon"><i class="glyphicon 
				    glyphicon-eye-open"></i></span>
				</div>
			</div>
			<div class="row" style="padding-top:20px">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<button type="submit" class="btn btn-success" name="submit">
					Login</button>
					<a  href='reset.php'>Reset Password</a>
				</div>
				<div class="col-md-3"></div>
			</div>
			<div class="row" style="padding-top:60px">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<button type="button" class="btn btn-lg btn-primary btn-block
					">Login With Facebook
				</button>
				</div>
			</div>
			<div class="row" style="padding-top:20px;">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<button type="button" class="btn btn-lg btn-danger btn-block"
					>Login With Google!
				    </button>
				</div>
			</div>
			<div class="row" style="padding-top:20px">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<button type="button" class="btn btn-info btn-lg btn-block"
					>Login With Twitter!
				    </button>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<img style="height: 100vh; float: right;" src="photo-pexels.jpg" class="img-responsive">
		</div>
	</div>
    </form>
</body>
</html>
