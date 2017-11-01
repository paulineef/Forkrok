<?php include ("sidebar.php") ?>
<head>
	<title>Förkrök - Drinks</title>
	<link rel="stylesheet" type="text/css" href="forkrok.css">
</head>
<body>

<div class="content">
	<div class="placement">
	<h2>Drinks<i class="fa fa-glass" aria-hidden="true"></i></h2>

	<!-- Searchfield -->
	<form action ="drinks.php" method="POST" id="drinksearch">
		<input type="text" name="searchdrink" placeholder="Search by drink" class="searchField">
		<input type="text" name="searchingredients" placeholder="or by ingredients" class="searchField">
		<input type="submit" value="Submit" class="submit">
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

           /* if ($db->connect_error) {
                echo "could not connect: " . $db->connect_error;
                printf("<br><a href=index.php>Return to home page </a>");
                exit();
            }*/

	$query = "SELECT drinks.drinkID, drinks.name, ingredients.ingredientID, ingredients.term, drinks.picture FROM drinks
	JOIN drinks_ingredients ON drinks.drinkID = drinks_ingredients.drinkID
	JOIN ingredients ON ingredients.ingredientID = drinks_ingredients.ingredientID";

	//$query = "SELECT drinkID, name FROM drinks";

	
	if ($searchdrink && !$searchingredients) {
		$query = $query . " where name like '%" . $searchdrink . "%' GROUP BY drinks.name";
	}
	if (!$searchdrink && $searchingredients) {
        $query = $query . " where term like '%" . $searchingredients . "%'";
    }
    if ($searchdrink && $searchingredients) { 
        $query = $query . " where name like '%" . $searchdrink . "%' and term like '%" . $searchingredients . "%'";
    }

 //    $stmt = $db->prepare($query);
 //    $stmt->bind_result($drinkID, $name, $ingredientID, $term);
 //    $stmt->execute();

 //    echo '<table bgcolor="#fff" cellpadding="6">';
	// while ($stmt->fetch()) {
 //        echo "<tr>";
 //        echo "<td class='listStyle'><a href='drinkBase.php'>$name</a></td>";
 //        echo "</tr>";
 //    }
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
		
	echo "<li ><a href='drinkBase.php?drinkID=$drinkID'><img class='specificimage' src=\"uploadedfiles/" . $picture . "\"> </a></li></li>";
	}
	echo "</ul>";

	?>

	





		<!-- <?php
		//https://stackoverflow.com/questions/11903289/pull-all-images-from-a-specified-directory-and-then-display-them
		//the code for creating a simple gallery is inspired by the link above

		  $stmt = $db->prepare($query);
		  $stmt->bind_result($drinkID, $name, $ingredientID, $term, $picture);
		  $stmt->execute();

		$files = glob("uploadedfiles/*.*");

		for ($i=0; $i<count($files); $i++) {
			$image = $files[$i];
			// echo "<td class='listStyle'><a href='drinkBase.php'>$name</a></td>";
			echo '<img class="specificimage" src="'.$image .'" alt="Random image" class="imagebox" />'."<br /><br />";
		}
		?>	 -->







	</div>

</div>	
</div>

</body>

<?php include ("footer.php") ?>