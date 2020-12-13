<!doctype html>
<html>
    <head>
	    <title>
		    Quest.com
		</title>
		 <link rel="stylesheet" href="css/front.css">
	</head>
	<body>
	       <div id="to">
		      <div class="quest">
	            <ul>
                  <li>
		             Quest.com
		          </li>
		      </div>
	          <div class="box1">
	            <div class="top">
	               <div class="welcome">
		               Welcome to Knowledge
		           </div>
                   <br>
                   <div class="sub"> 
	                   Ask and Answer
	               </div>	   
	            </div> 		
	        </div>
			</ul>
			</div>
		<div id="option">
			 <ul>
			     <form method=Post> 
	                <li>
	                  Register here
					
					     <ul><strong>
						     
						      <li>First name:
                                    &nbsp&nbsp&nbsp
							       <input type="text" name="first_name" autocomplete="off" required="required">
							  </li>
                              <br>
                              <li> Last name:
                                    &nbsp&nbsp&nbsp
						           <input type="text" name="last_name" autocomplete="off" required="required">
							  </li>
                              <br>
                              <li>Pet name:
                                    &nbsp&nbsp&nbsp
						            <input type="text" name="pet_name" autocomplete="off"></li>
                              <br>
                              <li>DOB:
                                   &nbsp&nbsp&nbsp
						           <input type="date" name="dob" autocomplete="off" required="required"></li>                            
                              <br>
                               <li>Phone No:
                                   &nbsp&nbsp&nbsp
						           <input type="text" name="phone_no"  autocomplete="off"  required="required"></li>
                              <br>
                              <li>Username:
                                   &nbsp&nbsp&nbsp
						           <input type="text" name="username" autocomplete="off"  required="required">
							  </li>
                              <br>
                              <li> Password:
							  &nbsp&nbsp&nbsp&nbsp
								<input type="password" name="pass" autocomplete="off" required="required">
							  </li>
                              <br>
                              <li>Intrest:
                                   <input type="text" name="intrest"  autocomplete="off">
							  </li>
							  <br>
							  <li><button name="Signup">Sign Up</li>
							  
                              </strong>
							  <?php include("insert.php"); ?>
							 </form> 
						</ul>
