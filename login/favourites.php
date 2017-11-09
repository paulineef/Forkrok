<?php include ("sidebar.php") ?>
<head>
	<title>Förkrök - Favourites</title>
</head>
<?php 
		$userID = trim($_GET["userID"]);
	
		@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	$query = "SELECT users.userID, drinks.drinkID, drinks.name, drinks.picture FROM users
	JOIN favourites ON users.userID = favourites.userID 
	JOIN drinks ON drinks.drinkID = favourites.drinkID
	WHERE favourites.userID = $userID GROUP BY drinks.drinkID ";

 	$stmt = $db->prepare($query);
    $stmt->bind_result($userID, $drinkID, $name, $picture);
    $stmt->execute();
	$favArr = array();
?>
<div class="content" id="favDrink">
	<div class="placement">

		<h2>Favourites<i class="fa fa-star" aria-hidden="true"></i></h2>
	</div>
	<?php
	while($stmt->fetch()) {
		array_push($favArr, $name);
		 echo "<li id='listimage'><a href='drinkBase.php?drinkID=$drinkID&userID=$userID'><img class='specificimage' src=\"../uploadedfiles/" . $picture . "\" > <h3 id='namestyle'>" . $name . "</h3> </a></li>";
	}

?>
</div>

<?php include ("../footer.php")?>
