<?php include('sidebar.php');?>
<head>
	<title>Förkrök</title>
</head>
<?php 
	$gameID = trim($_GET["gameID"]);
	
	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');
	
	$query = "SELECT games.gameID, games.name, gameCat.categoryID, gameCat.term, games.need, games.instructions FROM games 
	JOIN gameCat ON games.categoryID = gameCat.categoryID WHERE games.gameID = $gameID";

	$stmt = $db->prepare($query);
	//takes the result of the search and create variables from it
	$stmt->bind_result($gameID, $name, $categoryID, $term, $need, $instructions);
	$stmt->execute();

	while ($stmt->fetch()) {
	}
?> 
<body>
	<div class="content">
		<div class="placement">
			<div id="back">
			<a href="games.php"><i class="fa fa-times" aria-hidden="true"></i></a></div>
			<table class="game">
				<thead>
					<tr>
						<th colspan="2">
							<h2>
								<?php echo $name?>
								<i id="star" class="fa fa-star-o" aria-hidden="true"></i>
							</h2>
						</th>
					</tr>
				<thead>
				<tbody>
				<tr>
					<td class="drink" id="need"><h5>What you need:</h5>
						<p class="need"> <?php echo $need ?> </p>
					</td>
				</tr>
				<tr>
					<td id="inst">
						<h5>Instructions</h5>
						<p>
							<?php echo $instructions ?>
						</p>
					</td>
				</tr>
				<tbody>
				<tfoot>
				<tr>
					<td colspan="2">
						<?php echo "<img src=\"uploadedfiles/" . $picture . "\">"; ?>
					</td>
				</tr>
			</tfoot>
			</table>
		</div>
	</div>
	<style type="text/css">

	</style>
</body>
<?php include('footer.php');?>