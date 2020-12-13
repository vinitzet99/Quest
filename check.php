<?php

include('extra/conn.php');
session_start();
if(isset($_POST['Login'])){
	$user=mysqli_real_escape_string($con,$_POST['user']);  
	$pass=mysqli_real_escape_string($con,$_POST['pass']);
	$log="select * from register where user='$user' and password='$pass'";
	$check=mysqli_query($con,$log);
	$logc=mysqli_num_rows($check);
	 if($logc==1){
		 $_SESSION['user']=$user;
		 echo "<script>window.open('home.php','_self')</script>";
		 }
	  else 
	  {
		  echo "<script>alert('Wrong username or password')</script>"; 
	  } 
	
}



?>
 