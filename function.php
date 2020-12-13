<?php
include('extra/conn.php');
function getto(){
	global $con;
	$get_top="select * from topic";
	$run_top=mysqli_query($con,$get_top);
	while($row=mysqli_fetch_array($run_top)){
		echo $topic_id=$row['id'];
		echo $topics_n=$row['name'];
		echo "<option value='$topic_id'>$topics_n</option>";
	}
	
}
function insert(){
	if(isset($_POST['post'])){
	global $con;
	global $user_id;
	$title=addslashes($_POST['title']);
	$question=addslashes($_POST['question']);
	$topic=$_POST['topics'];
    
	$post_insert="insert into posts(user_id,topic_id,post_title,post_content,post_date) values('$user_id','$topic','$title','$question',NOW())";
	$run_post=mysqli_query($con,$post_insert);
}
}

function display(){
    global $con;
	
	echo "
	  <br><font class='h'>
		Current Discussions:
		</font><br><br>";
	$dis_post="select * from posts order by post_id desc limit 0,10 ";
	$run_dis=mysqli_query($con,$dis_post);
	while($row=mysqli_fetch_array($run_dis)){
		$post_id=$row['post_id'];
		$post_user=$row['user_id'];
		$post_title=$row['post_title'];
		$post_content=$row['post_content'];
		$post_date=$row['post_date'];
		
		$det="select * from register where sr_no='$post_user'";
		$run_det=mysqli_query($con,$det);
		$row1=mysqli_fetch_array($run_det);
        $user_detfirst=$row1['first_name'];
        $user_detlname=$row1['last_name'];		
		$user_detuser=$row1['user'];
		$user_detint=$row1['intrest'];
		echo "<div id='post'>
		       <font class='p'>Posted by: $user_detfirst</font>
			   <br><h4>Username: $user_detuser </h4><h4> Intrested in: $user_detint</h4>
			   <h4> Title:$post_title <font id='date'>$post_date</font></h4>
			   
			   <font class='c'>Question:$post_content</font>
			   <a href='single.php?post_id=$post_id' id='ans'><p><button>Answer  Or View</button></p></a>
		      </div>
			  <br>
			  <br>
		";
		
	}
	
}

