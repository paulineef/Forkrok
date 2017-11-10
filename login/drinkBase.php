<!-- includes the sidemenue and its functions -->
<?php include ('sidebar.php') ?>

<?php 
	//clarify drinkID will have the same value as the pushed drinkID in the url, from database
	//clarify userID will have the same value as the pushed userID in the url, from database
	$drinkID = $_GET["drinkID"];
	$userID = $_GET["userID"];

	//connect with the database with servername, username, password, and database
	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	//get tabels and columns from database, and join the onces that are supposed to be connected to eachother
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

	$query = ("SELECT * FROM favourites WHERE drinkID = '{$drinkID}' "."AND userID = '{$userID}'");
	$stmt = $db->prepare($query);
    $stmt->bind_result($drinkID2, $userID2);
    $stmt->execute();

	while($stmt->fetch()) {}
?>

	<div class="content">		
		<div class="placement">	
			<div id="back">
		
			
			<?php echo("<a href=drinks.php?userID=$userID><i class='fa fa-times' aria-hidden='true'></i></a>")?>
				
			</div>
			<table class="drink">		
				<thead>
				<tr colspan="2">
					<th>
				<?php echo "<h2> $name";
					
					if($drinkID2 == $drinkID){
					echo("<a href=removeFav.php?drinkID=$drinkID&userID=$userID><i id='favvis' class='fa fa-star' aria-hidden='true'></i></a></h2>");
				} else {
					echo("<a href=addFav.php?drinkID=$drinkID&userID=$userID><i id='ejfavvis' class='fa fa-star-o' aria-hidden='true'></i></a></h2>");
				}
				?>		
 					</th>
				<tr/>
				</thead>
				<tbody>
				<tr>
					<!--<a href='favourites.php'<i class="fa fa-star-o" aria-hidden="true"></i>-->
					<td id="tdparent">
						<h5>Ingredients</h5>
						<ul>
						<?php foreach($ingredients as $var) { //same as [i];
								echo "<li>" . $var . "</li>";
							}
						?>
						</ul>
						<?php echo "<p> $description </p>";?>
					</td>
					<td class="t-left">
						<?php echo "<img src=\"../uploadedfiles/" . $picture . "\">"; ?>
					</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>

<style type="text/css">

	#favvis, #ejfavvis {
		float: right;
	}

</style>

<?php include ('../footer.php')  ?>