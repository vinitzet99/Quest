<!doctype html>
<?php
session_start();
include('extra/conn.php');
include('function.php');
?>
<html>
   <head>
     <title>
           messege
     </title>
	 <link rel="stylesheet" href="css/front.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="css/sechome.css">
	 <link rel="stylesheet" href="css/messege.css">
	 <script type="text/javascript">
	  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}</script>
   </head>
   <body>
   <div id="to">
		      <div class="quest">
	            <ul>
                  <li>
		             Quest.com
		          </li>
		      </div>
			  </div>
  <?phpinclude('extra/content.php');?>
   <div id="menu">
     <ul>
	     <li> 
		     <i class="fa fa-user
			 " onclick="openNav()">
		         &nbsp&nbsp&nbspPROFILE
				 </i>
			</li>	  	    		 
         <li>
		     <a href="home.php" style="text-decoration:none; color:white">
		         <i class="fa fa-home"></i>
		         &nbsp&nbsp&nbspHOME	</a> 
             
                 				 		 
		 </li>
	     <li>  
		        <i class="fa fa-navicon"></i>
	        	 &nbsp&nbsp&nbspTOPICS
				  <ul id="list">
		   		  <?php include('extra/topic.php');?>
                  </ul>	  
		 </li> 
	     <li>    <a href="messege.php" style="text-decoration:none; color:white">
		         <i class="fa fa-fw fa-envelope"></i>
		         &nbsp&nbsp&nbspMy&nbspMESSAGES</a>
		</li>
	     <li>
		         <a href="questions.php" style="text-decoration:none; color:white">
		         <i class="fa fa-question"></i>
		         &nbsp&nbsp&nbspQUESTIONS</a>
		</li>
	    <li>
		       <a href="logout.php" style="text-decoration:none; color:white;">  <i class="fa fa-lock"></i>
		         &nbsp&nbsp&nbspLOGOUT</a>
		</li>
	   </ul>	
	  </div>
	   <div id="mySidenav" class="sidenav">
                 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                 <?php
				 $user=$_SESSION['user'];
				 $get="select * from register where user='$user'";
				 $runget=mysqli_query($con,$get);
				 $ru=mysqli_fetch_array($runget);
				  $user_id=$ru['sr_no'];
				  $fname=$ru['first_name'];
				  $last=$ru['last_name'];
				  $pname=$ru['pet_name'];
				  $dob=$ru['dob'];
				  $phone=$ru['phone_no'];
				  $int=$ru['intrest'];
	?>
	             <center>
				 <strong>
				 <a href="#" id="content">Username:<br><?php echo"$user";?></a>
				 <a href="#" id="content">Name:<br><?php echo"$fname"; echo" $last";?></a>
				 <a href="#" id="content">Petname:<br><?php echo"$pname";?></a>
				 <a href="#" id="content">Birthday:<br><?php echo"$dob";?></a>
				 <a href="#" id="content">Phone:<br><?php echo"$phone";?></a>
				 <a href="#" id="content">Intrest:<br><?php echo"$int";?></a>
				 </center>
				 </div>
				 <form class="search">
				<input type="text" placeholder="search here..." name="search"><button type="submit"><i class="fa fa-search"></i></button>
				</form>
				 <div style="position:relative"></div>
				 
				 <form method="POST">
				 <div id="sendmessege">
				 <br>
				 Message:
				 <?php$id=$_GET['send_id'];?>
				</div>
				 <center style="margin-left:120px">
				 <div id="meshov">
				  <input type="text" name="content" placeholder="write a messege" class="sendc" required="required">
				  
				  <button name="send" class="sendb">
				  <?php
				  $user=$_SESSION['user'];
				  $get="select * from register where user='$user'";
				 $runget=mysqli_query($con,$get);
				 $ru=mysqli_fetch_array($runget);
				 $user_id=$ru['sr_no'];
				 $id=$_GET['send_id'];
				 if(isset($_POST['send'])){
					$msgcontent=mysqli_real_escape_string($con,addslashes($_POST['content']));
					$insertmsg="insert into messeges(user_id,reciever_id,messege,timing) values('$user_id','$id','$msgcontent',NOW())";
                    $runmsg=mysqli_query($con,$insertmsg);					
				 }
				 ?>
				  <a href="singlemessege.php?send_id=$id" style="text-decoration:none;">
				  <i class="fa fa-send-o" style="font-size:30px;"></i></a></button></center>
                 </div>
				 </form> 
				 <?php singlemess();?>
				 

    </body>
</html>	
                   