<?php include('sidebar.php');?>
<head>
	<title>Förkrök</title>
</head>
<?php 
	//Gets the ID's for variables
	$gameID = ($_GET["gameID"]);
	$userID = ($_GET["userID"]);
	
	//Opens the database
	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');
	
	//Select the right tables and their contents to be able to display the contents, also joins with the categories
	$query = "SELECT games.gameID, games.name, gameCat.categoryID, gameCat.term, games.need, games.instructions, games.picture FROM games 
	JOIN gameCat ON games.categoryID = gameCat.categoryID WHERE games.gameID = $gameID";

	//acess the database and prepare for the query to be used in the stmt-variable 
	$stmt = $db->prepare($query);
	//takes the result from the query and put in the variables below
	$stmt->bind_result($gameID, $name, $categoryID, $term, $need, $instructions, $picture);
	//execute the function in the stmt
	$stmt->execute();

	//fetches the prepared content and adds it to the varibles in a loop so it displays all of the rows in the table.
	while ($stmt->fetch()) {
	}
?> 

	<div class="content">
		<div class="placement">
			<div id="back">
				<!-- Echos out the right adress to get back to -->
			<?php echo("<a href=games.php?userID=$userID><i class='fa fa-times' aria-hidden='true'></i></a></div>")?>
			<table class="game">
				<thead>
					<tr>
						<th colspan="2">
							<h2>
								<!-- Echo out the name of the game -->
								<?php echo $name?>
							</h2>
						</th>
					</tr>
				<thead>
				<tbody>
				<tr>
					<td class="drink" id="need"><h5>What you need:</h5>
						<!-- Echo out what you need for the game-->
						<p class="need"> <?php echo $need ?> </p>
					</td>
				</tr>
				<tr>
					<td id="inst">
						<h5>Instructions</h5>
						<p>
							<!-- Echo out the instructions for the game -->
							<?php echo $instructions ?>
						</p>
					</td>
				</tr>
				<tbody>
				<tfoot>
				<tr>
					<td colspan="2">
						<!-- Echo out a picture for the game (Some games don't have pictures) -->
						<?php echo "<img src=\"../uploadedfiles/" . $picture . "\">"; ?>
					</td>
				</tr>
			</tfoot>
			</table>
		</div>
	</div>
<?php include('../footer.php');?>