<?php

session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$conn=mysqli_connect("localhost","root","","event") or die("connection not established");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
  background-color: grey ;
}

* {
  box-sizing: border-box;
}

/* Button used to open the contact form */
.open-button {
  background-color: #940606;
  color: #e8d8df;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  width: 200px;
}

/* The popup form - hidden by default */
.form-popup {
  background-color: #ffffff;
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 20px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  width: 800px;
}

/* Full-width input fields */
.form-container input[type=text],
.form-container input[type=password],
.form-container input[type=time],
.form-container input[type=date] {
  width: 100%;
  padding: 10px;
  margin: 5px 0 15px 0;
  border: none;
  background: #f1f1f1;
}

/* Set a style for the submit/login button */
.form-container input[type=submit] {
  background-color: #940606;
  color: white;
  padding: 15px;
  border: none;
  cursor: pointer;
  width: 100%;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container input[type=submit]:hover,
.open-button:hover {
  opacity: 1;
}
button {
    border: none;
    width: 100%;
    height: 49px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    background: #940606;
    color: #fff;
    text-transform: uppercase;
    font-family: "Muli-SemiBold";
    font-size: 15px;
    letter-spacing: 2px;
    transition: all 0.5s;
    position: relative;
    overflow: hidden;
}

</style>
</head>
<body>

<div>
  <button class="open-button" onclick="openForm()">Add Event</button>
</div>

<div class="form-popup" id="myForm">
  <form action="event.php" class="form-container"  method="post">
    <h1>Add New Event</h1>

    <label for="eventName">Event Name</label>
    <input type="text" id="eventName" name="EventName" required/>

    <label for="eventTiming">Event Timing</label>
    <input type="time" id="eventTiming" name="EventTiming" required/>

    <label for="eventDate">Event Date</label>
    <input type="date" id="eventDate" name="EventDate" required/>

    <label for="guest">Guest</label>
    <input type="text" id="guest" name="Guest" required/>

    <label for="location">Venue</label>
    <input type="text" id="location" name="Location" required/>

    <label for="organizer">Organizer</label>
    <input type="text" id="organizer" name="Organizer" required/>

    <label for="budget">Budget</label>
    <input type="text" id="budget" name="Budget" required/>
    <button type="submit"  name="Submit" >
            <span>Submit</span>
          </button>
  </form>
</div>

<?php

              if(isset( $_POST["Submit"])){
              
           $EventName=$_POST["EventName"];
           $EventTiming=$_POST["EventTiming"];
           $EventDate=$_POST["EventDate"];
           $Guest=$_POST["Guest"];
           $Location=$_POST["Location"];
           $Organizer=$_POST["Organizer"];
           $Budget=$_POST["Budget"];

           $query="insert into event values ('','$EventName','$EventTiming','$EventDate','$Guest','$Location','$Organizer','$Budget');";
          echo $query."<br>";
          $run=mysqli_query($conn,$query);
          if(isset($run)){
            echo "<script>alert(' Event is Successfully Added');
            </script>";
            echo "<script>window.location.href='./event.php';</script>";  
           }
        }
        ?>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>
