<?php include ("sidebar.php") ?>
	<div class="content">
		<div class="placement">
		<h2>Add new user<i class="fa fa-plus" aria-hidden="true"></i></h2>
	</div>
<?php
	//start session
	session_start();
	//if session is not set, move back to sidebar.php
	if (!isset($_SESSION['username'])) {
	    header("sidebar.php");
	}
	//connect to the database with the server = localhost, username = user, password = user and database name = forkork and put it into a variable 'db'
	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');
	//IF the database could not connect, print out a link to move back to home page
	if ($db->connect_error) {
	        echo "could not connect: " . $db->connect_error;
	        printf("<br><a href=index.php>Return to home page </a>");
	        exit();
	    }
	//IF the form field with the name newUsername is filled and not empty
	if (isset($_POST['newUsername'])) {
		//get and trim, reduce shit, from the value filled in the field with the names below, e.g. newUsername and put into a new variable
	    $newUsername = trim($_POST['newUsername']);
	    $newPassword = trim($_POST['newPassword']);
		$copyPassword = trim($_POST['copyPassword']);

		//IF there's an empty field
	    if (!$newUsername || !$newPassword || !$copyPassword) {
	        echo("<h3>Please fill out all fields.</h3>");
	        echo("<br><a id='hej' href=newUser.php>Go back</a>");
			exit();
	    }
		//add slashes before characters to aviod hacking  
	    $newUsername = addslashes($newUsername);
	    //add slashes before characters to aviod hacking and hash the password so it cannot be displayed in the database
		$newPassword = addslashes(sha1($newPassword));
		$copyPassword = addslashes(sha1($copyPassword));

		
	   	$query = "SELECT users.username FROM users";
		//connect to database and prepare the query to be used in the variable stmt
	   	$stmt = $db->prepare($query);
	    //put the result from the query into the variable below
	    $stmt->bind_result($username);
		//execute the FUNCTION inside stmt
	    $stmt->execute();
		//loop through the statement and collect the values within it
	    while($stmt->fetch()){
			//IF the new username added is the same as another username in the database
	    	if ($newUsername == $username ) {
				//echo out that the name is already taken and provide a go back link
				echo "<h3>Username is alredy taken.</h3>";
				echo("<br><a id='hej' href=newUser.php>Go back</a>");	
				exit(); 
		   	}
	 	}
		//make sure the password fields are matching, if NOT, do not add user
		if($newPassword == $copyPassword && $newPassword != "" ){
			//Prepare an insert statement into users at the columns userID, username and password with the values provided from the form field 
			$stmt = $db->prepare("INSERT INTO users(userID, username, password) VALUES ('', ?, ?)");
			//put the result from the query into these variables below
			$stmt->bind_param('ss', $newUsername, $newPassword);
			//execute the FUNCTION inside stmt
			$stmt->execute();
			printf("<br><h3>User added!</h3>");
			printf("<br><a href=favourites.php>Click to login</a>");
			exit();
			
		//IF passwords doesn't match
		} else {
			echo "Password doesn't match";
		}
	}
?>
<!-- We use POST as a method to aviod the user to be able to change the action in the URL -->
	<form action="" method="POST">
	    <table id="newTable" bgcolor="#fd896d" cellpadding="6">
	        <tbody id="tbody">
	            <tr>
	                <td><INPUT type="text" placeholder="Username" name="newUsername"></td>
	            </tr>
	            <tr>
	                <td><INPUT type="password" placeholder="Password" name="newPassword"></td>
	            </tr>
	            <tr>
	                <td><INPUT type="password" placeholder="Repeat password" name="copyPassword"></td>
	            </tr>
	            <tr>
	                <td><INPUT id="submit" type="submit" name="submit" value="Add User"></td>
	            </tr>
	        </tbody>
	    </table>
	</form>
	</div>
<?php include("footer.php"); ?>
<style>
	#newTable {
		padding: 30px 12px 30px 12px;
		height: 200px;
		width: 324px;
		text-align: center;
		border: 1px solid #dddddd;
		margin-top: 24px;
		position: absolute;
	}
	#tbody input {
		padding: 3px;
		margin: 16px 0px 14px 0;
	}
	#ulwrapper {
		margin: 0;
	}
	checkbox {
		width: 20px;
		height: 20px;
	}
	td {
		font-family: 'lato';
		padding: 0;
	}
	form table {
		background: white;
	}
	#tbody input{
		border: none;
		border-bottom: 2px solid #d34e24;
		width: 180px;
		box-sizing: border-box;
	}
	#submit {
		padding: 6px 5px !important;
		background: #fd896d;
		border: none !important;
		width: 100%;
		margin-top: 0 !important;
	}
	#submit:hover{
		background: #d34e24;
		color: white;
	}
	.logBox {
		height: 100%;
		width: 100%;
		background: white;
		text-decoration: none;
		color: black;
		font-family: 'lato';
		overflow: hidden;
	}
	.logBox a {
		text-decoration: none;
		font-family: 'lato';
	}
	h3 {
		padding-bottom: 10px;
	}
	#hej a {
		color: black;
	}
</style>