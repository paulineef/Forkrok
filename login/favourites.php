<?php include ("sidebar.php") ?><head>
	<title>Förkrök - Favourites</title>
</head>
<?php 
	//get the value userID from the URL and put it into a new variable
	$userID = $_GET["userID"];
	//connect to the database with the server = localhost, username = user, password = user and database name = forkork and put it into a variable 'db'
	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	//SELECT userID from users AND drinkID, name, picture from drinks 
	//JOIN favourites with users in the columns userID
	//JOIN drinks with users in the columns drinkID
	//WHERE the userID from favourites is the same as 'userID' from the URL 
	//Group the result by drinkID so it only displays one example of each drinkID and not multiple times because of the jioned ingredients
	$query = "SELECT users.userID, drinks.drinkID, drinks.name, drinks.picture FROM users
	JOIN favourites ON users.userID = favourites.userID 
	JOIN drinks ON drinks.drinkID = favourites.drinkID
	WHERE favourites.userID = $userID GROUP BY drinks.drinkID ";
	
	//connect to database and prepare the query to be used in the variable stmt
 	$stmt = $db->prepare($query);
	//put the result from the query into these variables below
    $stmt->bind_result($userID, $drinkID, $name, $picture);
	//execute the FUNCTION inside stmt
    $stmt->execute();
	//create an array in the variable 'favArr'
	$favArr = array();
?>
<div class="content" id="favDrink">
	<div class="placement">
		<h2>Favourites<i class="fa fa-star" aria-hidden="true"></i></h2>
	</div>
	<?php
		//loop through the statement and collect the values within it.
		while($stmt->fetch()) {
			//push into the array 'favArr' the values in the variable 'name' = all the drink names
			array_push($favArr, $name);
			//echo out the picture and drink name for each drink in the database, each picture is a link that navigates to drinkBase together with the drinkID and userID
			echo "<li id='listimage'><a href='drinkBase.php?drinkID=$drinkID&userID=$userID'><img class='specificimage' src=\"../uploadedfiles/" . $picture . "\" > <h3 id='namestyle'>" . $name . "</h3> </a></li>";
		}
	?>
</div>

<?php include ("../footer.php")?>
