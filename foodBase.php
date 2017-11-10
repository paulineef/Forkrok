<?php include ("sidebar.php") ?>
<head>
	<link rel="stylesheet" type="text/css" href="forkrok.css">
	<script src="https://use.fontawesome.com/6f2a9fca0c.js"></script>
</head>
	<?php 
		//get the value foodID from the URL, trim it = reduce shit and put it into a new variable
		$foodID = trim($_GET["foodID"]);
		//connect to the database with the server = localhost, username = user, password = user and database name = forkork and put it into a variable 'db'
		@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

		//SELECT foodID, header from food AND categoryID, term from foocCat AND maps, facebook from food
		//JOIN foodcat with food in the columns categoryID WHERE the foodID is the name as 'foodID' = the value from the URL
		$query = "SELECT food.foodID, food.header, foodCat.categoryID, foodCat.term, food.maps, food.facebook FROM food 
		JOIN foodCat ON food.categoryID = foodCat.categoryID WHERE food.foodID = $foodID";

		$stmt = $db->prepare($query);
		//takes the result of the search and create variables from it
		$stmt->bind_result($foodID, $header, $categoryID, $term, $maps, $facebook);
		$stmt->execute();

		while ($stmt->fetch()) {
	 }

	?> 
	<div id="indexBongo">
		<div id="back">
			<a href="food.php"><i class="fa fa-times" aria-hidden="true"></i></a>
		</div>
		<h2 class="place"> <?php echo $header ?></h2>
		<div class="map">
			<iframe frameborder="0" style="border:0" src=" <?php echo $maps ?>" allowfullscreen></iframe>
		</div>
		<p>
			<?php echo $term ?><br><br>
		</p>
		<div class="social">
			<a href="https://www.facebook.com/<?php echo $facebook?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
		</div>
		
	</div>
	<?php include ("footer.php") ?>


<style type="text/css">	
	.b {
		display: inline;
		float: right;
	}
	.place {
		display: inline;
	}
	.header {
		color: white;
		z-index: 9999;
		font-size: 15pt;
		margin: 0;
		margin-top: -75px;
	}
	iframe {
		width: 100%;
		min-height: 180px;
		margin: 0 auto;
	}
	#indexBongo {
		position: absolute;
		margin: 0 auto;
		width: 100%;
		z-index: 999;
		background: white;
		padding: 12px;
		height: 100vh;
		padding: 0;
		top: 0px;
		left: 450px;
		padding-top: 32px;
		padding: 48px 18px;
		box-sizing: border-box;
		overflow: hidden;
	}
	#indexBongo p {
		max-width: 90%;
		margin: 0 auto;
		padding: 24px 0 0px 0;
	}
	.map {
		max-width: 100%;
		margin: 0 auto;
		padding: 10px 0 0px 0;
	}
	.back {
		bottom: 26px;
		left: -500px;
		width: 100%;
		background: white;
		width: 1px;

	}
	.back a {
		color: black;
	}
	.social {
		text-align: center;
		color: black;
		padding-top: 32px;
	}
	.social i {
		font-size: 25px !important;
		text-align: center;
		margin: 0 auto;
		padding: 0 4px;
	}
	.social .fa {
		color: black !important;
	}
	.content {
		position: relative;
	}
	.content {
		float:left; 
		margin-right: 100px;
		width: 100%;
		box-sizing: border-box;
		margin: 0 auto;
	}
	.colour {
		background: rgba(0,0,0, 0.5);
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0px;
		margin: 0px;
	}
	#listBar {
		max-width: 400px;
		margin: 0 auto;
		text-align: center;
	}
	@media (min-width: 768px){
		#listBar {
			max-width: 600px;
		}
		.pic {
			max-width: 33%;
		}
		#indexBongo {
			max-width: 650px;
			margin: 0 auto !important;
			padding-left: 150px;
			padding-top: 100px;
		}
		iframe {
			min-height: 250px;
			padding-bottom: 32px;
		}
	}
	@media (min-width: 928px){
		.content {
			margin-left: 400px;
			padding-left: 0;
		}
		#listBar {
			padding-left: 0;
		}
		#indexBongo {
			max-width: 600px;
			padding-left: 50px;
		}
	}
	@media (min-width: 1200px){
		.content {
			margin-left: 500px;
		}
	}
</style>