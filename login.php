<?php
 $message="";

// session_start();
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//   header("location: event.php");
//   exit;
// }

 if(count($_POST)>0) {
   $conn = mysqli_connect("localhost","root","","event");

   $result = mysqli_query($conn,"SELECT * FROM register WHERE Username='" . $_POST["Username"] . "' and password = '". $_POST["password"]."'");
  $count  = mysqli_num_rows($result);
  if($count==0) {
    echo "<script>alert('Invalid Username or Password!!');</script>";
    
    echo "<script>window.location.href='./login.php';</script>";
    exit();
    $message = "Invalid Username or Password!";
  } else {
        
    session_start(); 
    // Store data in session variables
            $_SESSION["loggedin"] = true;

    echo "<script>alert('You are successfully authenticated!');</script>";
    echo "<script>window.location.href='./event.php';</script>";
                  
     $message = "You are successfully authenticated!";
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
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
         <form class="cont" id="Register" action="login.php" method="post">
          <h3>Login</h3>
         
          <div class="form-holder">
            <span class="lnr lnr-user"></span>
            <input type="text" class="form-control" placeholder="Username"  name="Username" required/>
          </div>
          <div class="form-holder">
            <span class="lnr lnr-lock"></span>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>

          
          <button type="submit"   href="login.php" name="Login" >
            <span>Submit</span>
          </button><br>
           <center><p class="form-holder">Not Registered yet?<a href="register.php" id="Login" style="color:blue"> Register</a></p></center>
               <center><p class="form-holder">Forgot Password?<a href="forget.php" id="Login" style="color:blue"> Click Here</a></p></center>
        </form>
      </div>
      <?php
if(isset( $_POST["Login"])){
$Username = $_POST['Username'];
$password = $_POST['password'];


$query="insert into login values ('$Username','$password');";
          echo $query."<br>";
          $run=mysqli_query($conn,$query);
          if(isset($run)){
            echo "<script>alert(' Login Successful..');</script>";
            echo "<script>window.location.href='./login.php';</script>";   }
        }
            ?>

      
    </div>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>