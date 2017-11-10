<!-- includes the sidemenu and its functions -->
<?php include ("sidebar.php") ?>

<head>
	<title>Förkrök - Drinks</title>
	<link rel="stylesheet" type="text/css" href="forkrok.css">
</head>

<!-- contains the whole site with content -->
<div class="content"> 

	<!-- contains the headline and search form -->
	<div class="placement">
		<!--class="fa fa-glass" aria-hidden="true" is to display the icon -->		
		<h2>Drinks<i class="fa fa-glass" aria-hidden="true"></i></h2>

		<!-- Searchfield, POST, mainly we don't want user to change the search in the url -->
		<form action ="drinks.php" method="POST" id="drinksearch">
			<input type="text" name="searchdrink" placeholder="Search by drink" class="searchFieldDrink">
			<input type="text" name="searchingredients" placeholder="or by ingredients" class="searchFieldDrink" id="right">
			<input type="submit" value="Submit" class="submit" id="drinks">
		</form>

				
		<?php
			//declare variables with an empty strings, to later push the users search-values into the string
			$searchdrink = "";
			$searchingredients = "";
				
			//connect with the database with servername, username, password, and database
			@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

			//if the submit button is pushed, and the form is active and not empty...
			if (isset($_POST) && !empty($_POST)) {
					
				//trim will erase whitespace in the searchfield, put the users search-values into the variable
				$searchdrink = trim($_POST['searchdrink']);
				$searchingredients = trim ($_POST['searchingredients']);
					
				//makes the fields SQL Injection-proof, or '1=1
				$searchdrink = mysqli_real_escape_string($db, $searchdrink);
				//htmlentities, won't accept html-code into field
				$searchdrink = htmlentities($searchdrink);

				$searchingredients = mysqli_real_escape_string($db, $searchingredients);
				$searchingredients = htmlentities($searchingredients);

				//adds slashes before charaters that need to be escaped in the fields like '', "", \
				$searchdrink = addslashes ($searchdrink);
				$searchingredients = addslashes($searchingredients);
			}

	        //get tabels and columns from database, and join the onces that are supposed to be connected to eachother
			$query = "SELECT drinks.drinkID, drinks.name, ingredients.ingredientID, ingredients.term, drinks.picture FROM drinks
			JOIN drinks_ingredients ON drinks.drinkID = drinks_ingredients.drinkID 
			JOIN ingredients ON ingredients.ingredientID = drinks_ingredients.ingredientID";

			//if the field searchdrink is active and the field searchingredients is empty, echo out the search-value
			//group by, so we only echo out one drink id and not the amount of drink id connected to each ingredients
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
				//acess the database and prepare for the query to be used in the stmt-variable 
		    	$stmt = $db->prepare($query);
		    	//takes the result from the query and put in the variables below
	    		$stmt->bind_result($drinkID, $name, $ingredientID, $term, $picture);
	    		//execute the function in the stmt
	    		$stmt->execute();
	    	?>

		   	<?php
		   		//create a list in html-form
		   		echo '<ul id="listDrink">';
		   		// While fetching results from a prepared statement into the bound variables
		    	while ($stmt->fetch()) {
		    	//echo out the drinks matching the searchresult and display it in an image rather than in text. Using list elements and href to make it able to click through and get more information. The images are connected in the database by the name getting from a folder. Name is displayed when hovering. 
				echo "<li id='listimage'><a href='drinkBase.php?drinkID=$drinkID'><img class='specificimage' src=\"uploadedfiles/" . $picture . "\"> <h3 id='namestyle'>" . $name . "</h3> </a></li>";
			}
				echo "</ul>";
			?>
				
		</div>
	</div>	
</div>

<!-- include footer to make sure it looks the same on all pages and no need to change in every single document if we need to redo something  -->
<?php include ("footer.php") ?>