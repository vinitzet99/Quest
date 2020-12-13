<?php
include('extra/conn.php');
if(isset($_POST['Suggest'])){
	$ans_con=addslashes($_POST['answers']);
	$post_id=$_GET['post_id'];
	$comment_insert="insert into comments(post_id,user_id,content,date) values('$post_id','$user_id','$ans_con',NOW())";
	$run_comm=mysqli_query($con,$comment_insert);
	}
?>