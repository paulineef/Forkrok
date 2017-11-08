<?php include ('sidebar.php') ?>
<?php 
	$drinkID = trim($_GET["drinkID"]);
	$userID = trim($_GET["userID"]);

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

	$query2 = ("SELECT drinkID, userID FROM favourites WHERE drinkID = '{$drinkID}' "."AND userID = '{$userID}'");
	$stmt2 = $db->prepare($query2);
    $stmt2->bind_result($drinkID2, $userID2);
    $stmt2->execute();
	echo("$drinkID2");
echo('hej');
?>
<body>
	<div class="content">		
		<div class="placement">	
			<div id="back">
		<?php if($drinkID2 == $drinkID){
			echo("<a href=addFav.php?drinkID=$drinkID&userID=$userID><i class='fa fa-star-o' aria-hidden='true'></i></a>");
}
		?>		
			
			<?php echo("<a href=drinks.php?userID=$userID><i class='fa fa-times' aria-hidden='true'></i></a>")?></div>
			<table class="drink">		
				<thead>
				<tr colspan="2">
					<th>
				<?php echo "<h2> $name </h2>";
						echo("$userID");?>
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



</style>

</body>
<?php include ('../footer.php')  ?>