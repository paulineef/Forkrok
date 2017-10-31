<?php include ("sidebar.php") ?>

<div class="content">
	<?php
//PUT THIS HEADER ON TOP OF EACH UNIQUE PAGE
session_start();
if (!isset($_SESSION['username'])) {
    header("sidebar.php");
}
?>

<?php
if (isset($_POST['newUsername'])) {
    // This is the postback so add the book to the database
    # Get data from form
    $newUsername = trim($_POST['newUsername']);
    $newPassword = trim($_POST['newPassword']);
	$copyPassword = trim($_POST['copyPassword']);

    if (!$newUsername || !$newPassword) {
        printf("You must specify both a username and an password");
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    $newUsername = addslashes($newUsername);
    /*$newPassword = addslashes ($newPassword);*/
	$newPassword = addslashes(sha1($newPassword));
	$copyPassword = addslashes(sha1($copyPassword));
    # Open the database using the "forkrok" account
@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }
	//make sure the password fields are matching, if NOT, do not add user
	if ($newPassword == $copyPassword ){
		// Prepare an insert statement and execute it
    $stmt = $db->prepare("insert into users(userID, username, password) values ('', ?, ?)");
    $stmt->bind_param('ss', $newUsername, $newPassword);
    $stmt->execute();
    printf("<br><h2>User added!</h2>");
    printf("<br><a href=login.php>Click to login</a>");
    exit;
		
		//IF passwords doesn't match
	}else {
		echo "Password doesn't match";
	}
 
}

// Not a postback, so present the book entry form
?>
<h3>Add a new user</h3>
<form action="" method="POST">
    <table bgcolor="#fd896d" cellpadding="6">
        <tbody id="tbody">
            <tr>
                <td>Username:</td>
                <td><INPUT type="text" name="newUsername"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><INPUT type="password" name="newPassword"></td>
            </tr>
            <tr>
                <td>Repeat password:</td>
                <td><INPUT type="password" name="copyPassword"></td>
            </tr>
            <tr>
            	<td>I'm not a robot</td>
				<td><input id="checkBox" type="checkbox"></td>
			</tr>
            <tr>
                <td></td>
                <td><INPUT id="submit" type="submit" name="submit" value="Add User"></td>
            </tr>
        </tbody>
    </table>
</form>
</div>
<?php include("footer.php"); ?>

<style>
	#ulwrapper {
		margin: 0;
	}
	checkbox {
		width: 20px;
		height: 20px;
	}
	td {
		font-family: 'lato';
	}
	#tbody input{
		border: none;
	}
	#submit {
		padding: 6px 5px;
		background: white;
	}
	#submit:hover{
		background: #dd00dd;
		color: white;
	}
</style>