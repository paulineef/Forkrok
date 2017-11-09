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

	<div class="content" id="barCont">
		<div class="placement">
			<h2>Bars &amp; Clubs<i class="fa fa-beer" aria-hidden="true"></i></h2>
	</div>
	<?php 
	//Open the database
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
	//END ul	
	echo "</ul>";
	?>
</div>

<?php include ("../footer.php") ?>