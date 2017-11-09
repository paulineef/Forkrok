<?php
	//start SESSION
	session_start();
	//IF there's a session already active on the site


/* HÄR VAR DET FEL*/


	if (isset($_SESSION['username'])) {
		//header("location:login/index.php");?>
	<script>
		window.location ="login/index.php";
	</script>
	<?php }
?>
<div class="logBox">
	<div class="content">
		<div class="placement">
			<h2>Login<i class="fa fa-lock" aria-hidden="true"></i></h2>
		</div>
		<!-- POST = the information taken from the form will not be displayed in the URL -->
		<form background="#dd00dd" method="POST" action="favourites.php">
           <tr>
           <td><input type="text" placeholder="Username" name="username"></td>
            <td><input type="password" placeholder="Password" name="password"></td>
           
            <input id="submit" type="submit" value="Login">
            </tr>
            <!-- Move to the page newUser.php when clicking on the link-->
             <a id="new" href="newUser.php">Create new user</a>
        </form>
<?php 
	//open the database with the location = localhost, username and password = user and name =forkrok and put it into a variable
	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	//IF the database can't connect
	if ($db->connect_error) {
		echo "could not connect: " . $db->connect_error;
		//the possibility to return to the home page and try again
		printf("<br><a href=index.php>Return to home page </a>");
		exit();
	}

	//IF the form field username and password is filled
	if (isset($_POST['username'], $_POST['password'])) {
		//with statement under we're making it SQL Injection-proof
		
		//makes the typed value to a string, "" '' will therefore don't work if filled in the form field
		//FUNCTION = connect to the database via the variable and access the value filled in the form field
		//put the value filled in the form field into variables
		$uname = mysqli_real_escape_string($db, $_POST['username']);
		$upass = mysqli_real_escape_string($db, $_POST['password']);
		
		//hash the password so it is not displayed in the database
		$upass = SHA1($_POST['password']);

		//SELECT ALL from users where the username and password is what was typed in form field, inside of the variables
		$query = ("SELECT * FROM users WHERE username = '{$uname}' "."AND password = '{$upass}'");
		
		//connect to database and prepare for it to be used in the variable stmt
		$stmt = $db->prepare($query);
		//execute the FUNCTION inside stmt
		$stmt->execute();
		//get the result from the stmt function and put it into a new varible
		$result = $stmt->get_result();
		//put the gotten result into an associative array 
		$user = $result->fetch_assoc();

		//here we create a new variable 'totalcount' just to check if there's at least one user with the right combination. We make the values from the result counted as rows with one each for every user
		$totalcount = $result->num_rows;
		//access the userID value from the selected result from the databse and put it into a new variable --> in order to pass the uderID value between the different pages
		$userID = $user['userID'];
	}
?>
	</div>
</div>
<?php 
	//IF the totalcount FUNCTION has been set, if a user has filled in the form
	if (isset($totalcount)) {
		//IF the totalcount has no rows, no values, incorrect username/password
		if ($totalcount == 0) {
        	echo '<h3 id="wrong">Either wrong password or username</h3>';
				
		//ELSE the totalcount will have values which means that the username and password was correct
        } else {
			//echo out a link that navigates us to the favourites page together with the userID value in the URL
			echo("<div id='formLink' style='background-color: #fff; width: 100%; height: 100vh; z-index: 100; position: absolute; top:0;'><a href ='./login/favourites.php?userID=$userID' style='text-decoration: none; color: black; font-family: lato; margin: 50px; margin-top: 200px; position: absolute; right: 30%;'> Click here to see your favourites </a></div>");
			//stop the WHAT???
			exit();	
         }
	}
	include ("footer.php");     
?>
<style>
	#wrong {
		display: inline;
		left: 30px;
		top: 135px;
	}	
	form {
		position: absolute;
		margin-top: 24px;
		text-align: center;
		padding: 30px 12px 12px 12px;
		background: white;
		min-height: 200px;
		max-width: 300px;
		min-width: 200px;
		border: 1px solid #dddddd;
		z-index: -2;
		top: 30%;
	}	
	form input {
		width: 180px;
		border: none;
		margin: 16px 0px 14px 0;
		padding: 6px;
		border-bottom: 2px solid #d34e24;
		box-sizing: border-box;
	}
	#submit {
		margin: 0 auto;
		width: 50px;
		padding: 6px 5px;
		background: #fd896d;
		width: 180px;
		display: block;
		border: none !important;
	}
	#submit:hover {
		background: #d34e24;
		color: white;
	}
	#new {
		text-decoration: none;
		color: black;
		font-family: 'lato';
		padding: 6px 0px;
		display: block;
		font-size: 11px;
		float: right;
		margin-top: 16px;
		color: #666666;
	}
	#new:hover {
		color: black;
	}
	.logBox {
		height: 100%;
		width: 100%;
		background: white;
	}
	@media (min-width: 928px){
		#wrong {
		display: inline;
		position: absolute;
		left: 530px;
		top: 135px;
	}
}
</style>