<?php
include('extra/conn.php');
 if(isset($_POST['Signup'])){	
     $fname=mysqli_real_escape_string($con,$_POST['first_name']);  
	 $last=mysqli_real_escape_string($con,$_POST['last_name']);
	 $pet=mysqli_real_escape_string($con,$_POST['pet_name']);
	 $dob=mysqli_real_escape_string($con,$_POST['dob']);
	 $phone=mysqli_real_escape_string($con,$_POST['phone_no']);
	 $user=mysqli_real_escape_string($con,$_POST['username']);
	 $pass=mysqli_real_escape_string($con,$_POST['pass']);
	 $int=mysqli_real_escape_string($con,$_POST['intrest']);
	 
	 $qp="select * from register where phone_no='$phone'";
	 $qr=mysqli_query($con,$qp);
	 $qc=mysqli_num_rows($qr);
	 if($qc==0){
		 
		   $qu="select * from register where user='$user'";
	       $ur=mysqli_query($con,$qu);
	       $uc=mysqli_num_rows($ur);
		   if($qc==0)
		   {
	           
			     $insert="insert into register(first_name,last_name,pet_name,dob,phone_no,user,password,intrest) values('$fname','$last','$pet','$dob','$phone','$user','$pass','$int')" ;  
			     $ri=mysqli_query($con,$insert);
			   
		   }
		   else
		   {  
			   echo "<script>alert('user name already registered');</script>";
		   }
		   
		}
	 else 
		{
			 echo "<script>alert('phone already registered ');</script>";
		}
	 
}
?>