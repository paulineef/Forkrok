<?php 
$drinkID = trim($_GET["drinkID"]);
$userID = trim($_GET["userID"]);
# Open the database using the "bibblis" account
@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    // Prepare an insert statement and execute it
    $stmt = $db->prepare("INSERT INTO favourites(drinkID, userID) VALUES ($drinkID, $userID)");
    $stmt->bind_param('ss', $drinkID, $userID);
    $stmt->execute();
    printf("<br>Drink Added!");
	
    printf("<br><a href=drinkBase.php?drinkID=$drinkID&userID=$userID>Return to previous page </a>");
    exit;
?>