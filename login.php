<?php include ("sidebar.php") ?>

<body>

<div class="content">
	<h2>Login<i class="fa fa-unlock-alt" aria-hidden="true"></h2>
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
	
	
    
    $upass = MD5($_POST['password']);
    
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
</div>
        <?php
        
        
        
        if (isset($totalcount)) {
            if ($totalcount == 0) {
                echo '<h2>You got it wrong. Can\'t break in here!</h2>';
				//IF the password and username is right
            } else {
                echo '<h2>Welcome! Correct password.</h2>';
				echo '<a href="fileUpload.php">Click here to upload a picture</a>';
            }
        }
        ?>
        <form method="POST" action="">
            <input type="text" name="username">
            <input type="password" name="password">
            <input type="submit" value="Go">
        </form>

<?php include ("footer.php") ?>
