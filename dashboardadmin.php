<?php
require "config.php";
//$email=$_POST['email'];
session_start();
if(empty($_SESSION["login_user"])){
    header("Location: login.php");
    exit;
    echo "User Not Logged In!";
}
$email=$_SESSION['login_user'];
$sql="SELECT * FROM user WHERE email='$email'";
// echo $sql;
$result=$conn->query($sql);
// print_r($result);
?>
<!DOCTYPE html>
<html>
<head>
<style>
    .sidenav{
        height:100%;
        width:160px;
        overflow: scroll;
        position:fixed;
        z-index:1;
        top: 0;
        left: 0;
        background:#003647 ;
		}
        .h2{
            margin-top: 0px;
        </style>
	<title>
		admin dashboard
	</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dashboarda.css">
</head>
<body>
    <!-- <nav class="nav navbar-default" style="background-color:#add8e6">
        <div class="container-fluid">
            <div class="navbar-header">
            <a href="" class="navbar-brand" >Admin<b>LTE</b></a>                
            </div>            
        </div>
    </nav> -->
    <div class="col-md-8" style="width:100%">
        <nav class="nav navbar-default" style="background-color: #add8e6">
            <div class="container-fluid" style="padding-left:160px">AdminLTE</div>
        </nav>
        <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div id="table" class="panel panel-default">
                    <table class="table table-bordered table-responsive table-hover">
                        <thead>
                          <tr>
                              <th>id</th>
                              <th>Full Name</th>
                              <th>Username</th>
                              <th>Phone</th>
                              <th>Type</th>
                              <th colspan="2">Action</th>
                          </tr>
                        </thead>
                        <?php while($row=mysqli_fetch_array($result)){?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['fullname'];?></td>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['phone']?></td>
                                <td><?php echo $row['type']?></td>
                                <!-- <form method="POST" action="edit.php">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="fullname" value="<?php echo $row['fullname']; ?>">
                                    <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
                                    <input type="hidden" name="phone" value="<?php echo $row['phone']; ?>" >
                                     --><td>
                                    <button type="button" 
                                    class="btn btn-success edit_data"
                                    id = "<?php echo $row['id']; ?>" 
                                    name="edit">
                                        Edit
                                    </button>
                                    </td>
                                <!-- </form> -->
                                <td>
                                    <button type="button" 
                                    class="btn btn-info view_data" 
                                    id="<?php echo $row['id']; ?>" name="info">

                                    Info
                                    </button>
                                </td>
                                <div class="modal fade" id="myinfomodal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">
                                                    &times;
                                                </button>
                                                <h4 class="modal-title">User Information</h4>
                                            </div>
                                            <div class="modal-body"
                                            id="user_details">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="edit_modal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">
                                                    &times;
                                                </button>
                                                <h4 class="modal-title">User Information</h4>
                                            </div>
                                            <div class="modal-body" 
                                            id ="edit_form">
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id = "add_modal" >
                                    <div class = "modal-dialog" >
                                        <div class = "modal-content" >
                                            <div class = "modal-header" >
                                                <button type ="button" class = "close" data-dismiss = "modal" >
                                                    &times;
                                                </button>
                                                <h4 class = "modal-title" >Add User</h4>
                                            </div>
                                            <div class = "modal-body"
                                            id = "add_form">                                             
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                                <td>
                                    <form action="delete.php" method="POST" onsubmit="return confirm('Are you sure ?');">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button onclick="" type="submit" class="btn btn-success"
                                        name="Submit">
                                        DELETE
                                    </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                                    <button class="btn btn-success add_user"
                                        name="adduser">
                                        ADD User
                                    </button>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
    	<div class="col-md-4">
            <div class="sidenav">
                <li>
                <a href="">
                    <span><h2 class="h2">Admin<b>
                    LTE</b></h2></span>
                </a>
                </li>
            	<li style="padding-left:15px">
                    <a href="#">
                    	<span>
                    	      <img src="<?php echo $image;?>" class="img img-circle
                    	      img-responsive">
                    	</span>
                    </a>
            	</li>
                <li style="padding-left:15px">
                    <a href="dashboardadmin.php" style="color:#ffffff background-color:#003647 ">
                    <span class="glyphicon glyphicon-dashboard" 
                    style="color:#ffffff">
                    </span>
                    <span style="color:#ffffff">Dashboard</span></a>
                </li>
                <li style="padding-left:15px">
                    <a href="logout.php" style="color:#ffffff background-color:#003647 ">
                    <span class="glyphicon glyphicon-log-out" 
                    style="color:#ffffff">
                    </span>
                    <span style="color:#ffffff">Logout</span></a>
                </li>
                <li style="padding-left:15px">
                    <a href="profile.php" style="color:#ffffff background-color:#003647 ">
                    <span class="glyphicon glyphicon-user" 
                    style="color:#ffffff">
                    </span>
                    <span style="color:#ffffff">Profile</span></a>
                </li>
                <li style="padding-left:15px">
                    <a href="productadmin.php" style="color:#ffffff background-color:#003647 ">
                    <span class="glyphicon glyphicon-user" 
                    style="color:#ffffff">
                    </span>
                    <span style="color:#ffffff">Product</span></a>
                </li>
                <li style="padding-left:15px">
                    <a href="categoryadmin.php" style="color:#ffffff background-color:#003647 ">
                    <span class="glyphicon glyphicon-user" 
                    style="color:#ffffff">
                    </span>
                    <span style="color:#ffffff">Category</span></a>
                </li>
            </div>
        </div>
        <script>
  		    $(document).ready(function(){
  			$('.add_user').click(function(){
                // alert(id);
                $('#add_modal').modal("show");
                    $.ajax({
                        url: ""
                    });            
                                });
                

            
            $('.edit_data').click(function(){
  				var id  =  $(this).attr('id');
  				// alert(id);
  				$('#edit_modal').modal("show");
  				$.ajax({
  					url: "ajaxedit.php",
  					method: "post",
  					data:{id:id},
  					success:function(data){
  						$('#edit_form').html(data);
  					}
  				});
  				

            
  			});

  			$('.view_data').click(function(){
  				var id  =  $(this).attr('id');
  				// alert(id);
  				$('#myinfomodal').modal("show");
  				$.ajax({
  					url: "ajaxselect.php",
  					method: "post",
  					data:{id:id},
  					success:function(data){
  						$('#user_details').html(data);
  					}
  				});
  				

            
  			});
  		    });
  	    </script>
    </div>
    <div>
  	</div>
  	
</body>
</html>