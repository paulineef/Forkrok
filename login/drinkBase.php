<?php include ('sidebar.php') ?>
<?php 
	$drinkID = trim($_GET["drinkID"]);
	$userID = trim($_GET["userID"]);

	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	$query = "SELECT drinks.drinkID, drinks.name, ingredients.ingredientID, ingredients.term, drinks.picture, drinks.description FROM drinks
	JOIN drinks_ingredients ON drinks.drinkID = drinks_ingredients.drinkID 
	JOIN ingredients ON ingredients.ingredientID = drinks_ingredients.ingredientID
	WHERE drinks.drinkID = $drinkID
	
	";

 	$stmt = $db->prepare($query);
    $stmt->bind_result($drinkID, $name, $ingredientID, $term, $picture, $description);
    $stmt->execute();
	$ingredients = array();

	while($stmt->fetch()) {
		array_push($ingredients, $term);
	}

	$query = ("SELECT * FROM favourites WHERE drinkID = '{$drinkID}' "."AND userID = '{$userID}'");
	$stmt = $db->prepare($query);
    $stmt->bind_result($drinkID2, $userID2);
    $stmt->execute();

	while($stmt->fetch()) {
		
	}
?>
<body>
	<div class="content">		
		<div class="placement">	
			<div id="back">
		<?php if($drinkID2 == $drinkID){
					echo("<a href=removeFav.php?drinkID=$drinkID&userID=$userID><i id='favvis' class='fa fa-star' aria-hidden='true'></i></a>");
				} else {
					echo("<a href=addFav.php?drinkID=$drinkID&userID=$userID><i id='ejfavvis' class='fa fa-star-o' aria-hidden='true'></i></a>");
				}
		?>		
			
			<?php echo("<a href=drinks.php?userID=$userID><i class='fa fa-times' aria-hidden='true'></i></a>")?></div>
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

</body>
<?php include ('../footer.php')  ?>