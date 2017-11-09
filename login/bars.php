<head>
	<title>Förkrök - Bars &amp; Clubs</title>
	<link rel="stylesheet" type="text/css" href="../forkrok.css">
	<script src="https://use.fontawesome.com/6f2a9fca0c.js"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>

</head>
<!-- Include sidebar -->
<?php include ("sidebar.php");
	
	//GET userID from the URL and put it into a variable
	$userID = trim($_GET["userID"]); ?>

	<div class="content">
		<div class="placement">
			<h2>Bars &amp; Clubs<i class="fa fa-beer" aria-hidden="true"></i></h2>
	</div>
	<?php 
	# Open the database
	@ $db = new mysqli('localhost', 'user', 'user', 'forkrok');

	//IF the database can't connect, get the option to return to index
	if ($db->connect_error) {
		echo "could not connect: " . $db->connect_error;
		printf("<br><a href=index.php>Return to home page </a>");
		//exit so the rest of the code won't run
		exit();
	}
	
	//make a query of what we want to get out of the database
	$query = "SELECT barID, header, picture FROM bars";
	
	//using the query to bind the result to parameters
    $stmt = $db->prepare($query);
	//takes the result of the search and create variables from it
    $stmt->bind_result($barID, $header, $picture);
    $stmt->execute();

	
    echo '<ul id="listBar">';

	//as long as there as bars in database, echo out the header and picture in as list
	//send the current barID to the URL
    while ($stmt->fetch()) {
	echo "<a href='barBase.php?barID=$barID&userID=$userID'<li class='pic'><img src=\"../img/" .
		$picture . "\"> <h3 class='header'> $header </h3></li></a>";

    }
	echo "</ul>";

	?>
	
</div>

<?php include ("../footer.php") ?>
<style type="text/css">	
	.b {
		display: inline;
		float: right;
	}
	.place {
		display: inline;
	}
	#listBar {
		bottom: 50px;
		font-family: 'lato';
		width: 100%;
		padding: 0;
		text-align: center;
		overflow: hidden;
		list-style-type: none;
		left: 0px;
	}
	.pic {
		float: left;
		max-width: 50%;
		padding: 6px;
		box-sizing: border-box;
		margin-bottom: 15px;
		min-height: 147px;
		overflow: hidden;
	}
	.pic img {
		max-width: 100%;
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
		left: 500px;
		padding-top: 32px;
		padding: 48px 18px;
		box-sizing: border-box;
		overflow: hidden;

	}
	#indexBongo.open {
		display: block !important;
		width: 100%;
		left: 0px;
		
	}
	#listBar #indexNEO.open{
		cursor: pointer;
		display: none;
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
	.back.open {
		width: 100%;
		left: 0;
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
	#listBar.open {
		width: 1px;
		left: -500px;
		height: 1px;
	}
	#listBar:last-child {
		padding-bottom: 24px;
	}
	#listBar li p {
		text-align: left;
	}	
	
	@media (min-width: 375px){
		.header {
			margin-top: -90px;
		}
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



