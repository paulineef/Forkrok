<!-- includes the sidemenue and its functions -->
<?php include ('sidebar.php') ?>

<?php 
	//clarify drinkID will have the same value as the pushed drinkID in the url, from database
	$drinkID = $_GET["drinkID"];

	//connect with the database with servername, username, password, and database
	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	//get tabels and columns from database, and join the onces that are supposed to be connected to eachother
	//only want to show the information from where the drinks.drinkID=$drinkId
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
?>
<!-- contains the whole site with content -->
<div class="content">

	<!-- contains the headline and search form -->		
	<div class="placement">	

		<!-- div around back arrow -->	
		<div id="back">

			<!-- div around back arrow with icon -->
			<a href="drinks.php"><i class="fa fa-times" aria-hidden="true"></i></a></div>
			
				<table class="drink">		
					<thead>
					<tr colspan="2">
					<th>
				<!-- display the drinkname from the database -->
				<?php echo "<h2> $name </h2>";?>
 					</th>
				<tr/>
				</thead>
				<tbody>
				<tr>
					<!--<a href='drinkBase.php?userID=$userID'<i class="fa fa-star-o" aria-hidden="true"></i>-->
					<td id="tdparent">
						<h5>Ingredients</h5>
						<ul>

						<!-- for each element in the array, echo it out -->
						<?php foreach($ingredients as $var) { //same as [i];
								echo "<li>" . $var . "</li>";
							}
						?>
						</ul>
						<?php echo "<p> $description </p>";?>
					</td>
					<td class="t-left">
						<?php echo "<img src=\"uploadedfiles/" . $picture . "\">"; ?>
					</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>

<style type="text/css">



</style>

<?php include ('footer.php')  ?>