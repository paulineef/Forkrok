<!-- includes the sidemenue and its functions -->
<?php include ('sidebar.php') ?>

<?php 
	//clarify drinkID will have the same value as the pushed drinkID in the url, from database
	//clarify userID will have the same value as the pushed userID in the url, from database
	$drinkID = $_GET["drinkID"];
	$userID = $_GET["userID"];

	//connect with the database with servername, username, password, and database
	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	//get tabels and columns from database, and join the onces that are supposed to be connected to each other
	$query = "SELECT drinks.drinkID, drinks.name, ingredients.ingredientID, ingredients.term, drinks.picture, drinks.description FROM drinks
	JOIN drinks_ingredients ON drinks.drinkID = drinks_ingredients.drinkID 
	JOIN ingredients ON ingredients.ingredientID = drinks_ingredients.ingredientID
	WHERE drinks.drinkID = $drinkID";

	//acess the database and prepare for the query to be used in the stmt-variable 
 	$stmt = $db->prepare($query);
 	//takes the result from the query and put in the variables below
    $stmt->bind_result($drinkID, $name, $ingredientID, $term, $picture, $description);
    //execute the function in the stmt
    $stmt->execute();
    //an empty array to have somewhere to push the information into from the database
	$ingredients = array();

	// While fetching results from a prepared statement into the bound variables
	while($stmt->fetch()) {
		//push the ingredients of a specific drink from the database(term) into the ingredients array
		array_push($ingredients, $term);
	}

	/*-- In order to only be able to favourite mark the same drink one time--*/

	//SELECT all from favourites WHERE the drinkID and the userID is the same as the one from the URL
	$query = ("SELECT * FROM favourites WHERE drinkID = '{$drinkID}' "."AND userID = '{$userID}'");
	
	//connect to database and prepare the query to be used in the variable stmt
	$stmt = $db->prepare($query);
	//put the result from the query into these variables below, we want the drinkID already in favourites in antoher variable
    $stmt->bind_result($drinkID2, $userID2);
	//execute the FUNCTION inside stmt
    $stmt->execute();
	//loop through the statement and collect the values within it. 
	while($stmt->fetch()) {}
?>

	<div class="content" id="contentEXTRA">		
		<div class="placement">	
			<div id="back">
		
			
			<?php 
				//the go back link
				echo("<a href=drinks.php?userID=$userID><i class='fa fa-times' aria-hidden='true'></i></a>")
			?>
				
			</div>
			<div class="drink">		
				<?php echo "<h2> $name";
					//IF the selected drinkID already exist in favourites, echo out a filled star
					if($drinkID2 == $drinkID){
						echo("<a href=removeFav.php?drinkID=$drinkID&userID=$userID><i id='favvis' class='fa fa-star' aria-hidden='true'></i></a></h2>");
					} else {
						//ELSE echo out an unfilled star
						echo("<a href=addFav.php?drinkID=$drinkID&userID=$userID><i id='ejfavvis' class='fa fa-star-o' aria-hidden='true'></i></a></h2>");
					}
				?>		
					<div class="info">
						<h5>Ingredients</h5>
						<ul>
						<?php 
							//lop through the array with the variable 'var'
							foreach($ingredients as $var) { //same as [i];
								//echo out each ingredient found in the array
								echo "<li>" . $var . "</li>";
							}
						?>
						</ul>
						<?php 
							//echo out the desription of how to make the drink
							echo "<p> $description </p>";
						?>
					</div>
					<div class="image">
						<?php 
							//echo out the picture of the drink displayed
							echo "<img src=\"../uploadedfiles/" . $picture . "\">"; 
						?>
					</div>
			</div>
		</div>
	</div>

<?php include ('../footer.php')  ?>