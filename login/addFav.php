<?php 
include('sidebar.php');
//GET the drinkID and userID from the URL
$drinkID = $_GET["drinkID"];
$userID = $_GET["userID"];

// Open the database
@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	//IF the database can't connect
    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
		//get the link back to the home page
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    } ?>
<div class="content" id="add">
<?php    
	// Prepare an insert statement with the current drinkID and userID and execute it
    $stmt = $db->prepare("INSERT INTO favourites(drinkID, userID) VALUES ($drinkID, $userID)");
    //$stmt->bind_param('ss', $drinkID, $userID);
    $stmt->execute();
    printf("<br><h3 id='added'>Drink Added!</h3>");
	//get a link back to the previous page with the drinkID and userID still in the URL
    printf("<br><a href=drinks.php?userID=$userID>Return to drinks</a>");
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