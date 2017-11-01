<?php include ("sidebar.php") ?>

<div class="content">
	<div class="placement">
		<h2>Login<i class="fa fa-unlock-alt" aria-hidden="true"></h2>
	</div>
	<?php 
		@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}


if (isset($_POST['username'], $_POST['password'])) {
    #with statement under we're making it SQL Injection-proof
	//makes it to a string, fjonks won't work
    $uname = mysqli_real_escape_string($db, $_POST['username']);
	$upass = mysqli_real_escape_string($db, $_POST['password']);
	
    
    $upass = SHA1($_POST['password']);
    
    #just to see what we are selecting, and we can use it to test in phpmyadmin/heidisql
    
    //echo "SELECT * FROM users WHERE username = '{$uname}' AND password = '{$upass}'";
    
    $query = ("SELECT * FROM users WHERE username = '{$uname}' "."AND password = '{$upass}'");
       
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result(); 
    
    #here we create a new variable 'totalcount' just to check if there's at least
    #one user with the right combination. If there is, we later on print out "access granted"
    $totalcount = $stmt->num_rows();
}
?>
 <?php    
        
        if (isset($totalcount)) {
            if ($totalcount == 0) {
                echo '<h2>You got it wrong. Can\'t break in here!</h2>';
				//IF the password and username is right
            } else {
                echo "<h2>Welcome, $uname!</h2>";
            }
        }
        ?>
        <form background="#dd00dd" method="POST" action="">
           <tr>
           <td><input type="text" placeholder="Username" name="username"></td>
            <td><input type="password" placeholder="Password" name="password"></td>
            
            <input id="submit" type="submit" value="Go">
            </tr>
        </form>
        <a href="newUser.php">Add new user</a>
</div>
       

<?php include ("footer.php") ?>
<style>
	form {
		position: absolute;
		margin-top: 24px;
		max-width: 450px;
		background: #fd896d;
		height: 100px;
		text-align: center;
	}	
	form input {
		width: 180px;
		margin: 0 10px;
		border: none;
		margin-top: 32px;
		padding: 6px;
	}
	#submit {
		margin: 0 auto;
		text-align: left;
		width: 50px;
		padding: 3px;
		float: left;
		margin-left: 10px;
	}
</style>