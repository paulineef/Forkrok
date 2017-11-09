<?php include ("sidebar.php") ?>
<body class="logBox">
	<div class="content">
		<div class="placement">
		<h2>Add new user<i class="fa fa-plus" aria-hidden="true"></i></h2>
	</div>
	
	<?php
//PUT THIS HEADER ON TOP OF EACH UNIQUE PAGE
session_start();
if (!isset($_SESSION['username'])) {
    header("sidebar.php");
}
?>

<?php
@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');


if (isset($_POST['newUsername'])) {
    // This is the postback so add the book to the database
    # Get data from form
    $newUsername = trim($_POST['newUsername']);
    $newPassword = trim($_POST['newPassword']);
	$copyPassword = trim($_POST['copyPassword']);

	//IF there's an empty field
    if (!$newUsername || !$newPassword) {
        echo("<h3>You must specify both username and password</h3>");
        echo("<br><a id='hej' href=newUser.php>Go back</a>");
		exit();
    }

    //Check users
	$get_users = mysql_query("SELECT users.username FROM users");
	$get_rows = mysql_affected_rows($db);

	if($get_rows >=1){
		echo("<h1>The username is already taken</h1>");
		echo("<br><a id='hej' href=newUser.php>Go back</a>");
		exit();
	}
	 

    $newUsername = addslashes($newUsername);
    /*$newPassword = addslashes ($newPassword);*/
	//make sha1
	$newPassword = addslashes(sha1($newPassword));
	$copyPassword = addslashes(sha1($copyPassword));
    # Open the database using the "forkrok" account


    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }
	//make sure the password fields are matching, if NOT, do not add user
	if ($newPassword == $copyPassword && $newPassword != "" ){
		// Prepare an insert statement and execute it
    $stmt = $db->prepare("insert into users(userID, username, password) values ('', ?, ?)");
    $stmt->bind_param('ss', $newUsername, $newPassword);
    $stmt->execute();
    printf("<br><h2>User added!</h2>");
    printf("<br><a href=favourites.php>Click to login</a>");
    exit;
		
		//IF passwords doesn't match
	}else {
		echo "Password doesn't match";
	}
}


?>
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
</body>
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