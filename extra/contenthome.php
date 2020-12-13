<?php
include('extra/conn.php');
include('function.php');
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/sechome.css">
	 
</head>
  <body>
    <form method="post" id="con" action="home.php?id=<?php echo $user_id?>"> 
	<h1>Have A Question ask HeRe...lets discuss......</h1>
	<br>
     Title:
	 <br>
	<input type="text" name="title" placeholder="title here...." required="required" size="150"/>
	 <br>
	 <br>
	 Question:
	 <br>
	 <textarea name="question" class="text" required="required" size="150">
	 </textarea>
	  <br>
	  <select name="topics" >
	  <option>Topics</option>
	 <?php getto();?>
	  </select>
	  <button name="post">POST</button>
	  <?php insert();?>
	</form>
	<?php display();?>
  </body>
</html>