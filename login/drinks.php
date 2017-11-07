<?php include ("sidebar.php") ?>
<head>
	<title>Förkrök - Drinks</title>
	<link rel="stylesheet" type="text/css" href="../forkrok.css">
</head>
<body>

<div class="content">
	<div class="placement">
	<h2>Drinks<i class="fa fa-glass" aria-hidden="true"></i></h2>

	<!-- Searchfield -->
	<form action ="drinks.php" method="POST" id="drinksearch">
		<input type="text" name="searchdrink" placeholder="Search by drink" class="searchFieldDrink">
		<input type="text" name="searchingredients" placeholder="or by ingredients" class="searchFieldDrink" id="right">
		<input type="submit" value="Submit" class="submit" id="drinks">
	</form>

		
	<?php
	$searchdrink = "";
	$searchingredients = "";
	
	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	if (isset($_POST) && !empty($_POST)) {
		
		$searchdrink = trim($_POST['searchdrink']);
		$searchingredients = trim ($_POST['searchingredients']);
		
		$searchdrink = mysqli_real_escape_string($db, $searchdrink);
		$searchdrink = htmlentities($searchdrink);

		$searchingredients = mysqli_real_escape_string($db, $searchingredients);
		$searchingredients = htmlentities($searchingredients);

		$searchdrink = addslashes ($searchdrink);
		$searchingredients = addslashes($searchingredients);
	}

        
	$query = "SELECT drinks.drinkID, drinks.name, ingredients.ingredientID, ingredients.term, drinks.picture FROM drinks
	JOIN drinks_ingredients ON drinks.drinkID = drinks_ingredients.drinkID 
	JOIN ingredients ON ingredients.ingredientID = drinks_ingredients.ingredientID";

	
	if ($searchdrink && !$searchingredients) {
		$query = $query . " where name like '%" . $searchdrink . "%' GROUP BY drinks.name";
	}
	if (!$searchdrink && $searchingredients) {
        $query = $query . " where term like '%" . $searchingredients . "%'";
    }
    if ($searchdrink && $searchingredients) { 
        $query = $query . " where name like '%" . $searchdrink . "%' and term like '%" . $searchingredients . "%'";
    }
    if (!$searchdrink && !$searchingredients) {
    	 $query = $query . " GROUP BY drinks.name";
    }

?>

<!-- Gallery -->
	<div id="gallerycontent">
		<?php 
	
	
	# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query);
    //takes the result of the search and create variables from it
    $stmt->bind_result($drinkID, $name, $ingredientID, $term, $picture);
    $stmt->execute();
    ?>

   <?php
    echo '<ul id="listDrink">';
    while ($stmt->fetch()) {
		echo "<li id='listimage'><a href='drinkBase.php?drinkID=$drinkID'><img class='specificimage' src=\"../uploadedfiles/" . $picture . "\" GROUP BY drinks.picture> <h3 id='namestyle'>" . $name . "</h3> </a></li>";
	}
		echo "</ul>";
	?>


	</div>

</div>	
</div>

</body>

<?php include ("../footer.php") ?>