function answer()
{
	global $con;
	$post_id=$_GET['post_id'];
	$ans_post="select * from posts where post_id='$post_id' ";
	$a_post=mysqli_query($con,$ans_post);
	$row=mysqli_fetch_array($a_post);
		$post_user=$row['user_id'];
		$post_title=$row['post_title'];
		$post_content=$row['post_content'];
		$post_date=$row['post_date'];
		
		$det="select * from register where sr_no='$post_user'";
		$run_det=mysqli_query($con,$det);
		$row1=mysqli_fetch_array($run_det);
        $user_detfirst=$row1['first_name'];
        $user_detlname=$row1['last_name'];		
		$user_detuser=$row1['user'];
		$user_detint=$row1['intrest'];
		echo "<br><br>";
		echo "<div id='post'>
		       <font class='p'>Posted by: $user_detfirst</font>
			   <br><h4>Username: $user_detuser </h4><h4> Intrested in: $user_detint</h4>
			   <h4> Title:$post_title <font id='date'>$post_date</font></h4>
			   
			   <font class='c'>Question:$post_content</font>
			   <br><br>
		      </div>
			  <br>	  
		";
		
}	
	function comments(){
	    $post_id=$_GET['post_id'];
		global $con;
		$discom="select * from comments where post_id='$post_id' ORDER BY comm_id DESC";
		echo"<br>";
		$rundiscom=mysqli_query($con,$discom);
		while($row2=mysqli_fetch_array($rundiscom)){
			$use=$row2['user_id'];
			$pos=$row2['post_id'];
			$cont=$row2['content'];
			$datecom=$row2['date'];
			$usedet="select * from register where sr_no='$use'";
			$runusedet=mysqli_query($con,$usedet);
			$row3=mysqli_fetch_array($runusedet);
			$usen=$row3['user'];
			$useu=$row3['first_name'];
			
			echo"<div id='coms'>
			<br>
			<font style='font-family:Cambria;letter-spacing:1px;font-size:20px; color:#363638'>$usen($useu)</font>
			<br><font style='float:left'>$datecom</font><font style='font-family:Cambria'>
			$cont</font>
			<br>			
			<br>
			</div>
			";
		}
		
	}
	function messege(){
			global $con;
			 $user=$_SESSION['user'];
				 $get="select * from register where user='$user'";
				 $runget=mysqli_query($con,$get);
				 $ru=mysqli_fetch_array($runget);
				 $user_id=$ru['sr_no'];
              $msgname="select distinct reciever_id,user_id from messeges where reciever_id='$user_id'";		  	      
              $messr=mysqli_query($con,$msgname);
			  $messcount=mysqli_num_rows($messr);
			  if($messcount!=0)
			  {
              while($messd=mysqli_fetch_array($messr))
		  	  { 
		        $sender=$messd['user_id'];
		        $messn="select * from register where sr_no='$sender'";
                $messnrun=mysqli_query($con,$messn);
 				$messd=mysqli_fetch_array($messnrun);
		 		$mname=$messd['user'];
				$fname=$messd['first_name'];
				$lname=$messd['last_name'];
				$id=$messd['sr_no'];
				if($id!=$user_id)
				echo "<a href='singlemessege.php?send_id=$id' style='text-decoration:none;'><div id='mname'>$mname <br>$fname $lname</div><hr style='margin-left:120px;text-decoration:none;'></a>";
			  }
			  }
			  else
			  {
              echo "<br> <br><font style='margin-left:120px;font-size:50px'>Say hii to anyone.....</font><hr style='margin-left:120px'>";
		        $messn="select * from register where sr_no!='$user_id' order by sr_no DESC limit 0,20";
                $messnrun=mysqli_query($con,$messn);
 				while($messd=mysqli_fetch_array($messnrun))
				{
			    $mname=$messd['user'];
				$fname=$messd['first_name'];
				$lname=$messd['last_name'];
				$id=$messd['sr_no'];
				if($id!=$user_id)
				echo "<a href='singlemessege.php?send_id=$id' style='text-decoration:none;'><div id='mname'>$mname <br>$fname $lname</div><hr style='margin-left:120px;text-decoration:none;'></a>";
			  }	
			  }			  
			  			
		}
		
	function singlemess(){
		global $con;
		$v=" ";
		$user=$_SESSION['user'];
				 $get="select * from register where user='$user'";
				 $runget=mysqli_query($con,$get);
				 $ru=mysqli_fetch_array($runget);
				 $user_id=$ru['sr_no'];
				 $usern=$ru['first_name'];
			     $id=$_GET['send_id'];
				 $rev="select * from register where sr_no='$id'";
				 $revr=mysqli_query($con,$rev);
				 $revc=mysqli_fetch_array($revr);
				 $revn=$revc['first_name'];
		    $mesc="select * from messeges where (user_id='$user_id' and reciever_id='$id') or (user_id='$id' and reciever_id='$user_id')  order by messege_id  DESC limit 0,10";
            $mesr=mysqli_query($con,$mesc);
			echo "<br><br><br>";
			$mesc=mysqli_num_rows($mesr);
			if($mesc>0)
			 { 
		       while($mesd=mysqli_fetch_array($mesr))
		     	{
				  $use_id=$mesd['user_id'];	
		          $mescon=$mesd['messege'];
				  $mestim=$mesd['timing'];
				  if($use_id == $user_id)
				  {
					  echo "<div id='msgl'>$mescon<br>
			          $mestim <font style='float:right'>:You</font>
					  </div><hr style='margin-left:120px;' >";
					  continue;
				  }
                  if($use_id == $id)
				  {
					  echo "<div id='msgr'><font style='float:right'>$mescon</font> <br>$revn: <font style='float:right'> $mestim</font>
					  </div><hr style='margin-left:120px;'>";
					  continue;
				  }				  
            	}
			 }
	}

	function displayques(){
   global $con;
  $user=$_SESSION['user'];
				 $get="select * from register where user='$user'";
				 $runget=mysqli_query($con,$get);
				 $ru=mysqli_fetch_array($runget);
				 $user_id=$ru['sr_no'];
		
	echo "
	  <br><font class='h'>
		Your Discussions:
		</font><br><br>";
	$dis_post="select * from posts where user_id='$user_id' order by post_id desc ";
	$run_dis=mysqli_query($con,$dis_post);
	while($row=mysqli_fetch_array($run_dis)){
		$post_id=$row['post_id'];
		$post_user=$row['user_id'];
		$post_title=$row['post_title'];
		$post_content=$row['post_content'];
		$post_date=$row['post_date'];
		
		$det="select * from register where sr_no='$post_user'";
		$run_det=mysqli_query($con,$det);
		$row1=mysqli_fetch_array($run_det);
        $user_detfirst=$row1['first_name'];
        $user_detlname=$row1['last_name'];		
		$user_detuser=$row1['user'];
		$user_detint=$row1['intrest'];
		echo "<div id='post'>
		             <font class='p'>Posted by: $user_detfirst</font>
			         <br>
					 <h4>Username: $user_detuser </h4>
					 <h4> Intrested in: $user_detint</h4>
			         <h4> Title:$post_title 
					     <font id='date'>
						       $post_date
					     </font>
					 </h4>
			         <font class='c'>
					     Question:$post_content
				     </font>
			                  <div id='ans'>
					           <p>
							       <div id='answer'>
								           <a href='single.php?post_id=$post_id'> 
										                     <button>Answer  Or View</button>
			                                </a>										
								   </div>
								   </div>
								</p>   
							   
			  <br>
		";
		
		
	}
	
}
	function displaytopic(){
   global $con;
  $user=$_SESSION['user'];
                  $topic_id=$_GET['topic'];
				  $get="select * from register where user='$user'";
				 $runget=mysqli_query($con,$get);
				 $ru=mysqli_fetch_array($runget);
				 $user_id=$ru['sr_no'];
		
	echo "
	  <br><font class='h'>
		Topic Discussions:
		</font><br><br>";
	$dis_post="select * from posts where topic_id='$topic_id' order by post_id desc ";
	$run_dis=mysqli_query($con,$dis_post);
	$runcount=mysqli_num_rows($run_dis);
	if($runcount!=0)
	{
	while($row=mysqli_fetch_array($run_dis)){
		$post_id=$row['post_id'];
		$post_user=$row['user_id'];
		$post_title=$row['post_title'];
		$post_content=$row['post_content'];
		$post_date=$row['post_date'];
		
		$det="select * from register where sr_no='$post_user'";
		$run_det=mysqli_query($con,$det);
		$row1=mysqli_fetch_array($run_det);
        $user_detfirst=$row1['first_name'];
        $user_detlname=$row1['last_name'];		
		$user_detuser=$row1['user'];
		$user_detint=$row1['intrest'];
		echo "<div id='post'>
		       <font class='p'>Posted by: $user_detfirst</font>
			   <br><h4>Username: $user_detuser </h4><h4> Intrested in: $user_detint</h4>
			   <h4> Title:$post_title <font id='date'>$post_date</font></h4>
			   
			   <font class='c'>Question:$post_content</font>
			   <a href='single.php?post_id=$post_id' id='ans'><p><button>Answer  Or View</button></p></a>
		      </div>
			  <br>
		";
	}
	}
     else{
		 Echo "<font style='margin-left:120px;'>Have a question ask it....</font>";
	 }	
	
	
}


?>