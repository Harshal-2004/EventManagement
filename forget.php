<?php
session_start();
$conn=mysqli_connect("localhost","root","","event") or die("connection not established");

if(isset($_POST['Submit'])){
 $Email=mysqli_real_escape_string($conn,$_POST['Email']);
   $query="select * from register where Email='$Email'";
  $run=mysqli_query($conn,$query);

  $count=mysqli_num_rows($run);

  if($count){
    $Userdata = mysqli_fetch_array($run);

    $Username = $Userdata['Username'];
    $token = $Userdata['token'];

    $subject = "Password Reset";
    $body = "Hii, $Username. Click here too reset your password 
    http://localhost/event/reset.php?token=$token";
    $sender_email = "From: shiroleharshal08@gmail.com";

    if(mail($Email, $subject, $body, $sender_email)){
      echo "<script>alert('Email is send to register mail id..');</script>";
       echo "<script>window.location.href='./login.php';</script>";
    /* $_SESSION['msg']  = "After entering the email-id check your mail to reset your password..";   
      header('location:login.php');*/

    }else{
      echo "Email Sending Failed...";
    }
  }else{
    echo "<script>alert('No Email Found..');</script>";
  }

}
?>


<!DOCTYPE html>
<html>
  <header>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/linearicons/style.css">
    
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>Forget Password</title>
    
  </head>
  <body>
 <div class="wrapper">
      <div class="inner">
        <img src="images/image-1.png" alt="" class="image-1">
         
          <form class="cont1" id="Login" action="forget.php" method="post">
           <h3>Recover the Password</h3>
         
           
          
             <div class="form-holder">
            <span class="lnr lnr-envelope"></span>
             <input type="email" class="form-control" placeholder="Email"  name="Email" required/>
          </div>
              
              
              <button type="submit" class="submitbtn" name="Submit">Submit</button><br>
              <?php 
            if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
          }
             else{
              echo $_SESSION['msg'] = "";
             }
             ?>
              </p>

            
          </form>    
          
    </div>
  </div>
</div>
   <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>


  </body>
</html>