<?php 
include('sidebar.php');
$drinkID = trim($_GET["drinkID"]);
$userID = trim($_GET["userID"]);
# Open the database using the "bibblis" account
@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    } ?>
<div class="content" id="add">
<?php    // Prepare an insert statement and execute it
    $stmt = $db->prepare("INSERT INTO favourites(drinkID, userID) VALUES ($drinkID, $userID)");
    $stmt->bind_param('ss', $drinkID, $userID);
    $stmt->execute();
    printf("<br><h3 id='added'>Drink Added!</h3>");
	
    printf("<br><a href=drinkBase.php?drinkID=$drinkID&userID=$userID>Return to previous page </a>");
    exit;
?>
</div>
<style>
	#added {
		margin: 0;
	}
	#add h3 {
		margin: 0 !important;
	}
</style>