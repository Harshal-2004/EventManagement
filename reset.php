<?php

session_start();
$errors = [];
$db1 = mysqli_connect('localhost', 'root', '', 'event');


// ENTER A NEW PASSWORD
if (isset($_POST['Submit'])) {

  if(isset($_GET['token'])){
    $token = $_GET['token'];

  //$Username = mysqli_real_escape_string($db, $_POST['Username']);
 
  $password = mysqli_real_escape_string($db1, $_POST['password']);
  $passwordrepeat = mysqli_real_escape_string($db1, $_POST['passwordrepeat']);
 

  if ($password !== $passwordrepeat) array_push($errors, "Password do not match");
  if (count($errors) == 0) {
     $query="UPDATE register SET password='$password',passwordrepeat='$passwordrepeat' WHERE token='$token' ";
          echo $query."<br>";
          $run=mysqli_query($db1,$query);
          if(isset($run))
          {
            echo "<script>alert('Your password is updated succesfully!');</script>";
            echo "<script>window.location.href='./login.php';</script>";
    }
  }
} }

?>
<!DOCTYPE html>
<html>
  <header>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/linearicons/style.css">
    
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>Reset Password</title>
    
  </head>
  <body>
 <div class="wrapper">
      <div class="inner">
        <img src="images/image-1.png" alt="" class="image-1">
         
          <form class="cont1" id="Login" action=" " method="post">
           <h3>Reset Pasword</h3>
            
            <?php  if (count($errors) > 0) : ?>
  <div class="msg">
    <?php foreach ($errors as $error) : ?>
      <span><?php echo $error ?></span>
    <?php endforeach ?>
  </div>
<?php  endif ?>

           <div class="form-holder">
            <span class="lnr lnr-lock"></span>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>

          <div class="form-holder">
            <span class="lnr lnr-lock"></span>
            <input type="password" class="form-control" name="passwordrepeat" placeholder="Confirm Password">
          </div>
          
             
              
              
              <button type="submit" class="submitbtn" name="Submit">Submit</button><br>
        
            
          </form>
       
    </div>
  </div>
</div>
   <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>


  </body>
</html>