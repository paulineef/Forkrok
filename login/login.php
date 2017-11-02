<?php
	include('config.php');
?> 
<?php
	session_start();
	if (isset($_SESSION['username'])) {
		header("location:index.php");
	}
?>

<body class="logBox">
<div class="content">
	<div class="placement">
		<h2>Login<i class="fa fa-lock" aria-hidden="true"></i></h2>
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
				echo('<a href="favourites.php">Click here to see your favourite drinks</a>');
				include('favouritesLogin.php');
				include('footer.php');
				exit();
				
				
				
            }
        }
        ?>
        <form background="#dd00dd" method="POST" action="">
           <tr>
           <td><input type="text" placeholder="Username" name="username"></td>
            <td><input type="password" placeholder="Password" name="password"></td>
            
            <input id="submit" type="submit" value="Login">
            </tr>
             <a id="new" href="newUser.php">Create new user</a>
        </form>
</div>
       
	</body>
<?php include ("footer.php") ?>

<style>
	form {
		position: absolute;
		margin-top: 24px;
		text-align: center;
		padding: 30px 12px 12px 12px;
		background: white;
		height: 200px;
		max-width: 300px;
		border: 1px solid #dddddd;
	
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
</style>