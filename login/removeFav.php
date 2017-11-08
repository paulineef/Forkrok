


<?php
$drinkID = trim($_GET["drinkID"]);
$userID = trim($_GET["userID"]);

@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

$stmt = $db->prepare("DELETE FROM favourites WHERE drinkID = $drinkID");
        $stmt->bind_param('s', $drinkID);
        $response = $stmt->execute();
        printf("<br>Book deleted!");
        printf("<br><a href=drinks.php?drinkID=$drinkID&userID=$userID>Return to previous page </a>");
    
    
    //exit;
?>