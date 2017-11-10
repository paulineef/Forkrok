<head>
	<link rel="stylesheet" type="text/css" href="../forkrok.css">
	<link rel="stylesheet" type="text/css" href="../barBase.css">
	<script src="https://use.fontawesome.com/6f2a9fca0c.js"></script>
</head>
	<?php include ("sidebar.php") ?>
	
	<?php 
		$barID = trim($_GET["barID"]);
		$userID = trim($_GET["userID"]);
	
		@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');
	
		$query = "SELECT barID, header, description, facebook, maps FROM bars WHERE barID = $barID";

		$stmt = $db->prepare($query);
		//takes the result of the search and create variables from it
		$stmt->bind_result($barID, $header, $description, $facebook, $maps);
		$stmt->execute();

		while ($stmt->fetch()) {
		}
	?> 
	<div id="indexBongo">
		<div id="back">
			<?php echo("<a href=bars.php?userID=$userID><i class='fa fa-times' aria-hidden='true'></i></a>") ?>
		</div>
		<h2 class="place"> <?php echo $header ?></h2>
		<div class="map">
			<iframe id="mapFrame" frameborder="0" style="border:0" src=" <?php echo $maps ?>" allowfullscreen></iframe>
		</div>
		<p>
			<?php echo $description ?><br><br>
		</p>
		<div class="social">
			<a href="https://www.facebook.com/<?php echo $facebook?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
		</div>
		
	</div>
	<?php include ("../footer.php") ?>