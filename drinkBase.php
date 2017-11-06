<?php include ('sidebar.php') ?>
<?php 

	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	$query = "SELECT drinks.drinkID, drinks.name, ingredients.ingredientID, ingredients.term, drinks.picture FROM drinks
	JOIN drinks_ingredients ON drinks.drinkID = drinks_ingredients.drinkID 
	JOIN ingredients ON ingredients.ingredientID = drinks_ingredients.ingredientID";

 	$stmt = $db->prepare($query);
    $stmt->bind_result($drinkID, $name, $ingredientID, $term, $picture);
    $stmt->execute();
?>
<body>
	
	<div class="content">		
		<div class="placement">	
			<table class="drink">		
				<tbody>
				<tr>
					<th>
<!-- 						<h2><?php echo $name;?><h2>
 -->
 	<?php
   		echo '<ul id="drinkStuff">';
   			echo "<h2>" . $_GET["drinkID"] . "</h2>";
			echo "<h2>" . $_GET["name"] . "</h2>";


				// echo "<li><h2 class='stuff'>$drinkID</li>";
	
		// echo "<li><h2 class='stuff'> $name </li>";
		// }
		
		// echo "</ul>";
	?>
					</th>
				<tr/>
				<tr>
					<td>
						<h5> Ingredients</h5>
						<ul>
							<li>Vodka</li>
							<li>Lime juice</li>
							<li>Lemon juice</li>
							<li>Lemon slices</li>
							<li>Soda</li>
						</ul>
						<p>
							Lorem ipsum dolor sit amet, sapientem patrioque voluptatibus ne ius, sea cu nobis praesent. 
						</p>
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