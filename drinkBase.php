<?php include ('sidebar.php') ?>
<?php 
	$drinkID = trim($_GET["drinkID"]);

	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	$query = "SELECT drinks.drinkID, drinks.name, ingredients.ingredientID, ingredients.term, drinks.picture FROM drinks
	JOIN drinks_ingredients ON drinks.drinkID = drinks_ingredients.drinkID 
	JOIN ingredients ON ingredients.ingredientID = drinks_ingredients.ingredientID
	WHERE drinks.drinkID = $drinkID";

 	$stmt = $db->prepare($query);
    $stmt->bind_result($drinkID, $name, $ingredientID, $term, $picture);
    $stmt->execute();
	$ingredients = array();

	while($stmt->fetch()) {
		array_push($ingredients, $term);
	}
?>
<body>
	<div class="content">		
		<div class="placement">	
			<table class="drink">		
				<tbody>
				<tr>
					<th>
				<?php echo "<h2> $name </h2>";?>
 					</th>
				<tr/>
				<tr>
					<td>
						<h5> Ingredients</h5>
						<ul>
						<?php foreach($ingredients as $var) { //same as [i];
								echo "<li>" . $var . "</li>";
							}
						?>
						</ul>
						<p>
							Lorem ipsum dolor sit amet, sapientem patrioque voluptatibus ne ius, sea cu nobis praesent. 
						</p>
						<?php 
						echo "<img class='Showimg' src=\"uploadedfiles/" . $picture . "\">";
						?>
					</td>
					<td class="t-left">
						<img id="drink" src="uploadedfiles/Klaras.png">
					</td>
				</tr>
			</tbody>
			</table>

			<span><i class="fa fa-arrow-left" aria-hidden="true"></i></span>
		</div>
	</div>

<style type="text/css">



</style>

</body>
<?php include ('footer.php')  ?>