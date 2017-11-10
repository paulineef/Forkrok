<?php
	include('sidebar.php');
	//GET drinkID and userID from the url
	$drinkID = $_GET["drinkID"];
	$userID = $_GET["userID"];

	//open the database
	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	//DELETE the selected drink from the favourite table, where the drinkID == the drinkID of the current drink and userID is the logged in user
	$stmt = $db->prepare("DELETE FROM favourites WHERE drinkID = $drinkID AND userID = $userID");
	//execute the FUNCTION within stmt and put it into the variable 'response'
	$response = $stmt->execute(); 
?>
<div class="content">
	<?php
		//print out 'drink removed' and get the option to return to drink page, still with the ID's in the url
        printf("<br><p>Drink removed</p>");
        printf("<br><a href=favourites.php?userID=$userID>Return to favourites</a>");?>	
</div>

	