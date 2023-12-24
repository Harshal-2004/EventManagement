<?php
	$conn=mysqli_connect("localhost","root","","event") or die("connection not established");

	if(isset($_GET['id'])){
		$id = $_GET['id'];
   		$result = mysqli_query($conn,"delete from event where id=$id");
        if($result){
		echo "<script>alert('Completed');</script>";
		echo "<script>window.location.href='./event.php';</script>";	
				//header('location:issue.php');
        }
	
	else{
		?>
		<script>
			window.alert('Please Select issue to Delete');
			window.location.href='event.php';
		</script>
		<?php
	}
}
	
?>