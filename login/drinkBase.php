<?php include ('sidebar.php') ?>
<?php 
	$drinkID = trim($_GET["drinkID"]);

	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	$query = "SELECT drinks.drinkID, drinks.name, ingredients.ingredientID, ingredients.term, drinks.picture, drinks.description FROM drinks
	JOIN drinks_ingredients ON drinks.drinkID = drinks_ingredients.drinkID 
	JOIN ingredients ON ingredients.ingredientID = drinks_ingredients.ingredientID
	WHERE drinks.drinkID = $drinkID";

 	$stmt = $db->prepare($query);
    $stmt->bind_result($drinkID, $name, $ingredientID, $term, $picture, $description);
    $stmt->execute();
	$ingredients = array();

	while($stmt->fetch()) {
		array_push($ingredients, $term);
	}
?>
<body>
	<div class="content">		
		<div class="placement">	
			<i class="fa fa-star-o" aria-hidden="true"></i>
			<div id="back">
			<a href="drinks.php?drinkID=$drinkID&userID=2"><i class="fa fa-times" aria-hidden="true"></i></a></div>
			<table class="drink">		
				<thead>
				<tr colspan="2">
					<th>
				<?php echo "<h2> $name </h2>";?>
 					</th>
				<tr/>
				</thead>
				<tbody>
				<tr>
					<!--<a href='favourites.php'<i class="fa fa-star-o" aria-hidden="true"></i>-->
					<td id="tdparent">
						<h5> Ingredients</h5>
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



</style>

</body>
<?php include ('footer.php')  ?>