<?php

$get_top="select * from topic";
	$run_top=mysqli_query($con,$get_top);
	while($row=mysqli_fetch_array($run_top)){
		$topic_id=$row['id'];
		$topics_n=$row['name'];
	echo " <li><a href='topiccon.php?topic=$topic_id' style='text-decoration:none;'>$topics_n</a></li>";
}

?>