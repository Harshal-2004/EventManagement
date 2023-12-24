<?php
session_start();
$conn=mysqli_connect("localhost","root","","event") or die("connection not established");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registration Form</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="fonts/linearicons/style.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<img src="images/image-1.png" alt="" class="image-1">
				 <form class="cont" id="Register" action="register.php" method="post">
					<h3>New Account?</h3>
          <center><p class="form-holder">Already Registered ?<a href="login.php" id="Login" style="color:blue"> Login</a></p></center>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" placeholder="Username"  name="Username" required/>
					</div>
					<div class ="form-holder">
						<span class="lnr lnr-home"></span>
					 <input type="text" class="form-control" placeholder="Roll No." name="RollNo" required/>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						 <input type="email" class="form-control" placeholder="Email"  name="Email" required/>
					</div>
						<div class="form-holder">
						<span class="lnr lnr-phone-handset"></span>
					 <input type="tel" class="form-control" placeholder="Phone No." maxlength="10" minlength="10" name="Mobileno" required/>
					</div>
					<!-- <div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" placeholder="Username"  name="Username" required/>
					</div> -->
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" name="password" placeholder="Password" required>
					</div>

					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" name="passwordrepeat" placeholder="Confirm Password">
					</div>
					<button type="submit"   href="login.php" name="Submit" >
						<span>Submit</span>
					</button>
				</form>
				<img src="images/image-2.png" alt="" class="image-2">
			</div>
			<?php 

          if(isset( $_POST["Submit"])){
                 
           $Username= $_POST['Username'];
           $Roll_No=$_POST["RollNo"];
           $Email=$_POST["Email"];
           $Mobile_no=$_POST["Mobileno"];
           $password=$_POST["password"];
           $passwordrepeat=$_POST["passwordrepeat"];

		   $token = bin2hex(random_bytes(15));
            

             if($passwordrepeat!=$password){
               echo "<script>alert(' password does not match');</script>";
               echo "<script>window.location.href='./register.php';</script>";
              }
           else{
           
               $sel_u="select * from register;";
               $run_u=mysqli_query($conn,$sel_u);
                while($row_u=mysqli_fetch_assoc($run_u)){
                 if($Username==$row_u['Username']){
                  echo "<script>alert('Username already exist. Enter another Username ');</script>";
                  echo "<script>window.location.href='./register.php';</script>";  
                   }
                 if($Roll_No==$row_u['RollNo']){
                  echo "<script>alert(' Roll no already exist.');</script>";
                  echo "<script>window.location.href='./register.php';</script>";  
                  }
                  if($Email==$row_u['Email']){
                    echo "<script>alert(' Email already exist. Choose another  Email');</script>";
                    echo "<script>window.location.href='./register.php';</script>";  
                   }

                }
            }

                $query="insert into register values ('$Username','$Roll_No','$Email','$Mobile_no','$password','$passwordrepeat','$token');";
                echo $query."<br>";
                $run=mysqli_query($conn,$query);
                if(isset($run)){
                echo "<script>alert(' Registration Successful..');</script>";
                echo "<script>window.location.href='./login.php';</script>";  
                 }
               
          
         }
        ?>

			
		</div>
		
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/main.js"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>